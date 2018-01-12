<?php

if( defined('ABSPATH') ) return; // just in case...

exec_time();
	
// exit if robot
$bot = 'bot|crawler'; // общая отсеивалка
$bot2 = 'Yandex|slurp|yahoo|Teoma|Scooter|ia_archiver|Lycos|Rambler|Mail\.Ru|Aport|WebAlta|ezooms|nigma'; // что проходит через $bot
$bot3 = 'jeeves|technorati|findexa|findlinks|gaisbo|zyborg|bloglines|blogsearch|pubsub|syndic8|userland|become\.com'; // что проходит через $bot
if( preg_match("~$bot|$bot2|$bot3~i", $_SERVER['HTTP_USER_AGENT']) )
	exit('bot');

// data
$meta_id   = (int) @ $_POST['meta_id'];
$view_type = in_array(@ $_POST['view_type'], array('post_view','term_view')) ? $_POST['view_type'] : '';

// validate data
if( ! $meta_id )    exit('no meta_id');
if( ! $view_type )  exit('no view_type');
if( ! isset($_POST['relpath']) ) exit('no relpath'); // relpath может быть пустым

$relpath = $_POST['relpath'];

// Защита. На основе validate_file()
if( false !== strpos( $relpath, '..' ) || false !== strpos( $relpath, './' ) || ':' == substr( $relpath, 1, 1 ) )
	exit('error: wrong relpath. Are you hacker?');


// path to wp-load.php
$wp_load_file = $_SERVER['DOCUMENT_ROOT'] . $relpath .'wp-load.php';
if( ! file_exists( $wp_load_file ) )
	exit('error: wrong path to wp-load.php: {DOCUMENT_ROOT}'. $relpath .'wp-load.php' );



global $wpdb;

// WP SHORTINIT load
define('SHORTINIT', true );
require_once( $wp_load_file );

send_nosniff_header();
nocache_headers();

//@ header('Content-Type: text/html; charset=' . get_bloginfo('charset') );
@ header('X-Robots-Tag: noindex' );

if( $view_type == 'post_view' )   $table_name = $wpdb->postmeta;
if( $view_type == 'term_view' )   $table_name = $wpdb->termmeta;

if( ! isset($table_name) )  exit('error: table not detected');

if( $wpdb->query("UPDATE $table_name SET meta_value = meta_value+1 WHERE meta_id = ". (int) $meta_id ) )
	exit( $wpdb->get_var("SELECT meta_value FROM $table_name WHERE meta_id = ". (int) $meta_id) .'<!--'. exec_time('end') .'-->' );

exit('0');


/**
 * Считает время выполнения кода.
 *
 * Для включения подсчета, просто вызываем функцию.
 * Для остановки подсчета указываем 'stop' в первом параметре.
 * Для повторного включения, опять вызываем.
 * Для получения результата подсчета указываем 'end' в первом параметре.
 * 
 * @param (строка) $phase Включение/отключение/вывод (start/stop/end) посчитанного времени.
 * @return (строка) Пр: 0.03654 сек.
 *
 * пример использования:
	exec_time(); // включаем подсчет
	// код, который нужно учитывать
	exec_time('stop'); // останавливаем
	// код который не нужно учитывать
	exec_time(); // продолжаем считать
	// код, который нужно учитывать
	echo exec_time('end'); // выведет 0.03654 сек.
 *
 */
function exec_time( $phase = 'start' ){
	static $time_before, $collect;

	$n = 5; // знаков после запятой

	$t = explode(' ', microtime() );
	$time  = $t[1] . substr( $t[0], 1 );

	if( $phase != 'stop' && $time_before ){
		$difference = bcsub( $time, $time_before, $n ); // разница в сек.
		$collect    = bcadd( $difference, $collect, $n );
	}

	if( $phase == 'end' ) return $collect . ' sec.';
	else $time_before = $time;
}