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
		<?php echo data_praxis_get_lessons();?>

<?php endif; ?>
<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
