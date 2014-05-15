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

$team_options = array(
		'size' => $woo_options['palette_team_image_size'],
		'limit' => $woo_options['palette_team_limit'],
		'row' => $woo_options['palette_team_per_row'],
	);

// lets check if there are any posts in the 'testimonial' post type before proceeding.
$hasposts = get_posts( 'post_type=team-member' );

// Set up the head and subhead content appropriately
$head = ( $hasposts ) ? esc_html( stripslashes( get_option('palette_team_head_text') ) ) : 'Doh! Looks like we need some content.' ;
$subhead = ( $hasposts ) ? esc_html( stripslashes( get_option('palette_team_subhead_text') ) ) : 'Enter some team members to display here. Don\'t forget to include photos, URLs, and Twitter handles!' ;

if ( $hasposts ) {
?>

<section id="home-team" class="col-full">
	<div data-scroll-reveal class="common-head team-head ac">
		<h2><?php echo $head; ?></h2>
		<h4><?php echo $subhead; ?></h4>
	</div>

	<?php
		woothemes_our_team( array( 'limit' => $team_options['limit'], 'size' => $team_options['size'], 'per_row' => $team_options['row'], 'before' => '<div data-scroll-reveal class="widget_woothemes_our_team">', 'after' => '</div>', 'echo' => true ) );
	?>

</section>

<?php
}
?>