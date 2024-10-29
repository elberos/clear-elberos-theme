<?php
/**
 * Clear Elberos Theme
 */

/* Check if Wordpress */
if (!defined('ABSPATH')) exit;


/* Update this parameter after css change */
define("F_INC", 10);


/**
 * Theme settings
 */
add_action('after_setup_theme', function(){
	
	/**
	 * Thumbnail for a post
	 */
	add_theme_support('post-thumbnails');
	
	
	/**
	 * Theme support
	 */
	add_theme_support(
		'html5',
		[
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);
	
	
	/**
	 * Post format
	 */
	add_theme_support(
		'post-formats',
		[
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		]
	);
	
	
	/**
	 * Allow edit background image
	 */
	add_theme_support('custom-background');
	
	
	/**
	 * Allow edit menu
	 */
	add_theme_support('menus');
});


/**
 * Link filter
 */
add_filter('term_link', function($url){ return str_replace('/./', '/', $url); }, 10, 1);


/**
 * Register composer
 */
add_action('elberos_register_composer', function($composer){
	
	/* Add controllers source */
	$composer->addPsr4("App\\", __DIR__ . "/controllers");
	
});


/**
 * Register controllers
 */
add_action('elberos_register_controllers', function($main){
	$main->addController(new App\DefaultController($main));
});


/* Remove plugin updates */
add_filter('site_transient_update_plugins', function($value){
	$name = plugin_basename(__FILE__);
	if (isset($value->response[$name]))
	{
		unset($value->response[$name]);
	}
	return $value;
});


/**
 * Allow css
 */
add_action('wp_enqueue_scripts', function(){
	wp_register_style(
		'main-style',
		get_template_directory_uri() . '/static/site.css',
		array(),
		F_INC
	);
	wp_enqueue_style('main-style');
});


/**
 * Disable editor title
 */
add_action('admin_head', function(){
	echo '<style>
	.editor-post-title__input {
		display: none;
	}
	.editor-visual-editor__post-title-wrapper{
		margin-top: 0px !important;
	}
	</style>';
});