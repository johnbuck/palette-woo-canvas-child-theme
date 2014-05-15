<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function woo_options_add( $options ) {

	$shortname = "palette";
	$home = site_url();
	
	// More Options
	$options_pixels = array();
	$other_entries = array( __( 'Select a number:', 'palette' ), '0' );
	$other_entries_2 = array( __( 'Select a number:', 'palette' ) );
	$total_possible_numbers = intval( apply_filters( 'woo_total_possible_numbers', 20 ) );
	for ( $i = 1; $i <= $total_possible_numbers; $i++ ) {
		$options_pixels[] = $i . 'px';
		$other_entries[] = $i;
		$other_entries_2[] = $i;
	}
	
	$options[] = array( "name" => "Palette Options",
						"icon" => "palette",
	                    "type" => "heading");
	
	$options[] = array( 'name' => __( 'Onepage Header', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Hide Tagline', 'palette' ),
						"desc" => __( 'Hide the site tagline from displaying.', 'palette' ),
						"id" => $shortname."_header_hide_tagline",
						"std" => "true",
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Remove Logo H1', 'palette' ),
						"desc" => __( 'Remove the H1 tag from the logo and move it to the banner section', 'palette' ),
						"id" => $shortname."_header_remove_logo_h1",
						"std" => "true",
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Custom Homepage Header', 'palette' ),
						"desc" => __( 'Enable customized header section with background image and intro text', 'palette' ),
						"id" => $shortname."_customized_header",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => "Home Header Background Image",
	                    "desc" => "The image that goes along with my new option.",
	                    "id" => $shortname."_header_background_image",
	                    "std" => "",
	                    'class' => 'hidden',
	                    "type" => "upload");

	$options[] = array( "name" => __( 'Home Header Margin Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header margin.', 'woothemes' ),
						"id" => $shortname."_header_margin_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_header_margin_top',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_header_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));
	$options[] = array( "name" => __( 'Home Header Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_header_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_header_padding_top',
												'type' => 'text',
												'std' => '230',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_header_padding_bottom',
												'type' => 'text',
												'std' => '100',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Home Site Title Font Style', 'woothemes' ),
						"desc" => __( 'Select typography for site title.', 'woothemes' ),
						"id" => $shortname."_font_logo",
						"std" => array('size' => '40','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'bold','color' => '#222222'),
	                    'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => __( 'Home Site Description Font Style', 'woothemes' ),
						"desc" => __( 'Select typography for site description.', 'woothemes' ),
						"id" => $shortname."_font_desc",
						"std" => array('size' => '13','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'thin','color' => '#999999'),
	                    'class' => 'hidden last',
						"type" => "typography");

	// Text banner
	$options[] = array( 'name' => __( 'Banner', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Banner', 'palette' ),
						"desc" => __( 'Enable main banner to display just below the navigation', 'palette' ),
						"id" => $shortname."_main_banner",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");
	
	$options[] = array( "name" => "Banner Heading",
	                    "desc" => "Larger, bolded text above slider.",
	                    "id" => $shortname."_main_banner_text",
	                    "std" => "We're professionals, and we love what we do.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Banner Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the Banner Heading.', 'palette' ),
						"id" => $shortname."_main_banner_text_font",
						"std" => array('size' => '30','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'bold','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Banner Subheading",
	                    "desc" => "Smaller text above slider.",
	                    "id" => $shortname."_sub_banner_text",
	                    "std" => "Bringing you only the best in WordPress.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Banner Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the Banner SubHeading.', 'palette' ),
						"id" => $shortname."_sub_banner_text_font",
						"std" => array('size' => '18','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'thin','color' => '#ababab'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => __( 'Banner Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_main_banner_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_main_banner_padding_top',
												'type' => 'text',
												'std' => '6',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_main_banner_padding_bottom',
												'type' => 'text',
												'std' => '6',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Banner Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired banner margin.', 'Pancake_' ),
						"id" => $shortname."_main_banner_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_main_banner_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

	$options[] = array( 'name' => __( 'Slider Layout', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Alternate slider', 'palette' ),
						"desc" => __( 'Enable the alternate slider to display on home page', 'palette' ),
						"id" => $shortname."_alternate_slider",
						"std" => "false",
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Custom WooSlider', 'palette' ),
						"desc" => __( 'Enable the custom slider to display on home page without a special template', 'palette' ),
						"id" => $shortname."_woo_slider",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Slider Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired slider margin.', 'Pancake_' ),
						"id" => $shortname."_slider_margin_tb",
						"std" => "",
						'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_slider_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

	$options[] = array( "name" => __( 'Full Width WooSlider', 'palette' ),
						"desc" => __( 'Enable the WooSlide to display the full width of the home page', 'palette' ),
						"id" => $shortname."_woo_slider_full",
						"std" => "false",
						'class' => 'hidden last',
						"type" => "checkbox");

	$options[] = array( 'name' => __( 'Call to Action', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Call to Action (CTA)', 'palette' ),
						"desc" => __( 'Enable call to action to display just after the slider', 'palette' ),
						"id" => $shortname."_cta",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the call to action section full width', 'palette' ),
						"id" => $shortname."_cta_full",
						"std" => "true",
						'class' => 'hidden',
						"type" => "checkbox");
		
	$options[] = array( "name" => "CTA Text",
	                    "desc" => "Call to action text just below slider.",	
	                    "id" => $shortname."_cta_text",
	                    "std" => "Building you clean, secure, and affordable websites. With gusto.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'CTA Text Font Style', 'palette' ),
						"desc" => __( 'Select typography for the CTA text.', 'palette' ),
						"id" => $shortname."_cta_text_font",
						"std" => array('size' => '30','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'bold','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "CTA Button",
	                    "desc" => "Call to action button text just below slider.",
	                    "id" => $shortname."_cta_button",
	                    "std" => "Sign up",
	                    'class' => 'hidden',
	                    "type" => "text");
	                    
	$options[] = array( "name" => "CTA Link",
	                    "desc" => "Where the call to action button should link.",
	                    "id" => $shortname."_cta_link",
	                    "std" => $home."/#",
	                    'class' => 'hidden',
	                    "type" => "text");
	
	$options[] = array( "name" => __( 'CTA Button Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for buttons or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_cta_button_color",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'CTA Button Hover Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for buttons or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_cta_button_hover_color",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'CTA Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the call to action.', 'palette' ),
						"id" => $shortname."_cta_top_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'CTA Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the call to action background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_cta_bg_color",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'CTA Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the call to action.', 'palette' ),
						"id" => $shortname."_cta_bottom_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'CTA Padding Top/Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired call to action padding.', 'palette' ),
						"id" => $shortname."_cta_padding_tb",
						"std" => "",
						'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_cta_padding_top',
												'type' => 'text',
												'std' => '6',
												'meta' => __( 'Top', 'palette' ) ),
										array(  'id' => $shortname. '_cta_padding_bottom',
												'type' => 'text',
												'std' => '6',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

	$options[] = array( "name" => __( 'CTA Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired call to action margin.', 'palette' ),
						"id" => $shortname."_cta_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_cta_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));


	$options[] = array( 'name' => __( 'Features', 'palette' ),
						'type' => 'subheading');

if ( class_exists('Woothemes_Features') ) {
	$options[] = array( "name" => __( 'Enable Features Section', 'palette' ),
						"desc" => __( 'Add a features section just before the loop', 'palette' ),
						"id" => $shortname."_features_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the features section full width', 'palette' ),
						"id" => $shortname."_features_full",
						"std" => "true",
						'class' => 'hidden',
						"type" => "checkbox");

	$options[] = array( "name" => "Features Heading",
	                    "desc" => "Larger, bolded text above slider.",
	                    "id" => $shortname."_features_head_text",
	                    "std" => "Features. Features. Features.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Features Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the Banner Heading.', 'palette' ),
						"id" => $shortname."_features_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Features Subheading",
	                    "desc" => "Smaller text above slider.",
	                    "id" => $shortname."_features_subhead_text",
	                    "std" => "Forget about location, it's the features that matter.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Features Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the Banner SubHeading.', 'palette' ),
						"id" => $shortname."_features_subhead_text_font",
						"std" => array('size' => '18','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'regular','color' => '#ababab'),
						'class' => 'hidden',
						"type" => "typography");	

	$options[] = array( "name" => __( 'Total Number of Features to Display', 'palette' ),
						"desc" => __( 'The number of features to display on the home page', 'palette' ),
						"id" => $shortname."_features_limit",
						"std" => 4,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '3', '4', '6', '8', '9', '12', '15', '16' ) );

	$options[] = array( "name" => __( 'Number of Features to Display Per Row', 'palette' ),
						"desc" => __( 'The number of features to display on the home page', 'palette' ),
						"id" => $shortname."_features_per_row",
						"std" => 4,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '2', '3', '4' ) );

	$options[] = array( "name" => __( 'Image Size', 'palette' ),
						"desc" => __( 'The size in pixels of the feature images. Images will render at a 1:1 aspect ratio.', 'palette' ),
						"id" => $shortname."_feature_image_size",
						"std" => 100,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '50', '60', '70', '80', '90', '100', '125', '150', '175', '200' ) );

	$options[] = array( "name" => __( 'Title Link', 'palette' ),
						"desc" => __( 'Enable title to actually link somewhere.', 'palette' ),
						"id" => $shortname."_feature_link",
						"std" => "true",
						'class' => 'hidden',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_features_bg_color",
						"std" => "#FFFFFF",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Background Hover Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for teh background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_feature_bg_hover_color",
						"std" => "#DD7878",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Text Hover Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for text or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_feature_text_hover_color",
						"std" => "#FFFFFF",
						'class' => 'hidden',
						"type" => "color");

/*		$options[] = array( "name" => __( 'Features Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the call to action.', 'palette' ),
						"id" => $shortname."_features_top_border",
						"std" => array('width' => '0','style' => 'solid','color' => ''),
						'class' => 'hidden last',
						"type" => "border"); */

	$options[] = array( "name" => __( 'Features Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_features_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_features_padding_top',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_features_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Features Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired testimonials margin.', 'Pancake_' ),
						"id" => $shortname."_testimonials_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_features_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));


	$options[] = array( "name" => __( 'Font Awesome', 'palette' ),
						"desc" => "",
						"id" => $shortname."_features_notice",
						"std" => __( 'Palette adds the Font Awesome fonts to the WooThemes features.', 'palette' ),
						"type" => "info");

	$options[] = array( "name" => __( 'Font Awesome Icons', 'palette' ),
						"desc" => __( 'Enable Font Awesome icons as feature images', 'palette' ),
						"id" => $shortname."_feature_enable_fa",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Icon Size', 'palette' ),
						"desc" => __( 'The size of the font awesome icons in relative terms.', 'palette' ),
						"id" => $shortname."_feature_icon_size",
						'class' => 'hidden',
						"type" => "select2",
						"options" => array("fa-2x" => __( 'Small', 'palette' ), "fa-3x" => __( 'Medium', 'palette' ), "fa-4x" => __( 'Large', 'palette' ), "fa-5x" => __( 'Humongous', 'palette' ) ) );

	$options[] = array( "name" => __( 'Icon Color', 'palette' ),
						"desc" => __( 'Pick a custom color for the feature icons or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_feature_icon_color",
						"std" => "#444444",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Icon Hover Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the feature icons or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_feature_icon_hover_color",
						"std" => "#FFFFFF",
						'class' => 'hidden last',
						"type" => "color");

} else {
	$options[] = array( "name" => __( 'Install Features', 'palette' ),
						"desc" => "",
						"id" => $shortname."_features_notice",
						"std" => __( 'Palette uses a variety of plugins and tools created by WooThemes. To make full use of the features Palette has to offer, install the free Features plugin by Woothemes.', 'palette' ),
						"type" => "info");
}

// Projects options
	$options[] = array( 'name' => __( 'Projects', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Projects Section', 'palette' ),
						"desc" => __( 'Enable portfolio section to display on the home page', 'palette' ),
						"id" => $shortname."_portfolio_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the portfolio section full width', 'palette' ),
						"id" => $shortname."_portfolio_full",
						"std" => "false",
						'class' => 'hidden',
						"type" => "checkbox");	

	$options[] = array( "name" => "Projects Heading",
	                    "desc" => "Larger, bolded text above section.",
	                    "id" => $shortname."_portfolio_head_text",
	                    "std" => "Work we've done",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Projects Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials heading.', 'palette' ),
						"id" => $shortname."_portfolio_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Projects Subheading",
	                    "desc" => "Smaller text below heading.",
	                    "id" => $shortname."_portfolio_subhead_text",
	                    "std" => "We build clean, elegant, and secure websites.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Projects Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials subheading.', 'palette' ),
						"id" => $shortname."_portfolio_subhead_text_font",
						"std" => array('size' => '20','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'normal','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_portfolio_bg_color",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the portfolio section.', 'palette' ),
						"id" => $shortname."_portfolio_top_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the portfolio section.', 'palette' ),
						"id" => $shortname."_portfolio_bottom_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Left Border', 'palette' ),
						"desc" => __( 'Specify border properties for the portfolio section.', 'palette' ),
						"id" => $shortname."_portfolio_left_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Right Border', 'palette' ),
						"desc" => __( 'Specify border properties for the portfolio section.', 'palette' ),
						"id" => $shortname."_portfolio_right_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Projects Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_portfolio_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_portfolio_padding_top',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_portfolio_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Projects Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired portfolio margin.', 'palette' ),
						"id" => $shortname."_portfolio_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_portfolio_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

	$options[] = array( 'name' => __( 'Testimonials', 'palette' ),
						'type' => 'subheading');

if ( class_exists('Woothemes_Testimonials') ) {
	$options[] = array( "name" => __( 'Enable Testimonials Section', 'palette' ),
						"desc" => __( 'Add the testimonials section to the home page', 'palette' ),
						"id" => $shortname."_testimonials_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");	

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the testimonials section full width', 'palette' ),
						"id" => $shortname."_testimonials_full",
						"std" => "true",
						'class' => 'hidden',
						"type" => "checkbox");	

	$options[] = array( "name" => "Testimonials Heading",
	                    "desc" => "Larger, bolded text above section.",
	                    "id" => $shortname."_testimonials_head_text",
	                    "std" => "Our customers think we're the bees knees.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Testimonials Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials heading.', 'palette' ),
						"id" => $shortname."_testimonials_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Testimonials Subheading",
	                    "desc" => "Smaller text below heading.",
	                    "id" => $shortname."_testimonials_subhead_text",
	                    "std" => "Just read what they have to say about us.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Testimonials Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials subheading.', 'palette' ),
						"id" => $shortname."_testimonials_subhead_text_font",
						"std" => array('size' => '20','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'normal','color' => '#ababab'),
						'class' => 'hidden',
						"type" => "typography");	


	$options[] = array( "name" => __( 'Total Number of Testimonials to Display', 'palette' ),
						"desc" => __( 'The number of features to display on the home page', 'palette' ),
						"id" => $shortname."_testimonials_limit",
						"std" => 4,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '2', '3', '4', '6', '8' ) );

	$options[] = array( "name" => __( 'Number of Testimonials to Display Per Row', 'palette' ),
						"desc" => __( 'The number of features to display per row on the home page', 'palette' ),
						"id" => $shortname."_testimonials_per_row",
						"std" => 3,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '2', '3', '4' ) );

	$options[] = array( "name" => __( 'Image Size', 'palette' ),
						"desc" => __( 'The size in pixels of the testimonial images. Images will render at a 1:1 aspect ratio.', 'palette' ),
						"id" => $shortname."_testimonial_image_size",
						"std" => 70,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '50', '60', '70', '80', '90', '100' ) );

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_testimonials_bg_color",
						"std" => "#fafafa",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the testimonials section.', 'palette' ),
						"id" => $shortname."_testimonials_top_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the testimonials section.', 'palette' ),
						"id" => $shortname."_testimonials_bottom_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Left Border', 'palette' ),
						"desc" => __( 'Specify border properties for the testimonials section.', 'palette' ),
						"id" => $shortname."_testimonials_left_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Right Border', 'palette' ),
						"desc" => __( 'Specify border properties for the testimonials section.', 'palette' ),
						"id" => $shortname."_testimonials_right_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Testimonials Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_testimonials_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_testimonials_padding_top',
												'type' => 'text',
												'std' => '40',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_testimonials_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Testimonials Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired testimonials margin.', 'Pancake_' ),
						"id" => $shortname."_testimonials_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_testimonials_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

} else {
	$options[] = array( "name" => __( 'Install Testimonials', 'palette' ),
					"desc" => "",
					"id" => $shortname."_testimonials_notice",
					"std" => __( 'Palette uses a variety of plugins and tools created by WooThemes. To make full use of the features Palette has to offer, install the free Testimonials plugin by Woothemes.', 'palette' ),
					"type" => "info");
}

// About options
	$options[] = array( 'name' => __( 'About', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'About Section', 'palette' ),
						"desc" => __( 'Enable about section to display on the home page', 'palette' ),
						"id" => $shortname."_about_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the about section full width', 'palette' ),
						"id" => $shortname."_about_full",
						"std" => "false",
						'class' => 'hidden',
						"type" => "checkbox");	

	$options[] = array( "name" => "About Heading",
	                    "desc" => "Larger, bolded text above section.",
	                    "id" => $shortname."_about_head_text",
	                    "std" => "A little about us",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'About Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials heading.', 'palette' ),
						"id" => $shortname."_about_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "About Subheading",
	                    "desc" => "Smaller text below heading.",
	                    "id" => $shortname."_about_subhead_text",
	                    "std" => "Great design isn\'t just a job, it\'s a lifestyle.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'About Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials subheading.', 'palette' ),
						"id" => $shortname."_about_subhead_text_font",
						"std" => array('size' => '20','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'normal','color' => '#ffffff'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => __( 'About Visual Element', 'palette' ),
						"desc" => __( 'Choose whether to display a YouTube video, an image, or nothing at all.', 'palette' ),
						"id" => $shortname."_about_visual_element",
						'class' => 'hidden',
						"type" => "select2",
						"options" => array("none" => __( 'None', 'palette' ), "image" => __( 'Image', 'palette' ), "video" => __( 'Video', 'palette' ) ) );

	$options[] = array( "name" => "About Image",
	                    "desc" => "Upload an image, or specify the image address of your image. (http://yoursite.com/image.png)",
	                    "id" => $shortname."_about_image_source",
	                    'class' => 'hidden',
	                    "std" => "http://placeimg.com/230/230/tech",
	                    "type" => "upload");

	$options[] = array( "name" => "About Video",
	                    "desc" => "Specify the address of the about video",
	                    "id" => $shortname."_about_video_source",
	                    "std" => "//www.youtube.com/embed/qZrXoaWh8Oc",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'About Video Dimensions', 'palette' ),
						"desc" => __( 'Enter the desired height and width for the about video.', 'Pancake_' ),
						"id" => $shortname."_about_video_hw",
						"std" => "",
						'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_about_video_height',
												'type' => 'text',
												'std' => '275',
												'meta' => __( 'Height', 'palette' ) ),
										array(  'id' => $shortname. '_about_video_width',
												'type' => 'text',
												'std' => '560',
												'meta' => __( 'Width', 'palette' ) )
									  ));

	$options[] = array( "name" => "About Body Text",
	                    "desc" => "Type the about body text here.",
	                    "id" => $shortname."_about_body_text",
	                    "std" => "Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.",
	                    'class' => 'hidden',
	                    "type" => "textarea");

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_about_bg_color",
						"std" => "#fafafa",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the about section.', 'palette' ),
						"id" => $shortname."_about_top_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the about section.', 'palette' ),
						"id" => $shortname."_about_bottom_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Left Border', 'palette' ),
						"desc" => __( 'Specify border properties for the about section.', 'palette' ),
						"id" => $shortname."_about_left_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Right Border', 'palette' ),
						"desc" => __( 'Specify border properties for the about section.', 'palette' ),
						"id" => $shortname."_about_right_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'About Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_about_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_about_padding_top',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_about_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'About Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired about margin.', 'Pancake_' ),
						"id" => $shortname."_about_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_about_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

//Our team options
	$options[] = array( 'name' => __( 'Team Members', 'palette' ),
						'type' => 'subheading');

if ( class_exists('Woothemes_Testimonials') ) {
	$options[] = array( "name" => __( 'Enable Team Members Section', 'palette' ),
						"desc" => __( 'Add the team members section to the home page', 'palette' ),
						"id" => $shortname."_team_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the our team section full width', 'palette' ),
						"id" => $shortname."_team_full",
						"std" => "true",
						'class' => 'hidden',
						"type" => "checkbox");	

	$options[] = array( "name" => "Team Members Heading",
	                    "desc" => "Larger, bolded text above section.",
	                    "id" => $shortname."_team_head_text",
	                    "std" => "Meet our team",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Team Members Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials heading.', 'palette' ),
						"id" => $shortname."_team_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Team Members Subheading",
	                    "desc" => "Smaller text below heading.",
	                    "id" => $shortname."_team_subhead_text",
	                    "std" => "They're super skilled, and awesome to boot.",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Team Members Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials subheading.', 'palette' ),
						"id" => $shortname."_team_subhead_text_font",
						"std" => array('size' => '20','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'normal','color' => '#ffffff'),
						'class' => 'hidden',
						"type" => "typography");	


	$options[] = array( "name" => __( 'Total Number of Team Members to Display', 'palette' ),
						"desc" => __( 'The number of team members to display on the home page', 'palette' ),
						"id" => $shortname."_team_limit",
						"std" => 4,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '2', '3', '4', '6', '8' ) );

	$options[] = array( "name" => __( 'Display Per Row', 'palette' ),
						"desc" => __( 'The number of team members to display per row on the home page', 'palette' ),
						"id" => $shortname."_team_per_row",
						"std" => 3,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '2', '3', '4' ) );

	$options[] = array( "name" => __( 'Image Size', 'palette' ),
						"desc" => __( 'The size in pixels of the team member images. Images will render at a 1:1 aspect ratio.', 'palette' ),
						"id" => $shortname."_team_image_size",
						"std" => 70,
						'class' => 'hidden',
						"type" => "select",
						"options" => array( '50', '60', '70', '80', '90', '100', '125', '150', '200', '225', '250', '300', '350', '400' ) );

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_team_bg_color",
						"std" => "#fafafa",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the our team section.', 'palette' ),
						"id" => $shortname."_team_top_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the  our team section.', 'palette' ),
						"id" => $shortname."_team_bottom_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Left Border', 'palette' ),
						"desc" => __( 'Specify border properties for the  our team section.', 'palette' ),
						"id" => $shortname."_team_left_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Right Border', 'palette' ),
						"desc" => __( 'Specify border properties for the  our team section.', 'palette' ),
						"id" => $shortname."_team_right_border",
						"std" => array('width' => '1','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Team Members Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_team_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_team_padding_top',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_team_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Our Team Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired  our team margin.', 'Pancake_' ),
						"id" => $shortname."_team_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_team_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

} else {
	$options[] = array( "name" => __( 'Install Our Team', 'palette' ),
					"desc" => "",
					"id" => $shortname."_team_notice",
					"std" => __( 'Palette uses a variety of plugins and tools created by WooThemes. To make full use of the features Palette has to offer, install the free Our Team plugin by Woothemes.', 'palette' ),
					"type" => "info");
}

// Contact section
	$options[] = array( 'name' => __( 'Contact', 'palette' ),
						'type' => 'subheading');

	$options[] = array( "name" => __( 'Contact Section', 'palette' ),
						"desc" => __( 'Enable contact section to display on the home page', 'palette' ),
						"id" => $shortname."_contact_section",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'Full Width', 'palette' ),
						"desc" => __( 'Make the contact section full width', 'palette' ),
						"id" => $shortname."_contact_full",
						"std" => "false",
						'class' => 'hidden',
						"type" => "checkbox");	

	$options[] = array( "name" => "Contact Heading",
	                    "desc" => "Larger, bolded text above section.",
	                    "id" => $shortname."_contact_head_text",
	                    "std" => "",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Contact Heading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials heading.', 'palette' ),
						"id" => $shortname."_contact_head_text_font",
						"std" => array('size' => '34','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'light','color' => '#222'),
						'class' => 'hidden',
						"type" => "typography");

	$options[] = array( "name" => "Contact Subheading",
	                    "desc" => "Smaller text below heading.",
	                    "id" => $shortname."_contact_subhead_text",
	                    "std" => "",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => __( 'Contact Subheading Font Style', 'palette' ),
						"desc" => __( 'Select typography for the testimonials subheading.', 'palette' ),
						"id" => $shortname."_contact_subhead_text_font",
						"std" => array('size' => '20','unit' => 'px', 'face' => 'Helvetica, Arial, sans-serif','style' => 'normal','color' => '#ababab'),
						'class' => 'hidden',
						"type" => "typography");
/*
	$options[] = array( "name" => __( 'Contact Visual Element', 'palette' ),
						"desc" => __( 'Choose whether to display a YouTube video, an image, or nothing at all.', 'palette' ),
						"id" => $shortname."_contact_visual_element",
						'class' => 'hidden',
						"type" => "select2",
						"options" => array("none" => __( 'None', 'palette' ), "image" => __( 'Image', 'palette' ), "video" => __( 'Video', 'palette' ) ) );
*/

	$options[] = array( "name" => "Email Text",
	                    "desc" => "Specify message for the email contact link",
	                    "id" => $shortname."_contact_email_text",
	                    "std" => "Email Us",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => "Contact Email",
	                    "desc" => "Specify the email address for the contact link",
	                    "id" => $shortname."_contact_email",
	                    "std" => "",
	                    'class' => 'hidden',
	                    "type" => "text");

	$options[] = array( "name" => "Contact Body Text",
	                    "desc" => "Type the contact body text here.",
	                    "id" => $shortname."_contact_body_text",
	                    "std" => "",
	                    'class' => 'hidden',
	                    "type" => "textarea");

	$options[] = array( "name" => __( 'Email Link Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the email button or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_contact_email_color",
						"std" => "#428BCA",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Email Link Hover Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the email button or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_contact_email_hover_color",
						"std" => "#3A7AB1",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Section Background Color', 'palette' ),
						"desc" => __( 'Pick a custom hover color for the background or add a hex color code e.g. #697e09', 'palette' ),
						"id" => $shortname."_contact_bg_color",
						"std" => "",
						'class' => 'hidden',
						"type" => "color");

	$options[] = array( "name" => __( 'Top Border', 'palette' ),
						"desc" => __( 'Specify border properties for the contact section.', 'palette' ),
						"id" => $shortname."_contact_top_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Bottom Border', 'palette' ),
						"desc" => __( 'Specify border properties for the contact section.', 'palette' ),
						"id" => $shortname."_contact_bottom_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Left Border', 'palette' ),
						"desc" => __( 'Specify border properties for the contact section.', 'palette' ),
						"id" => $shortname."_contact_left_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Right Border', 'palette' ),
						"desc" => __( 'Specify border properties for the contact section.', 'palette' ),
						"id" => $shortname."_contact_right_border",
						"std" => array('width' => '0','style' => 'solid','color' => '#e6e6e6'),
						'class' => 'hidden',
						"type" => "border");

	$options[] = array( "name" => __( 'Contact Padding Top/Bottom', 'woothemes' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired header padding.', 'woothemes' ),
						"id" => $shortname."_contact_padding_tb",
						"std" => "",
	                    'class' => 'hidden',
						"type" => array(
										array(  'id' => $shortname. '_contact_padding_top',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Top', 'woothemes' ) ),
										array(  'id' => $shortname. '_contact_padding_bottom',
												'type' => 'text',
												'std' => '10',
												'meta' => __( 'Bottom', 'woothemes' ) )
									  ));

	$options[] = array( "name" => __( 'Contact Margin Bottom', 'palette' ),
						"desc" => __( 'Enter an integer value i.e. 20 for the desired contact margin.', 'Pancake_' ),
						"id" => $shortname."_contact_margin_tb",
						"std" => "",
						'class' => 'hidden last',
						"type" => array(
										array(  'id' => $shortname. '_contact_margin_bottom',
												'type' => 'text',
												'std' => '0',
												'meta' => __( 'Bottom', 'palette' ) )
									  ));

	$options[] = array( 'name' => __( 'General', 'palette' ),
						'type' => 'subheading');
	
	$options[] = array( "name" => __( 'Blog Section', 'palette' ),
						"desc" => __( 'Enable the blog posts to show on the home page.', 'palette' ),
						"id" => $shortname."_blog_section",
						"std" => "false",
						"type" => "checkbox");

/*	$options[] = array( 'name' => __( 'Scripts', 'palette' ),
						'type' => 'subheading');

	
	$options[] = array( "name" => __( 'Modernizr', 'palette' ),
						"desc" => __( 'Load version 2.6.2 of the Modernizr jquery library for awesome browser support', 'palette' ),
						"id" => $shortname."_load_modernizr",
						"std" => "true",
						'class' => 'collapsed',
						"type" => "checkbox");

	$options[] = array( "name" => __( 'PNG fallback script', 'palette' ),
						"desc" => __( 'Enable PNG fallbacks for browsers that don\'t support SVG images.', 'palette' ),
						"id" => $shortname."_png_fallback",
						"std" => "true",
						'class' => 'hidden last',
						"type" => "checkbox");
	
	$options[] = array( "name" => __( 'Magnific Popup', 'palette' ),
						"desc" => __( 'Load a minimal version of the Magnific Popup', 'palette' ),
						"id" => $shortname."_load_magnific_popup",
						"std" => "false",
						"type" => "checkbox"); */

	$options[] = array( "name" => __( 'Social Media Icons Corners', 'palette' ),
						"desc" => __( 'Set amount of pixels for border radius (rounded corners). Will only show in CSS3 compatible browser.', 'palette' ),
						"id" => $shortname."_connect_border_radius",
						"type" => "select",
						"std" => "0px",
						"options" => $options_pixels);


/*	$options[] = array( 'name' => __( 'Another subsection', 'palette' ),
						'type' => 'subheading');
	

	$options[] = array( "name" => "My Description",
	                    "desc" => "The description of my new option.",
	                    "id" => $shortname."_my_description",
	                    "std" => "",
	                    "type" => "textarea");
	
	$options[] = array( "name" => "My Image",
	                    "desc" => "The image that goes along with my new option.",
	                    "id" => $shortname."_my_image",
	                    "std" => "",
	                    "type" => "upload");

	$options[] = array( "name" => __( 'Background Image Repeat', 'palette' ),
						"desc" => __( 'Select how you want your background image to display.', 'palette' ),
						"id" => $shortname."_style_bg_image_repeat",
						"type" => "select",
						"options" => array( "No Repeat" => "no-repeat", "Repeat" => "repeat","Repeat Horizontally" => "repeat-x", "Repeat Vertically" => "repeat-y" ) );

	$options[] = array( "name" => __( 'Post Content for "Featured" Posts', 'palette' ),
						"desc" => __( 'Select if you want to show the full content or the excerpt on posts in the "Featured" section.', 'palette' ),
						"id" => $shortname."_magazine_featured_post_content",
						"std" => 'excerpt',
						"type" => "select2",
						"options" => array("excerpt" => __( 'The Excerpt', 'palette' ), "content" => __( 'Full Content', 'palette' ) ) ); */

    return $options;
}
