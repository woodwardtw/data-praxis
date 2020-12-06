<?php
/**
 * Single module partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="module-header">

		<?php the_title( '<h1 class="module-title">', '</h1>' ); ?>
		

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="module-content">
		<?php echo data_praxis_authors();?>
		<?php echo data_praxis_abstract();?>
		<?php echo data_praxis_learning_outcomes();?>
		<?php echo data_praxis_intro_media();?>
		<?php echo data_praxis_glossary();?>
		<?php echo data_praxis_recommended_readings();?>
		<?php echo data_praxis_resources_repeater();?>
		<?php echo data_praxis_get_lessons($post->ID);?>
		<?php //the_content(); ?>
		

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
