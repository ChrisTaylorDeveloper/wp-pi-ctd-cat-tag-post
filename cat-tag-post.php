<?php
/**
 * Plugin Name: Cat Tag Post
 * Author: Chris Taylor
 * Author URI: https://christaylordeveloper.co.uk
 */

function foobar_func( $atts ){
	return "foo and bar";
}
add_shortcode( 'cat_tag_post', 'cat_tag_post' );

function cat_tag_post() {
	$args = array( 'show_count' => true );
	ob_start();
    wp_list_categories( $args );
	return ob_get_clean();
}
