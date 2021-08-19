<?php
/*
Plugin Name: Question Bank
Plugin URI: https://wordpress.org/plugins/wordpress-importer/
Description: Our question bank
Author: xpeedstudion
Author URI: https://wordpress.org/
Version: 1.0
Text Domain: question-bank
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register Custom Post Type Quiz
function create_quiz_cpt() {

	$labels = array(
		'name' => _x( 'Quizzes', 'Post Type General Name', 'question-bank' ),
		'singular_name' => _x( 'Quiz', 'Post Type Singular Name', 'question-bank' ),
		'menu_name' => _x( 'Quizzes', 'Admin Menu text', 'question-bank' ),
		'name_admin_bar' => _x( 'Quiz', 'Add New on Toolbar', 'question-bank' ),
		'archives' => __( 'Quiz Archives', 'question-bank' ),
		'attributes' => __( 'Quiz Attributes', 'question-bank' ),
		'parent_item_colon' => __( 'Parent Quiz:', 'question-bank' ),
		'all_items' => __( 'All Quizzes', 'question-bank' ),
		'add_new_item' => __( 'Add New Quiz', 'question-bank' ),
		'add_new' => __( 'Add New', 'question-bank' ),
		'new_item' => __( 'New Quiz', 'question-bank' ),
		'edit_item' => __( 'Edit Quiz', 'question-bank' ),
		'update_item' => __( 'Update Quiz', 'question-bank' ),
		'view_item' => __( 'View Quiz', 'question-bank' ),
		'view_items' => __( 'View Quizzes', 'question-bank' ),
		'search_items' => __( 'Search Quiz', 'question-bank' ),
		'not_found' => __( 'Not found', 'question-bank' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'question-bank' ),
		'featured_image' => __( 'Featured Image', 'question-bank' ),
		'set_featured_image' => __( 'Set featured image', 'question-bank' ),
		'remove_featured_image' => __( 'Remove featured image', 'question-bank' ),
		'use_featured_image' => __( 'Use as featured image', 'question-bank' ),
		'insert_into_item' => __( 'Insert into Quiz', 'question-bank' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Quiz', 'question-bank' ),
		'items_list' => __( 'Quizzes list', 'question-bank' ),
		'items_list_navigation' => __( 'Quizzes list navigation', 'question-bank' ),
		'filter_items_list' => __( 'Filter Quizzes list', 'question-bank' ),
	);
	$args = array(
		'label' => __( 'Quiz', 'question-bank' ),
		'description' => __( 'Our custom post type', 'question-bank' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'post-formats'),
		'taxonomies' => array('subject'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 25,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'quiz', $args );

}
add_action( 'init', 'create_quiz_cpt', 0 );

// Register Taxonomy Subject
function create_subject_tax() {

	$labels = array(
		'name'              => _x( 'Subjects', 'taxonomy general name', 'question-bank' ),
		'singular_name'     => _x( 'Subject', 'taxonomy singular name', 'question-bank' ),
		'search_items'      => __( 'Search Subjects', 'question-bank' ),
		'all_items'         => __( 'All Subjects', 'question-bank' ),
		'parent_item'       => __( 'Parent Subject', 'question-bank' ),
		'parent_item_colon' => __( 'Parent Subject:', 'question-bank' ),
		'edit_item'         => __( 'Edit Subject', 'question-bank' ),
		'update_item'       => __( 'Update Subject', 'question-bank' ),
		'add_new_item'      => __( 'Add New Subject', 'question-bank' ),
		'new_item_name'     => __( 'New Subject Name', 'question-bank' ),
		'menu_name'         => __( 'Subject', 'question-bank' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'This our custom taxonomy for quiz post type', 'question-bank' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'subject', array('quiz'), $args );

}
add_action( 'init', 'create_subject_tax' );