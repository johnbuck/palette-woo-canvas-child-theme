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

$testimonials_options = array(
		'size' => $woo_options['palette_testimonial_image_size'],
		'limit' => $woo_options['palette_testimonials_limit'],
		'row' => $woo_options['palette_testimonials_per_row'],
	);

// lets check if there are any posts in the 'testimonial' post type before proceeding.
$hasposts = get_posts( 'post_type=testimonial' );

// Set up the head and subhead content appropriately
$head = ( $hasposts ) ? esc_html( stripslashes( get_option('palette_testimonials_head_text') ) ) : 'Eek. Looks like we need some content.' ;
$subhead = ( $hasposts ) ?  esc_html( stripslashes( get_option('palette_testimonials_subhead_text') ) ) : 'Enter some testimonials to display here. Don\'t forget to include photos and other info!' ;

if ( $hasposts ) {
?>

<section id="home-testimonials" class="col-full">
	<div data-scroll-reveal class="common-head testimonials-head ac">
		<h2><?php echo $head; ?></h2>
		<h4><?php echo $subhead; ?></h4>
	</div>

	<?php
		woothemes_testimonials( array( 'limit' => $testimonials_options['limit'], 'size' => $testimonials_options['size'], 'per_row' => $testimonials_options['row'], 'before' => '<div data-scroll-reveal class="widget_woothemes_testimonials">', 'after' => '</div>', 'link_title' => false, 'echo' => true) );
	?>

</section>

<?php
}
?>