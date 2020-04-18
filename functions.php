<?php


/*----------------------------------------
Enable Blade template engine
----------------------------------------*/
require_once(__DIR__ . '/vendor/autoload.php');
use Jenssegers\Blade\Blade;
// Render Blade template
if (!function_exists('render_blade')) {
    function render_blade($template_name)
    {
        $blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');

        return $blade->make($template_name);
    }
}

/*----------------------------------------
Theme functions
----------------------------------------*/
// Article excerpt setting
function new_excerpt_more($more) {
	return '</br><span class="read-more">続きを読む</span>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 80;	
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function get_category_img( $category_id ) {
    return wp_get_attachment_image_src(get_field('profile_img', 'category_'. $category_id), 'full')[0];
}

//Incriment page view
function set_page_views($postID) {
    $count = get_field("page_view", $postID);

    if($count=="NULL"){
        $count = 1;
        update_field("page_view", $count, $postID);
    }else{
      $count++;
      update_field("page_view", $count, $postID);
    }
}

//Access detection for robot crawlers.
function is_bot() {
    $ua = $_SERVER['HTTP_USER_AGENT'];
   
    $bot = array(
          "googlebot",
          "msnbot",
          "yahoo"
    );
    foreach( $bot as $bot ) {
      if (stripos( $ua, $bot ) !== false){
        return true;
      }
    }
    return false;
  }

/*----------------------------------------
Custom admin panel settings
----------------------------------------*/
// Edit post admin panel column
function manage_posts_columns($columns) {
  $columns['post_views_count'] = 'Page View';
  return $columns;
  }
  function add_column($column_name, $post_id) {
    /*View数呼び出し*/
    if ( $column_name == 'post_views_count' ) {
        $stitle = get_field("page_view", $post_id);
    }
    if ( isset($stitle) && $stitle ) {
      echo attribute_escape($stitle);
    }
    else {
      echo __('None');
    }
  }
  add_filter( 'manage_posts_columns', 'manage_posts_columns' );
  add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );
    