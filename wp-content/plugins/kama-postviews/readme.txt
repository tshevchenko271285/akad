=== Plugin Name ===
Stable tag: 1.1
Tested up to: 4.4
Requires at least: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Contributors: Tkama
Tags: postviews

Counts visits of post or tax term. Works fast with caching plugins like WP Super Cache.


== Description ==

The plugin counts visits of any type of post or any type of tax term. Works with caching plugins like WP Super Cache. Don't destroy all idea of total page cacheing.

For counting visit, the plugin make AJAX request, BUT for handle the request plugin don't load all wordpress environment. It means that the plugin does not overload your server when works together with page cache plugin.



== Frequently Asked Questions ==

### Where the plugin writes the views counts? ###

For the posts it save the views in "views" custom field.
For taxonomy term it saves views in "views" tax custom field.


### How to get views in my theme? ###

Plugin has two functions:

`<?php fresh_kap_views( $id = 0, $type = '' ); ?>` - retriwe views meta field value and update it with javascript. Use it with cache plugins.

`<?php kap_views( $id = 0, $type = '' ); ?>`  - retriwe views meta field value.

$id - ID of post/term.
$type - could be one of: 'post' or 'term'.

To get the values for use in PHP, add "get_" in front of function name: get_kap_views(), get_fresh_kap_views().

The alternative way to get views is to use standart WordPress functions:

`echo get_post_meta( $post_id, 'views', 1 );` - for post
`echo get_term_meta( $term_id, 'views', 1);` - for taxonomy term

### Is the plugin counts visit of search robots? ###

NO! Any crawler robots missing from counting.


== Screenshots ==

1. Settings



== Installation ==

### Instalation via Admin Panel ###
1. Go to `Plugins > Add New > Search Plugins` enter "Kama Postviews"
2. Find the plugin in search results and install it.


== Changelog ==

= 2.0 =
CHANGED: external class for 'ajax-request.php' - now the ajax handler file works without WP and it's faster in 3 times.
CHANGED: smart wp-config.php file detection in 'ajax-request.php'


= 1.2 =
ADD: filters and actions: 'kama_postviews_force_show_js', 'kama_postviews_script', 'after_kama_postviews_show_js'

= 1.1 =
Release


