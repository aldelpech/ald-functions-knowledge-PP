<?php
/**
 *
 * Pour améliorer HMS testimonial - Solution was in plugin documentation
 * que les étoiles de l'avis des témoins s'affichent comme des étoiles
 * sinon elles s'affichent par défaut "2 out of 5"
 *
 *
 * @link       	http://parcours-performance.com/anne-laure-delpech/#ald
 * @since      	1.1.0
 *
 * @package    ald-functions
 * @subpackage ald-functions/includes
 */
 
function hms_rating_override($text) {
	/**
	 * Detect the current rating
	 */
	$matches = null;
	$getMatches = preg_match('/data-rating=\"(\d)\"/', $text, $matches);

	if ( count($matches) == 2 ) {
		$rating = $matches[1];
		$text = __( 'sur 5 étoiles' ) ;
		return '<img src="' . ALD_KNOWLEDGE_URL . 'images/' . $rating . 'stars.png" alt="' . $rating . $test . '" itemprop="ratingValue" />';
	}

	return $text;
}
add_filter('hms_testimonials_system_rating', 'hms_rating_override');