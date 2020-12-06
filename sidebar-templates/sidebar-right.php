<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
		<img class="img-fluid logo" src="<?php echo get_template_directory_uri() . '/imgs/data-logo-final.png'?>" alt="Data Praxis and Politics logo.">
<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
	<img class="img-fluid logo" src="<?php echo get_template_directory_uri() . '/imgs/logo.svg'?>" alt="Data Praxis and Politics logo.">
		<?php 
		//show associated lessons for the main module page
		global $post;
		$static_id = $post->ID;
		$type = get_post_type($static_id);
		
		if ($type === 'module'){
			echo data_praxis_get_lessons($static_id, get_the_permalink());
		} 
		if ($type === 'lesson'){
			// The Query
			$args = array( 'post_type' => 'module' );
			$module_query = new WP_Query( $args );
			 
			// get all the modules for the lesson's page
			if ( $module_query->have_posts() ) {
			    while ( $module_query->have_posts() ) {
			        $module_query->the_post();
			        //$lessons = get_field('associated_lessons', $post->ID);
			        if( have_rows('associated_lessons', $post->ID) ):
					    // Loop through rows.
					    while( have_rows('associated_lessons') ) : the_row();

					        // Load sub field value.
					        $lesson_ids = get_sub_field('lessons', $post->ID);
					        // Do something...
					        var_dump($lesson_ids);
					        // if (in_array($static_id, $lesson_ids)){
					        // 	echo data_praxis_get_lessons($post->ID, get_the_permalink($static_id));
					        // }


					    // End loop.
					    endwhile;
					   endif;


			    }
			} else {
			    // no posts found
			}
				/* Restore original Post Data */
				wp_reset_postdata();
			}

		?>

<?php endif; ?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
