<?php
/*-------------------------------------------------------------------------------------------------*/
/* Set up the Palette theme */
/*-------------------------------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'palette_theme_setup' );
function palette_theme_setup() {
	global $woo_options;

	// Launching operation cleanup
	add_action('init', 'palette_head_cleanup');

	// cleaning up random code around images
	add_filter( 'the_content', 'palette_filter_ptags_on_images' );

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'palette_excerpt_more' );

    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'palette_remove_wp_widget_recent_comments_style', 1 );

    // clean up comment styles in the head
    add_action( 'wp_head', 'palette_remove_recent_comments_style', 1 );

    // clean up gallery output in wp
    add_filter( 'gallery_style', 'palette_gallery_style' );

	// Enqueue all the styles
	add_action('admin_enqueue_scripts', 'palette_add_admin_styles');

	if ( ! is_admin() ) {
		add_action( 'wp_enqueue_scripts', 'palette_enqueue_scripts' );
		add_action( 'wp_enqueue_scripts', 'palette_enqueue_styles' );
	}

	if ( ! is_admin() && get_option('palette_load_magnific_popup') == 'true' ) {
		add_filter('the_content', 'add_lightbox_rel_replace');
	}
}

/*-------------------------------------------------------------------------------------------------*/
/* Clean up the head 
/* "Borrowed" from the Roots (https://github.com/roots/roots) and Bones
/* (https://github.com/eddiemachado/bones/) themes */
/*-------------------------------------------------------------------------------------------------*/
function palette_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'palette_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'palette_remove_wp_ver_css_js', 9999 );
}

// remove WP version from scripts
function palette_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

/*-------------------------------------------------------------------------------------------------*/
/* Clean up the random code areas  */
/*-------------------------------------------------------------------------------------------------*/

// remove the p from around imgs
// (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function palette_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function palette_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'palettetheme' ) . get_the_title($post->ID).'">'. __( 'Read more &raquo;', 'palettetheme' ) .'</a>';
}

// remove injected CSS for recent comments widget
function palette_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function palette_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function palette_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/*-------------------------------------------------------------------------------------------------*/
/* Add custom styling to the admin area  */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_add_admin_styles' ) ) {
function palette_add_admin_styles(){
    wp_register_style( 'palette_admin_styles', get_bloginfo('stylesheet_directory') . '/assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'palette_admin_styles' );
} // palette_add_admin_styles()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Load Palette custom styles */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_enqueue_styles' ) ) {
function palette_enqueue_styles() {

	wp_register_style( 'palette_stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
	wp_register_style( 'palette_ie_only', get_stylesheet_directory_uri() . '/assets/css/ie.css', array(), '' );

	//wp_enqueue_style( 'palette_stylesheet' );
	//wp_enqueue_style( 'palette_ie_only' );

	//$wp_styles->add_data( 'palette_ie_only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

} // End palette_enqueue_styles()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Load modernizr and custom script to allow us to use SVGs while stil having an IE fallback.     */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_enqueue_scripts' ) ) {
function palette_enqueue_scripts() {

	wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js', array( 'jquery' ), false );
	wp_register_script('scrollreveal', '//cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/0.1.2/scrollReveal.min.js', false );
	wp_register_script('palette_plugins', get_stylesheet_directory_uri() . '/assets/js/plugins.min.js', array( 'jquery' ) );
	wp_register_script('palette_scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '', true );
	
//	if ( get_option('palette_load_modernizr') == 'true' ) {
		wp_enqueue_script('modernizr'); // Enqueue it!	
//	}

//	if ( get_option('palette_load_scrollreveal') == 'true' ) {
		wp_enqueue_script('scrollreveal'); // Enqueue it!
//	}

	wp_enqueue_script('palette_plugins'); // Enqueue it!
	wp_enqueue_script('palette_scripts'); // Enqueue it!

	do_action( 'palette_enqueue_scripts' );
} // End palette_enqueue_scripts()
} // End function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Assign a ".magnific" class to all images in the WordPress content area 						   */
/* http://ajtroxell.com/use-magnific-popup-with-wordpress-now/  								   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'add_lightbox_rel_replace' ) ) {
function add_lightbox_rel_replace($content) {
	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
  	$replacement = '<a$1class="magnific" href=$2$3.$4$5$6</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
} // add_lightbox_rel_replace($content)
} // End function wrapper