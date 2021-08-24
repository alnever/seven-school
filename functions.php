<?php
/**
 * Functions for the Seven School Theme
 *
 * The file contains the definitions  of the theme features, menus, sidebars and custimizable options
 *
 * @package seven-school
 * @subpackage seven-school
 * @since Seven School 1.0
 */

// define content width

if ( ! isset( $content_width ) ) {
	$content_width = 1376;
}

// textdomain

function seven_school_register_textdomain() {
  load_theme_textdomain('seven-school', get_template_directory()."/languages");
}

add_action('after_setup_theme','seven_school_register_textdomain');

// add theme support

function seven_school_setup() {
	add_theme_support('custom-header');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats');
	add_theme_support('custom-logo', array(
	    'height'      => 200,
	    'width'       => 200,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
	));

	add_theme_support( "post-thumbnails" );
	add_theme_support( "custom-background" );

}

add_action('after_setup_theme', 'seven_school_setup');

// add editor style for old versions

// add_editor_style();

// add editor style for Gutenberg

// function seven_school_block_editor_styles() {
//     wp_enqueue_style(
// 		'seven-school-block-editor-styles',
// 		get_theme_file_uri( 'editor-style.css' ),
// 		false
// 	);
// }
//
// add_action( 'enqueue_block_editor_assets', 'seven_school_block_editor_styles' );

// enqueue styles and scripts

function seven_school_enqueue_styles_scripts() {
	wp_enqueue_style('seven-school-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version') );
	wp_enqueue_style('seven-school-style-all', get_theme_file_uri('/css/style.css'), ['seven-school-style'], wp_get_theme()->get('Version') );

//     wp_enqueue_script('seven_school-jquery', get_theme_file_uri('/js/jquery-3.3.1.js'), [], null, true );
// 	wp_enqueue_script('seven_school-script', get_theme_file_uri('/js/index.js'), ['swtk-jquery'], wp_get_theme()->get('Version'), true );
//
// 	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
}

add_action('wp_enqueue_scripts', 'seven_school_enqueue_styles_scripts');
?>