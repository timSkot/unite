<?php

//    if ( get_option( 'show_on_front' ) == 'posts' ) {
//        get_template_part( 'index' );
//    } elseif ( 'page' == get_option( 'show_on_front' ) ) {
      $query = new WP_Query(array(
        'post_type'      => 'messages',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'paged' => get_query_var('page') ? get_query_var('page') : 1
      ));

 get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-12">
		<main id="main" class="site-main" role="main">

			<?php while ( $query->have_posts()  ) : $query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_title(); ?>
					</div>
                    <a href="<?php the_permalink(); ?>">
                        Link
                    </a>
				</article>

					<div class="home-widget-area row">

						<div class="col-sm-6 col-md-4 home-widget">
							<?php if( is_active_sidebar('home1') ) dynamic_sidebar( 'home1' ); ?>
						</div>

						<div class="col-sm-6 col-md-4 home-widget">
							<?php if( is_active_sidebar('home2') ) dynamic_sidebar( 'home2' ); ?>
						</div>

						<div class="col-sm-6 col-md-4 home-widget">
							<?php if( is_active_sidebar('home3') ) dynamic_sidebar( 'home3' ); ?>
						</div>

					</div>

			<?php
                endwhile;

            wp_reset_postdata();

                $total_pages = $query->max_num_pages;

                if ($total_pages > 1){

                  $current_page = max(1, get_query_var('page'));

                  echo paginate_links(array(
                    'base'         => @add_query_arg('page','%#%'),
                    'format'       => '?page=%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_next'    => true,
                    'prev_text'    => __('« prev'),
                    'next_text'    => __('next »'),
                  ));

                }
            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_footer();
//}
?>