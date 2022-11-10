<?php
  get_header();
$query = new WP_Query(array(
  'post_type'      => 'messages',
  'posts_per_page' => 10,
  'post_status'    => 'publish'
));
var_dump($query);
?>

<?php
  get_footer();