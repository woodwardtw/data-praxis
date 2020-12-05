<?php
/**
 * Custom post type setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


//module custom post type

// Register Custom Post Type module
// Post Type Key: module

function create_module_cpt() {

  $labels = array(
    'name' => __( 'Modules', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Module', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Module', 'textdomain' ),
    'name_admin_bar' => __( 'Module', 'textdomain' ),
    'archives' => __( 'Module Archives', 'textdomain' ),
    'attributes' => __( 'Module Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Module:', 'textdomain' ),
    'all_items' => __( 'All Modules', 'textdomain' ),
    'add_new_item' => __( 'Add New Module', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Module', 'textdomain' ),
    'edit_item' => __( 'Edit Module', 'textdomain' ),
    'update_item' => __( 'Update Module', 'textdomain' ),
    'view_item' => __( 'View Module', 'textdomain' ),
    'view_items' => __( 'View Modules', 'textdomain' ),
    'search_items' => __( 'Search Modules', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into module', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this module', 'textdomain' ),
    'items_list' => __( 'Module list', 'textdomain' ),
    'items_list_navigation' => __( 'Module list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Module list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'module', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'module', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_module_cpt', 0 );


//lesson custom post type

// Register Custom Post Type lesson
// Post Type Key: lesson

function create_lesson_cpt() {

  $labels = array(
    'name' => __( 'Lessons', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Lesson', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Lesson', 'textdomain' ),
    'name_admin_bar' => __( 'Lesson', 'textdomain' ),
    'archives' => __( 'Lesson Archives', 'textdomain' ),
    'attributes' => __( 'Lesson Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Lesson:', 'textdomain' ),
    'all_items' => __( 'All Lessons', 'textdomain' ),
    'add_new_item' => __( 'Add New Lesson', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Lesson', 'textdomain' ),
    'edit_item' => __( 'Edit Lesson', 'textdomain' ),
    'update_item' => __( 'Update Lesson', 'textdomain' ),
    'view_item' => __( 'View Lesson', 'textdomain' ),
    'view_items' => __( 'View Lessons', 'textdomain' ),
    'search_items' => __( 'Search Lessons', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into lesson', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this lesson', 'textdomain' ),
    'items_list' => __( 'Lesson list', 'textdomain' ),
    'items_list_navigation' => __( 'Lesson list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Lesson list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'lesson', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'lesson', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_lesson_cpt', 0 );