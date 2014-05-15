<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

/**
 * Feature Component
 * 
 * Here we setup all logic and XHTML that is required for the feature area component, used on the homepage.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options; 


?>

<section data-scroll-reveal id="home-cta" class="call-to-action col-full">
	<?php 
	echo do_shortcode( '<span class="the-call">' . get_option('palette_cta_text') . '</span>[button link=" ' . get_option('palette_cta_link') . '" size="large" color="red" window="yes" class="flat"]' . get_option('palette_cta_button') . '[/button]');
	?>
</section>
