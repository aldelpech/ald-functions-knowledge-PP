<?php
/**
 *
 * Pour charger du css, des scripts ou des polices 
 *
 *
 * @link       	http://parcours-performance.com/anne-laure-delpech/#ald
 * @since      	1.1.0
 *
 * @package    ald-functions
 * @subpackage ald-functions/includes
 */
 
if (! function_exists('ald_enqueue_scripts') ){
	function ald_enqueue_scripts() {
	
	// enqueue test.css
	
	wp_register_style(
		'ald_knowledge_style',
		ALD_KNOWLEDGE_URL . 'css/test.css' ,
		array(),
		null,
		'all' // no media type
	);

	wp_register_style(
		'font_awesome_css',
		ALD_KNOWLEDGE_URL . 'css/font-awesome.css',
		array(),
		null,
		'all' // no media type
	);
	
	
	wp_enqueue_style( 'ald_knowledge_style' ) ;
	wp_enqueue_style( 'font_awesome_css' ) ;
	
	// enqueue fonts
	/* @since      	1.3.0 */
	wp_enqueue_style( 
		'google-nova-round', 
		'https://fonts.googleapis.com/css?family=Nova+Round'
	);
	
	// enqueue scripts
	
	
	}
}

// see http://code.tutsplus.com/tutorials/loading-css-into-wordpress-the-right-way--cms-20402
add_action( 'wp_enqueue_scripts', 'ald_enqueue_scripts' );  // to enqueue in the website front end