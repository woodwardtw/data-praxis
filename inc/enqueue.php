<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		wp_enqueue_script( 'data-praxis-scripts', get_template_directory_uri() . '/js/data-praxis.js', array(), $js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );


function thinking_grid_enqueue_stuff() {
	global $post;
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
  if (is_page_template('page-templates/thinking-grid.php' )) {
  	//https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js
  		wp_enqueue_script( 'jq-ui-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), $js_version, true );
    	wp_enqueue_script( 'thinking-grid-scripts', get_template_directory_uri() . '/js/thinking-grid.js', array(), $js_version, true );
  } 
}
add_action( 'wp_enqueue_scripts', 'thinking_grid_enqueue_stuff' );