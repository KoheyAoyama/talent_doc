<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Jenssegers\Blade\Blade;

/**
 * Bladeテンプレートをレンダリングする
 */
if (!function_exists('render_blade')) {
    function render_blade($template_name)
    {
        $blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');

        return $blade->make($template_name);
    }
}

function new_excerpt_more($more) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 140;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_category_img( $category_id ) {
    return wp_get_attachment_image_src(get_field('category_img', 'category_'. $category_id), 'full')[0];
}