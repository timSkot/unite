<?php
add_action( 'init', 'register_post_type_messages' );

function register_post_type_messages(): void {

  register_post_type( 'messages', [
    'label'  => null,
    'labels' => [
      'name'               => 'Сообщения',
      'singular_name'      => 'Сообщения',
      'add_new'            => 'Добавить Сообщения',
      'add_new_item'       => 'Добавление Сообщения',
      'edit_item'          => 'Редактирование Сообщения',
      'new_item'           => 'Новое Сообщение',
      'view_item'          => 'Смотреть Сообщение',
      'search_items'       => 'Искать Сообщения',
      'not_found'          => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon'  => '',
      'menu_name'          => 'Сообщения',
    ],
    'description'         => '',
    'public'              => true,
    'show_in_menu'        => null,
    'show_in_rest'        => null,
    'rest_base'           => null,
    'menu_position'       => null,
    'menu_icon'           => 'dashicons-email',
    'hierarchical'        => false,
    'supports'            => [ 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats' ],
    'taxonomies'          => [],
    'has_archive'         => false,
    'rewrite'             => true,
    'query_var'           => true,
  ] );
}