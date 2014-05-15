<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

/**
 * Projects Component
 * 
 * Here we setup all logic and XHTML that is required for the projects area component, used on the homepage.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options; 

$project = array(
		'limit' => $woo_options['palette_features_limit'],
		'columns' => $woo_options['palette_features_per_row'],
		'orderby' => 'date',
		'order' => 'desc',
		'exclude_categories' => ''
	);

$hasposts = get_posts( 'post_type=project' );

// Set up the head and subhead content appropriately
$head = ( get_option('palette_portfolio_head_text') ) ? esc_html( stripslashes( get_option('palette_portfolio_head_text') ) ) : 'Doh! Looks like we need some content.' ;
$subhead = ( get_option('palette_portfolio_subhead_text') ) ? esc_html( stripslashes( get_option('palette_portfolio_subhead_text') ) ) : 'Enter some projects to display here.' ;

if ( $hasposts ) {
?>

	<section id="home-portfolio" class="col-full">
		<div class="portfolio-head ac">
			<h2><?php echo $head; ?></h2>
			<h4><?php echo $subhead; ?></h4>
		</div>
	
		<div data-scroll-reveal class="widget_woothemes_features">
			<?php woothemes_projects( array( 'limit' => $project['limit'], 'columns' => $project['columns'], 'echo' => true) ); ?>
		</div>

	</section>
<?php
}
?>