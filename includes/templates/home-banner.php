<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

/**
 * Banner Component
 * 
 * Here we setup all logic and XHTML that is required for the banner area component, used on the homepage.
 *
 * @package Palette
 * @subpackage Template
 */

global $woo_options; 

$heading = ( $woo_options['palette_header_remove_logo_h1'] == 'true' ) ? 'h2' : 'h1' ;
$subheading = ( $woo_options['palette_header_remove_logo_h1'] == 'true' ) ? 'h3' : 'h2' ;
?>

<section data-scroll-reveal id="main-banner" class="ac">
	<<?php echo $heading; ?> id="main-banner-head"><?php echo esc_html( stripslashes( get_option('palette_main_banner_text') ) ); ?> </h1>
	<<?php echo $subheading; ?> id="main-banner-subhead"><?php echo esc_html( stripslashes( get_option('palette_sub_banner_text') ) ); ?></h2>
</section>