<?php
/**
 *
 * Pour autoriser l'upload de fichiers apk (app inventor and other android apps)
 *
 *
 * @link       	http://parcours-performance.com/anne-laure-delpech/#ald
 * @since      	1.1.0
 *
 * @package    ald-functions
 * @subpackage ald-functions/includes
 */
 
 
/********************************************************************************
* source of the code 
* https://wordpress.org/support/topic/cannot-upload-apk-file-for-security-reasons
********************************************************************************/	

function ald_functions_add_upload_mime_types( $mimes ) {
    if ( function_exists( 'current_user_can' ) )
        $unfiltered = $user ? user_can( $user, 'unfiltered_html' ) : current_user_can( 'unfiltered_html' );
    if ( !empty( $unfiltered ) ) {
        $mimes['apk'] = 'application/vnd.android.package-archive';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'ald_functions_add_upload_mime_types' );