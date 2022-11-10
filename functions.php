<?php
add_action( 'wp_enqueue_scripts', 'unite_enqueue_styles' );
function unite_enqueue_styles(): void
{
  $parenthandle = 'parent-style';
  $theme        = wp_get_theme();
  wp_enqueue_style( $parenthandle,
    get_template_directory_uri() . '/style.css',
    array('bootstrap'),
    $theme->parent()->get( 'Version' )
  );
  wp_enqueue_style( 'child-style',
    get_stylesheet_uri(),
    array( $parenthandle ),
    $theme->get( 'Version' )
  );
}

$inc_path = get_stylesheet_directory() . '/inc/';

require_once $inc_path . 'register_post_type.php';
require_once $inc_path . 'messages_import.php';
require_once $inc_path . 'enqueue.php';
require_once $inc_path . 'rest_api_messages.php';