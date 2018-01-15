<?php
/**
 * Widget API: WP_Widget_Categories class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Categories widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Akad_Widget_Popular_Posts extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'Akad_Widget_Popular_Posts',
			'description' => __( 'A list or dropdown of categories.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'akad_popular_posts', __( 'AKAD Popular Posts' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @staticvar bool $first_dropdown
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Categories widget instance.
	 */
	public function widget( $args, $instance ) {
		?>
		<div class="widget">
			<div class="widget_title"><?php echo $instance['title']; ?></div>
			<div class="tab">
				<nav>
					<a href="">popular</a>
					<a href="">latest</a>
					<div class="bottom-line"></div>
				</nav>
				<div class="tab_single shown">
					<?php $this->akad_get_most_viewed('num=' . $instance["post_count"] ); ?>
					
				</div>
				<div class="tab_single">
					<?php echo $this->akad_get_latest_post( $instance["post_count"] ); ?>
				</div>
			</div>
		</div>
	<?php
	}

	/**
	 * Handles updating settings for the current Categories widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		//$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		//$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['post_count'] = !empty($new_instance['post_count']) ? $new_instance['post_count'] : 3;

		return $instance;
	}

	/**
	 * Outputs the settings form for the Categories widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = sanitize_text_field( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$post_count = isset( $instance['post_count'] ) ? $instance['post_count'] : 3;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e( 'Count Posts' ); ?></label><br />
		<p><input type="number" class="checkbox" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" value="<?php echo $post_count; ?>" />
		<?php
	}
	/** Функция для вывода записей по произвольному полю содержащему числовое значение.
	-------------------------------------
	Параметры передаваемые функции (в скобках дефолтное значение):
	num (10) - количество постов.
	key (views) - ключ произвольного поля, по значениям которого будет проходить выборка.
	order (DESC) - порядок вывода записей. Чтобы вывести сначала менее просматириваемые устанавливаем order=1
	format(0) - Формат выводимых ссылок. По дефолту такой: ({a}{title}{/a}). Можно использовать, например, такой: {date:j.M.Y} - {a}{title}{/a} ({views}, {comments}).
	days(0) - число последних дней, записи которых нужно вывести по количеству просмотров. Если указать год (2011,2010), то будут отбираться популярные записи за этот год.
	cache (0) - использовать кэш или нет. Варианты 1 - кэширование включено, 0 - выключено (по дефолту).
	echo (1) - выводить на экран или нет. Варианты 1 - выводить (по дефолту), 0 - вернуть для обработки (return).
	Пример вызова: akad_get_most_viewed("num=5 &key=views &cache=1 &format={a}{title}{/a} - {date:j.M.Y} ({views}) ({comments})");
	*/
	private function akad_get_most_viewed($args=''){
		parse_str($args, $i);
		$num    = isset($i['num']) ? $i['num']:3;
		$key    = isset($i['key']) ? $i['key']:'views';
		$order  = isset($i['order']) ? 'ASC':'DESC';
		$cache  = isset($i['cache']) ? 1:0;
		$days   = isset($i['days']) ? (int)$i['days']:0;
		$echo   = isset($i['echo']) ? 0:1;
		$format = isset($i['format']) ? stripslashes($i['format']):0;
		$AND_days = '';
		$x = '';
		global $wpdb,$post;
		$cur_postID = $post->ID;

		if( $cache ){ $cache_key = (string) md5( __FUNCTION__ . serialize($args) );
			if ( $cache_out = wp_cache_get($cache_key) ){ //получаем и отдаем кеш если он есть
				if ($echo) return print($cache_out); else return $cache_out;
			}
		}

		if( $days ){
			$AND_days = "AND post_date > CURDATE() - INTERVAL $days DAY";
			if( strlen($days)==4 )
				$AND_days = "AND YEAR(post_date)=" . $days;
		}

		$sql = "SELECT p.ID, p.post_title, p.post_date, p.guid, p.comment_count, (pm.meta_value+0) AS views
		FROM $wpdb->posts p
			LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)
		WHERE pm.meta_key = '$key' $AND_days
			AND p.post_type = 'post'
			AND p.post_status = 'publish'
		ORDER BY views $order LIMIT $num";
		$results = $wpdb->get_results($sql);
		if( !$results ) return false;

		$out= '';
		preg_match( '!{date:(.*?)}!', $format, $date_m );

		foreach( $results as $pst ){
			$x == 'li1' ? $x = 'li2' : $x = 'li1';
			if ( (int)$pst->ID == (int)$cur_postID ) $x .= " current-item";
			$Title = $pst->post_title;
			$image_url = get_the_post_thumbnail_url( $pst->ID, 'thumbnail' );
			$date = date('jS F Y', strtotime($pst->post_date));
			
			$a1 = "<a href='". get_permalink($pst->ID) ."' title='{$pst->views} просмотров: $Title'>";
			$a2 = "</a>";
			$comments = $pst->comment_count;
			$views = $pst->views;
			if( $format ){
				$date = apply_filters('the_time', mysql2date($date_m[1],$pst->post_date));
				$Sformat = str_replace ($date_m[0], $date, $format);
				$Sformat = str_replace(array('{a}','{title}','{/a}','{comments}','{views}'), array($a1,$Title,$a2,$comments,$views), $Sformat);
			}
			else $Sformat = $a1.$Title.$a2;
			$out .= '<div class="' . $x . ' related_post">
						<div class="thumb">
							<img src="' . $image_url . '"" alt="image">
						</div>
						<a href="' . get_permalink($pst->ID) . '" class="post_title montserrat-text uppercase">' . $Title . '</a>
						<div class="post_date">' . $date . '</div>
					</div>';
		}
		

		if( $cache ) wp_cache_add($cache_key, $out);

		if( $echo )
			return print $out;
		else
			return $out;
	}


/*
**	Отображение послеждних постов
*/
	function akad_get_latest_post($count = 3) {
		$args = array(	'posts_per_page' => $count,
						'post_type' => 'post'
					 	);
		$query = new WP_Query( $args ); 
		if( $query->have_posts() ){
			$out = '';
			while( $query->have_posts() ){ $query->the_post();
				$Title = get_the_title();
				$image_url = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
				$post_url = get_permalink(get_the_ID());
				$date = date( 'jS F Y', strtotime( get_the_date() ) );
				$out .= '<div class="related_post">
							<div class="thumb">
								<img src="' . $image_url . '"" alt="image">
							</div>
							<a href="' . $post_url . '" class="post_title montserrat-text uppercase">' . $Title . '</a>
							<div class="post_date">' . $date . '</div>
						</div>';
			}
			return $out;
			wp_reset_postdata(); // сбрасываем переменную $post
		} 
		else echo 'Записей нет.';
	}
}
// Регистрация класса виджета
add_action( 'widgets_init', 'register_popular_posts_widgets' );
function register_popular_posts_widgets() {
	register_widget( 'Akad_Widget_Popular_Posts' );
}
