<?php
/*****************************************
* child theme functions
*****************************************/


/*****************************************
* enqueue css, javascript, fonts
*****************************************/
// enqueue prosiad.css

function al_enqueue_scripts() {
	wp_register_style(
		'prosiad_css',
		get_stylesheet_directory_uri() . "/css/prosiad.css" ,
		array(),
		null,
		'all' // no media type
	);

	wp_register_style(
		'font_awesome_css',
		get_stylesheet_directory_uri() . "/css/font-awesome.css" ,
		array(),
		null,
		'all' // no media type
	);
	
	
	wp_enqueue_style( 'prosiad_css' ) ;
	wp_enqueue_style( 'font_awesome_css' ) ;
}

// see http://code.tutsplus.com/tutorials/loading-css-into-wordpress-the-right-way--cms-20402
add_action( 'wp_enqueue_scripts', 'al_enqueue_scripts' );  // to enqueue in the website front end


/*****************************************
* use php in the text widgets
*****************************************/
// see www.wpstuffs.com/how-to-execute-php-code-in-text-widget-without-using-plugin/
function php_execute($html){
	if( strpos( $html,"<"."?php" )!==false ){ ob_start(); eval( "?".">".$html );
	$html=ob_get_contents();
	ob_end_clean();
	}
	return $html;
}
add_filter( 'widget_text','php_execute', 100 );

/*****************************************
* Tag cloud I like
*****************************************/
// http://www.sitepoint.com/better-wordpress-tag-cloud/
// The function can be called in any theme file using My_TagCloud();
// or with a shortcode [tagcloud]

/*****************************************
* un shortcode pour insérer une adresse mail encryptée
*****************************************/
/**
 * encode the email address so that robot can not get it
 * shortcode will be [email]john.dow@mysite.com[/email]
 * source http://codex.wordpress.org/Function_Reference/antispambot
 * @parem array $atts 	shortcodes attributes. Not used
 * @param string $mail 	the shortcode content. Should be an email address
 */
  
	function al_email_encode_function( $atts, $mail = null ){
		if( ! is_email( $mail ) ) {
			return;
		}
		return '<span class="top-email"><i class="fa fa-envelope"></i> <a href="mailto:' . $mail . '?Subject=[' . get_bloginfo( 'name' ) . '] Bonjour target="blank>' . $mail .'</a> </span> <i class="fa fa-lock"></i>' ; 
		
		// return '<a href="mailto:' . antispambot( $mail ) . '">' . antispambot( $mail ) . '</a>';
	}
	add_shortcode( 'email', 'al_email_encode_function' );
	// will allow shortcode to be inserted in widgets also
	add_filter( 'widget_text', 'shortcode_unautop' );
	add_filter( 'widget_text', 'do_shortcode' );
