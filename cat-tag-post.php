<?php
declare(strict_types=1);
/**
 * Plugin Name: Cat Tag Post
 * Description: Display a hierarchical list of Categories, Sub Categories and Posts.
 * Author: Chris Taylor
 * Author URI: https://christaylordeveloper.co.uk
 */

require 'class-walker-category-and-post.php';

add_shortcode( 'cat_tag_post', 'cat_tag_post' );

function cat_tag_post() {
    $args = array(
        'show_count' => true,
        'walker' => new Walker_Category_And_Post()
    );

    ob_start();
    wp_list_categories( $args );
    return ob_get_clean();
}
