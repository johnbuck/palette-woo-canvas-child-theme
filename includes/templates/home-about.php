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

$body_text = stripslashes( get_option('palette_about_body_text') );

switch ( get_option('palette_about_visual_element') ) {
	case 'none':
		$visual = '';
		$about_left = '<div data-scroll-reveal class="about-body col-full ac">' . $body_text . '</div>';
		$about_right = '';
		break;
	case 'image':
		$visual = '<img src="' . get_option('palette_about_image_source') .'" alt="About section image" />';
		$about_left = '<div data-scroll-reveal class="about-body threecol-two ac">' . $body_text . '</div>';
		$about_right = '<div data-scroll-reveal class="about-image ac threecol-one last">' . $visual . '</div>';
		break;
	case 'video':
		$visual = '<iframe width="' . get_option('palette_about_video_width') .'" height="' . get_option('palette_about_video_height') .'" src="'. get_option('palette_about_video_source') . '?rel=0&autohide=0&controls=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen style="margin-top: 2%;"></iframe>';
		$about_left = '<div data-scroll-reveal class="about-image fourcol-two ac">' . $visual . '</div>';
		$about_right = '<div data-scroll-reveal class="about-body fourcol-two last">' . $body_text . '</div>';
		break;
}

if ( $body_text ) {
?>

<section id="home-about" class="col-full">
	<div data-scroll-reveal class="about-head ac">
		<h2><?php echo esc_html( stripslashes( get_option('palette_about_head_text') ) ); ?></h2>
		<h4><?php echo esc_html( stripslashes( get_option('palette_about_subhead_text') ) ); ?></h4>
	</div>

	<?php echo $about_left; ?>
	<?php echo $about_right; ?>

</section>

<?php
}
?>
