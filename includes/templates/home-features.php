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

$feature_link = ( $woo_options['palette_feature_link'] == 'true' ) ? true : false;
$feature = array(
		'size' => $woo_options['palette_feature_image_size'],
		'limit' => $woo_options['palette_features_limit'],
		'row' => $woo_options['palette_features_per_row'],
		'link' => $feature_link
	);

// lets check if there are any posts in the 'testimonial' post type before proceeding.
$hasposts = get_posts( 'post_type=feature' );

// Set up the head and subhead content appropriately
$head = ( $hasposts ) ? esc_html( stripslashes( get_option('palette_features_head_text') ) ) : 'Eek. Looks like we need to add some text in the theme options.' ;
$subhead = ( $hasposts ) ? esc_html( stripslashes( get_option('palette_features_subhead_text') ) ) : 'Enter some features to display here. Add an icon or featured image for extra awesomeness!' ;

if ( $hasposts ) {
?>

<section id="home-features" class="col-full">
	<div data-scroll-reveal class="common-head features-head ac">
		<h2><?php echo $head; ?></h2>
		<h4><?php echo $subhead; ?></h4>
	</div>

	<?php
		woothemes_features( array( 'limit' => $feature['limit'], 'size' => $feature['size'], 'per_row' => $feature['row'], 'before' => '<div data-scroll-reveal class="widget_woothemes_features">', 'after' => '</div>', 'link_title' => $feature['link'], 'echo' => true) );
	?>

</section>

<?php
}
?>