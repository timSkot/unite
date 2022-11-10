<?php
add_action( 'restrict_manage_users', 'posts_import' );
add_action( 'restrict_manage_posts', 'posts_import' );
function posts_import(): void
{
  global $current_screen;
  if ('messages' != $current_screen->post_type) {
    return;
  }
  ?>
  <button id="importPosts" class="button">
    Import Posts
  </button>
  <?php
}

add_action( 'wp_ajax_getPostsFromServer', 'getPostsFromServer' );

function getPostsFromServer()
{

  $url = 'https://jsonplaceholder.typicode.com/posts';

  $response = wp_remote_get( $url, array(
    'timeout'     => 5,
    'redirection' => 5,
  ) );

  if ( is_wp_error( $response ) ){
    return $response->get_error_message();
  }

  elseif( wp_remote_retrieve_response_code( $response ) === 200 ){
    $body = wp_remote_retrieve_body( $response );

    $posts = json_decode( $body, true );

    $users = get_users( array( 'fields' => array( 'ID' ) ) );
    $users_id = [];
    if(!empty($users)){
        foreach($users as $user){
            $users_id[] = $user->ID;
        }
    }

    foreach ($posts as $post) {
      if (in_array($post["userId"], $users_id)) {
        $post_data = array(
          'ID'            => $post['id'],
          'post_title'    => $post['title'],
          'post_content'  => $post['body'],
          'post_status'   => 'publish',
          'post_type'     => 'messages',
          'post_author'   => $post['userId'],
        );

        wp_insert_post( wp_slash($post_data) );
      }
    }
  }

    die;
}