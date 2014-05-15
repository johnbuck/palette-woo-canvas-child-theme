<?
global $woo_options;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load custom frontend CSS
add_action('woo_head', 'palette_add_frontend_styles');

// Load custom frontend Javascript/jQeury
add_action('woo_foot', 'palette_add_frontend_scripts');

// Enqueue all the admin styles
add_action('admin_enqueue_scripts', 'palette_add_option_icon');

if ( $woo_options['woo_slider_biz'] != 'true' && get_option('palette_woo_slider') == 'true' ) {
	if ( get_option('palette_woo_slider_full') == 'false' ) {
		add_action('woo_main_before', 'palette_display_woo_slider', 30);
	}

	elseif ( get_option('palette_woo_slider_full') == 'true' ) {
		add_action('woo_content_before', 'palette_display_woo_slider', 30);
	}
}

// Add slide just after the header and before the main navigation
//if ( get_option('palette_woo_slider_header') == 'true' ) {
//	add_action('woo_header_after', 'palette_display_woo_slider', 10);
//}

// Add banner before the content
if ( get_option('palette_main_banner') == 'true' ) {

	if ( get_option('palette_customized_header') == 'true' ) {
		add_action( 'woo_header_inside', 'palette_main_banner', 20 );
	} else {
		add_action( 'woo_content_before', 'palette_main_banner', 10 );
	}

}



// Put the CTA at the bottom of the page if the contact section is activated
// If not, put it just after the features section
if ( get_option('palette_cta') == 'true' && get_option('palette_contact_section') == 'true' ) {
	add_action( 'woo_main_before', 'palette_call_to_action', 50 );
} elseif ( get_option('palette_cta') == 'true' && get_option('palette_contact_section') != 'true' ) {
	add_action( 'woo_main_before', 'palette_call_to_action', 90 );
}

if ( get_option('palette_features_section') == 'true' && class_exists('Woothemes_Features') ) {
	add_action( 'woo_main_before', 'woo_palette_add_features_section', 40 );
}

//if ( get_option('palette_features_section') == 'true' && class_exists('Woothemes_Features') ) {
	add_action( 'woo_main_before', 'palette_add_portfolio_section', 40 );
//	add_filter( 'body_class','palette_add_portfolio_class' );
//	add_filter( 'woo_load_portfolio_js','palette_load_portfolio_js' );
//	add_filter( 'woo_load_portfolio_css','palette_load_portfolio_css' );
//}


if ( class_exists('Woothemes_Features') && class_exists('ACF') && get_option('palette_feature_enable_fa') == 'true' ) {
	add_action( 'wp_enqueue_scripts', 'palette_enqueue_font_awesome' );
	add_action( 'init','palette_extend_features');
	add_filter( 'woothemes_features_item_template', 'palette_use_font_awesome_feature_image', 10, 2);
	add_filter( 'woothemes_features_template', 'palette_add_font_awesome_image', 10, 2);
}

if ( get_option('palette_testimonials_section') == 'true' && class_exists('Woothemes_Testimonials') ) {
	add_action( 'woo_main_before', 'woo_palette_add_testimonials_section', 50 );
}

if ( get_option('palette_about_section') == 'true' ) {
	add_action( 'woo_main_before', 'woo_palette_add_about_section', 60 );
}

if ( get_option('palette_team_section') == 'true' && class_exists('Woothemes_Our_Team') ) {
	add_action( 'woo_main_before', 'woo_palette_add_team_section', 70 );
	add_filter( 'woothemes_our_team_content', 'woo_palette_shorten_team_content' );
}

if ( get_option('palette_contact_section') == 'true' ) {
	add_action( 'woo_main_before', 'woo_palette_add_contact_section', 80 );
}

if ( get_option('palette_blog_section') == 'false' ) {
	add_action('woo_head', 'palette_hide_home_blog_section');
}

if ( get_option('palette_add_featured_image') == 'true' ) {
	add_action( 'woo_post_inside_before', 'palette_add_featured_image', 10 );
}

add_filter( 'template_include', 'palette_maybe_load_bbpress_tpl', 99 );
add_filter( 'bbp_get_template_stack', 'palette_deregister_bbpress_template_stack' );

/*-------------------------------------------------------------------------------------------------*/
/* Add custom styling to the woo_head action hook   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists('palette_add_frontend_styles') ) {
	function palette_add_frontend_styles() {
		include ( 'palette-extend-canvas-styles.php' );
	}
}

/*-------------------------------------------------------------------------------------------------*/
/* Add custom scripts to the woo_foot action hook   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists('palette_add_frontend_scripts') ) {
	function palette_add_frontend_scripts() {

		// Sticky header
		$js = '<script>';
		$js .= 'jQuery(document).ready(function () { jQuery("#top").headshrinker({ zindex: 9995 }); });';
		$js .= 'window.scrollReveal = new scrollReveal();';
		$js .= '</script>';
	
		// Echo out the code
		echo $js;
	}
}

/*-------------------------------------------------------------------------------------------------*/
/* Add custom styling to the admin area  */
/*-------------------------------------------------------------------------------------------------*/
function palette_add_option_icon(){
	if ( is_admin() ) {
		echo '<style type="text/css">#woo_container #woo-nav ul li.palette span.icon { background-image: url(' . get_stylesheet_directory_uri() . '/assets/images/icons/option-icon-palette.png);}</style>';
	}
}


/*-------------------------------------------------------------------------------------------------*/
/* Replace the woo_logo function with a modified version to eliminate the H1 in the site title     */
/*-------------------------------------------------------------------------------------------------*/
function woo_logo () {
	$settings = woo_get_dynamic_values( array( 'logo' => '' ) );
	// Setup the tag to be used for the header area (`h1` on the front page and `span` on all others).
	$heading_tag = 'h1';
	if ( get_option('palette_header_remove_logo_h1') == 'true' ) { $heading_tag = 'p'; }

	// Get our website's name, description and URL. We use them several times below so lets get them once.
	$site_title = get_bloginfo( 'name' );
	$site_url = home_url( '/' );
	$site_description = get_bloginfo( 'description' );

echo '<div id="logo">';

	// Website heading/logo and description text.
	if ( ( '' != $settings['logo'] ) ) {
		$logo_url = $settings['logo'];
		if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );

		echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( $site_title ) . '" /></a>' . "\n";
	} // End IF Statement

	echo '<' . $heading_tag . ' class="site-title"><a href="' . esc_url( $site_url ) . '">' . $site_title . '</a></' . $heading_tag . '>' . "\n";
	if ( $site_description ) { echo '<span class="site-description">' . $site_description . '</span>' . "\n"; }

echo '</div>';
} // woo_logo()

/*-----------------------------------------------------------------------------------*/
/* Add banner before the content */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_main_banner' ) ) {
function palette_main_banner() {
	if ( is_front_page() ) {
		get_template_part( 'includes/templates/home-banner' );
	}
} // palette_main_banner() 
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add the WP Parallax content slider, if it exists. Disabled in favor of custom slider.  */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_alternate_slider' ) ) {
function palette_alternate_slider() {
	if ( is_front_page() ) { }
} // palette_alternate_slider()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add the the custom content slider, if it exists. */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists('palette_display_woo_slider') ) {
function palette_display_woo_slider() {
	if ( is_front_page() ) {
		if ( function_exists('wooslider') ) {
			wooslider( array( 'slider_type' => 'slides', 'smoothheight' => 'true' ) );
		}
	}
} // palette_display_woo_slider()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add a custom call to action after the slider.												   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_call_to_action' ) ) {
function palette_call_to_action() {
	if ( is_front_page() ) {
		get_template_part( 'includes/templates/home-cta' );
	}
} // palette_call_to_action()
} // END function wrapper

/*-----------------------------------------------------------------------------------*/
/* Add the features section to the home page */
/* http://docs.woothemes.com/document/docs-features-plugin/ */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_features_section' ) ) {
function woo_palette_add_features_section() {
	if ( is_front_page() && post_type_exists('feature') ) {
		get_template_part( 'includes/templates/home-features' );
	}
} // woo_palette_add_features_section()
} // END function wrapper

/*-----------------------------------------------------------------------------------*/
/* Extend the Features plugin to also use Font Awesome 4.0 Icons */
/* http://docs.woothemes.com/document/docs-features-plugin/ */
/*-----------------------------------------------------------------------------------*/

// Filter the feature HTML template to add a font awesome icon
if ( ! function_exists( 'palette_font_awesome_feature_image' ) ) {
function palette_use_font_awesome_feature_image( $tpl, $args) {
	if ( is_front_page() ) {
		$image = '%%NEWIMAGE%%';
		$class = '%%CLASS%%';
		$tpl = '<div class="' . $class . '">' . $image . '<h3 class="feature-title">%%TITLE%%</h3><div class="feature-content">%%CONTENT%%</div></div>';
		return $tpl;
	}
} // palette_use_font_awesome_feature_image( $tpl, $args)
} // END function wrapper

// If the no image is set, use the font awesome icon selected instead. If neither is set, don't display anything
if ( ! function_exists( 'palette_add_font_awesome_image' ) ) {
function palette_add_font_awesome_image( $template, $post) {
	if ( is_front_page() ) {
		$icon = get_field('palette_fa_icon_select');
		$size = get_option('palette_feature_icon_size');
		$class = 'slide';

		if ( $icon && $size ) {
			$image = '<div class="fa-icon-wrap"><i class="fa ' . $icon . ' ' . $size . '"></i></div>';
		}
		// Optionally display the icon or image, if it is available.
		if ( $image ) {
			$template = str_replace( '%%NEWIMAGE%%', $image, $template );
		} elseif ( $post->image && ! $image  ) {
			$template = str_replace( '%%NEWIMAGE%%', $post->image, $template );
		} else {
			$template = str_replace( '%%NEWIMAGE%%', '', $template );
		}

		$template = str_replace( '%%NEWCLASS%%', $class, $template );
		return $template;
	}
} // palette_add_font_awesome_image( $template, $post)
} // END function wrapper

// Register and load font awesome CSS files using a CDN.
if ( ! function_exists( 'palette_enqueue_font_awesome' ) ) {
function palette_enqueue_font_awesome() {
	wp_enqueue_style( 'palette-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css', array(), '4.0.0' );
} // palette_enqueue_font_awesome()
} // END function wrapper

// Add ACF custom fields to the Features custom post type
// TODO: Include ACF in the child theme
if ( ! function_exists( 'palette_extend_features' ) ) {
function palette_extend_features() {
	include get_stylesheet_directory() . '/includes/palette-acf-font-awesome.php';
} // palette_extend_features()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add a portfolio section												   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_add_portfolio_section' ) ) {
function palette_add_portfolio_section() {
	if ( is_front_page() ) {
		get_template_part( 'includes/templates/home-projects' );
	}
} // palette_add_portfolio_section()
} // END function wrapper


/*-----------------------------------------------------------------------------------*/
/* Add the testimonials section to the home page */
/* http://wordpress.org/plugins/testimonials-by-woothemes/other_notes/ */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_testimonials_section' ) ) {
function woo_palette_add_testimonials_section() {
	if ( is_front_page() && post_type_exists('testimonial') ) {
		get_template_part( 'includes/templates/home-testimonials' );
	}
} // woo_palette_add_testimonials_section()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add an about us section												   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_about_section' ) ) {
function woo_palette_add_about_section() {
	if ( is_front_page() && get_option('palette_about_body_text') ) {
		get_template_part( 'includes/templates/home-about' );
	}
} // woo_palette_add_about_section()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Add a skills section to show off your prowess.   */
/*-------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_skills_section' ) ) {
function woo_palette_add_skills_section() {
	if ( is_front_page() ) {
		// Do something
	}
} // woo_palette_add_skills_section()
} // END function wrapper

/*-----------------------------------------------------------------------------------*/
/* Add the our team section to the home page */
/* http://docs.woothemes.com/document/docs-features-plugin/ */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_team_section' ) ) {
function woo_palette_add_team_section() {
	if ( is_front_page() ) {
		get_template_part( 'includes/templates/home-team' );
	}
}
}

/*-----------------------------------------------------------------------------------*/
/* Shorten the team member description to a manageable size
/*-----------------------------------------------------------------------------------*/
function woo_palette_shorten_team_content( $post ) {
	$post = palette_custom_excerpt(20);

	return $post;
}

// Helper function to shorten the excerpt up
// Move this to functions.php
function palette_custom_excerpt( $limit ) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}	
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/* Add the contact section to the home page */
/* http://docs.woothemes.com/document/docs-features-plugin/ */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'woo_palette_add_contact_section' ) ) {
function woo_palette_add_contact_section() {
	if ( is_front_page() ) {
		
		get_template_part( 'includes/templates/home-alternate-contact' );

		// This is styled, but it doesn't work yet.
		//get_template_part( 'includes/templates/home-contact' );

	}
}
}

/*-----------------------------------------------------------------------------------*/
/* Hide the blog section on the home page */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_hide_home_blog_section' ) ) {
	function palette_hide_home_blog_section() {
		// Do something
	}
}

/*-----------------------------------------------------------------------------------*/
/* Add a featured image to the top of pages  */
/* TODO: Make these widths pull from the current page widths */
/* TODO: Add an option for turning this functionality on and off */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'palette_add_featured_image' ) ) {
function palette_add_featured_image() {
	if ( is_page() && ! is_front_page() ) {
		$palette_settings = array(
						'layout' => 'two-col-left',
						'portfolio_layout' => 'one-col'
						);
		$palette_settings = woo_get_dynamic_values( $palette_settings );
		$layout = $palette_settings['layout'];

		$settings = ( ! woo_active_sidebar( 'primary' ) && 'one-col' == $layout ) ? array('image_w' => 679, 'image_h' => 200) : array('image_w' => 1100, 'image_h' => 200) ;
		$data = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
		$data = ( $data ) ? array( 'image_url' => $data[0], 'image_w' => $settings['image_w'], 'image_h' => $settings['image_h'], 'image_class' => 'banner featured', 'image_alt' => 'Banner for ' . get_the_title() . ' page') : '' ;
		$html = ( $data ) ? '<img src="' . esc_url( $data['image_url'] ) . '" width=' . esc_attr( $data['image_w'] ) . ' alt="' . esc_attr( $data['image_alt'] ) . '" class="' . esc_attr( $data['image_class'] ) . '" />' : '' ;
		echo $html;
	}
} // palette_add_featured_image()
} // END function wrapper

/*-------------------------------------------------------------------------------------------------*/
/* Make Canvas work properly with bbPress
/* https://gist.github.com/mattyza/1b01583441b11c8d04d0 
/* https://gist.github.com/mattyza/f210cadb7f70188d513d
/*-------------------------------------------------------------------------------------------------*/ 
function palette_maybe_load_bbpress_tpl ( $tpl ) {
	if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
		$tpl = locate_template( 'includes/templates/bbpress-fix.php' );
	}
	return $tpl;
} // End palette_maybe_load_bbpress_tpl()
 
function palette_deregister_bbpress_template_stack ( $stack ) {
	if ( 0 < count( $stack ) ) {
		$stylesheet_dir = get_stylesheet_directory();
		$template_dir = get_template_directory();
		foreach ( $stack as $k => $v ) {
			if ( $stylesheet_dir == $v || $template_dir == $v ) {
				unset( $stack[$k] );
			}
		}
	}
	return $stack;
} // End palette_deregister_bbpress_template_stack()