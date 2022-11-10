<?php
add_action( 'admin_enqueue_scripts', function()
{
  wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() .'/assets/js/admin.js', array(), 1, true );
}, 99 );