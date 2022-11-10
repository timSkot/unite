<?php
add_action( 'rest_api_init', function(){

  $namespace = 'unite/v1';

  $rout = '/messages';

  $rout_params = [
    'methods'  => 'GET',
    'callback' => 'get_messages',
    'args'     => [],
    'permission_callback' => null,
  ];

  register_rest_route( $namespace, $rout, $rout_params );

} );

function get_messages( WP_REST_Request $request ){

  $posts = get_posts( array(
    'post_type' => 'messages',
    'posts_per_page' => -1
  ) );

  $posts_obj = [];

  foreach( $posts as $pst ){
    $posts_obj[] = [
      'userId' => $pst->post_author,
      'id' => $pst->ID,
      'title' => $pst->post_title,
      'body' => $pst->post_content,
    ];
  }

  if ( empty( $posts ) ) {
    return new WP_Error( 'no_messages', 'Записей не найдено', [ 'status' => 404 ] );
  }

  return json_encode($posts_obj);
}