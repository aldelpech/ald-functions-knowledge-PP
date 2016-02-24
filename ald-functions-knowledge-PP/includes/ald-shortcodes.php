<?php
/**
 *
 * Pour enregistrer et coder des shortcodes 
 *
 *
 * @link       	http://parcours-performance.com/anne-laure-delpech/#ald
 * @since      	1.1.0
 *
 * @package    ald-functions
 * @subpackage ald-functions/includes
 */
 
 
/********************************************************************************
* shortcode to enclose an image between div tags
********************************************************************************/	

function ald_image( $atts, $content = null ) {
	$return_string = '</div><div class="image-holder">' ; 
	$return_string .= $content  ;  
	return $return_string ;
	// this will return both text and image enclosed between the shortcodes
	// even if $content = '' instead of $content = null but NOT if $atts, is ommited...
}

/********************************************************************************
* shortcode to enclose texte and image between div tags
********************************************************************************/
function ald_bloc_texte_et_image( $atts, $content = null ) {
	// le shortcode 'image' pour lire le code HTML d'une image
	// See http://wordpress.stackexchange.com/questions/116012/using-html-as-shortcode-attribute
	
	extract( shortcode_atts(
		array(
			'align' => 'gauche',			// default align value is gauche
			'hr' => 'oui',					
		), $atts )
	);
	
	$class_text = 'ald-functions-gauche' ;
		if( $align == 'droite' ) {
		$class_text = "ald-functions-droite" ;
	} 

	$return_string = '<div class="'. $class_text . '" id="ald-functions">' . '<div class="text-holder">' ;

    // should change $ald_hr coming from the image shortcode
    $ald_hr = '</div></div><hr id="hr-ald-functions" />' ;
	if( $hr == 'non' ) {
		$ald_hr = '</div></div>' ;
	} 
	
	$return_string .= do_shortcode( $content ) . $ald_hr ;		// allows nested shortcodes

   return $return_string ;		// returns all the generated text
	
}	
	


function register_shortcodes(){
   add_shortcode('bloc', 'ald_bloc_texte_et_image');
      add_shortcode('al-image', 'ald_image');
}

// pour que le shortcode soit chargé au démarrage de wordpress
add_action( 'init', 'register_shortcodes');

