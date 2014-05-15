<?php
	global $woo_options;

	// Open dynamic CSS section
	$css = '<style type="text/css">';

if ( is_front_page() && $woo_options['palette_blog_section'] == 'false' ) {
	$css .= '#main{ display:none; } #main-sidebar-container #sidebar{ display:none; }';
}

if ( get_option('palette_features_full') == 'true' || get_option('palette_portfolio_full') == 'true' || get_option('palette_cta_full') == 'true' || get_option('palette_about_full') == 'true' || get_option('palette_team_full') == 'true' || get_option('palette_contact_full') == 'true' || get_option('palette_testimonials_full') == 'true') {
	$css .= 'body { overflow-x: hidden; }';
}

	/* Social icons styling */
	$sc_radius = get_option('palette_connect_border_radius');		
	$css .= '#connect .social a:before { border-radius:' . $sc_radius . '; -webkit-border-radius:' . $sc_radius . '; -moz-border-radius: ' . $sc_radius . '; }';

	/* Hide the stuff we don't want on the subscribe & connect widget */
	$css .= '.header-widget { margin-top: 1em; } .header-widget #connect h3, .header-widget #connect div p { display: none; } .header-widget #connect .social { text-align: right; }';

	/* Main banner styling */
	$head_font = get_option('palette_main_banner_text_font');
	$subhead_font = get_option('palette_sub_banner_text_font');

	$css .= '.home #main-banner { margin-bottom:' . get_option('palette_main_banner_margin_bottom') .'em; text-align: center;}'
		 . '.home #main-banner #main-banner-head { font:' . $head_font['style']. ' ' . $head_font['size'] . $head_font['unit'] . '/1.2em ' . $head_font['face'] . '; color:' . $head_font['color'] . ';}'
		 . '.home #main-banner #main-banner-subhead { font:' . $subhead_font['style']. ' ' . $subhead_font['size'] . $subhead_font['unit'] . '/1.2em ' . $subhead_font['face'] . '; color:' . $subhead_font['color'] . ';}';

	/* Slider styling */
	$css .= '.home .wooslider { border: none; margin-top:' . get_option('palette_slider_margin_top') .'em !important; margin-bottom:' . get_option('palette_slider_margin_bottom') .'em !important; }';

	echo $css;

// Parallax Section styling
if ( get_option('palette_customized_header') == 'true' ) {
	$custom_header_font = get_option('palette_font_logo');
	$custom_desc_font = get_option('palette_font_desc');

	$css = '.home #header { margin-top: '. get_option('palette_header_margin_top') .'px; margin-bottom: '. get_option('palette_header_margin_bottom') . 'px; padding-top: '. get_option('palette_header_padding_top') .'px; padding-bottom: '. get_option('palette_header_padding_bottom') .'px; }';
	$css .= '.home #logo .site-title a { font:' . $custom_header_font['style']. ' ' . $custom_header_font['size'] . $custom_header_font['unit'] . '/1.2em ' . $custom_header_font['face'] . '; color:' . $custom_header_font['color'] . ';}';

	if ( get_option('palette_header_background_image') ) { 
		$css .= '.home #header-container, #home-about { background-image: url(' . get_option('palette_header_background_image') . '); background-position: top center; background-repeat: no-repeat; -moz-background-size: cover; -webkit-background-size: cover !important; background-size: cover; background-attachment: fixed; color: #ffffff; }';
		$css .= '@media only screen and (max-width: 767px) { .home #header-container, #home-about { background-attachment: inherit; background-size: inherit; -webkit-background-size: inherit !important; } }';
	}

	if ( get_option('palette_header_hide_tagline') == 'true' ) { 
		$css .= '.home #header #logo .site-description { display: none; }';
	} else {
		$css .= '.home #header #logo .site-description { font:' . $custom_desc_font['style']. ' ' . $custom_desc_font['size'] . $custom_desc_font['unit'] . '/1.2em ' . $custom_desc_font['face'] . '; color:' . $custom_desc_font['color'] . '; }';
	}

	
	$css .= '.home #header { text-align: center; } .home #header #logo { float: none; margin-bottom: 10em; }';

	// Print the CSS
	echo $css;
}

// Features styling
if ( get_option('palette_features_section') == 'true' ) {
	$features_full = ( get_option('palette_features_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : '}' ;
	$features_head_font = get_option('palette_features_head_text_font');
	$features_subhead_font = get_option('palette_features_subhead_text_font');

	$css = '.home .features-head h2 { font:' . $features_head_font['style']. ' ' . $features_head_font['size'] . $features_head_font['unit'] . '/1.2em ' . $features_head_font['face'] . '; color:' . $features_head_font['color'] . ';}';
	$css .= '.home .features-head h4 { font:' . $features_subhead_font['style']. ' ' . $features_subhead_font['size'] . $features_subhead_font['unit'] . '/1.2em ' . $features_subhead_font['face'] . '; color:' . $features_subhead_font['color'] . ';}';
	$css .= '.home .features-head { margin-bottom: 3em;}';

	$css .= '#home-features { background: '. get_option('palette_features_bg_color') .';' . $features_full;
	$css .= '#home-features .feature:hover { background:' . get_option('palette_feature_bg_hover_color') . '; color: ' . get_option('palette_feature_text_hover_color') . '; }'
		 . '#home-features .feature:hover h3 { color: ' . get_option('palette_feature_text_hover_color') . '; }';
	$css .='#home-features .feature .fa { color: ' . get_option('palette_feature_icon_color') . '; }#home-features .feature:hover .fa { color: ' . get_option('palette_feature_icon_hover_color') . '; }';
	$css .= '#home-features { margin-bottom:' . get_option('palette_features_margin_bottom') .'em; margin-top:' . get_option('palette_features_margin_top') .'em; padding-bottom:'. $woo_options['palette_features_padding_bottom'] .'em; padding-top: '. $woo_options['palette_features_padding_top'] .'em; }';

	// Print the CSS
	echo $css;
}

// Portfolio Section styling
if ( get_option('palette_portfolio_section') == 'true' ) {
	$portfolio_top = get_option('palette_portfolio_top_border');
	$portfolio_bottom = get_option('palette_portfolio_bottom_border');
	$portfolio_left = get_option('palette_portfolio_left_border');
	$portfolio_right = get_option('palette_portfolio_right_border');
	$portfolio_full = ( get_option('palette_portfolio_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : 'padding-left: 2em; padding-right: 2em; }' ;
	$portfolio_head_font = get_option('palette_portfolio_head_text_font');
	$portfolio_subhead_font = get_option('palette_portfolio_subhead_text_font');

	$css = '.home .portfolio-head h2 { font:' . $portfolio_head_font['style']. ' ' . $portfolio_head_font['size'] . $portfolio_head_font['unit'] . '/1.2em ' . $portfolio_head_font['face'] . '; color:' . $portfolio_head_font['color'] . ';}';
	$css .= '.home .portfolio-head h4 { font:' . $portfolio_subhead_font['style']. ' ' . $portfolio_subhead_font['size'] . $portfolio_subhead_font['unit'] . '/1.2em ' . $portfolio_subhead_font['face'] . '; color:' . $portfolio_subhead_font['color'] . ';}';
	$css .= '.home .portfolio-head { margin-bottom: 2.5em;}';
	$css .= '#home-portfolio { background: '. get_option('palette_portfolio_bg_color') .'; border-bottom: '. $portfolio_bottom['width'] .'px '. $portfolio_bottom['style'] .' '. $portfolio_bottom['color'] .'; border-top: '. $portfolio_top['width'] .'px '. $portfolio_top['style'] .' '. $portfolio_top['color'] .'; border-left: '. $portfolio_left['width'] .'px '. $portfolio_left['style'] .' '. $portfolio_left['color'] .'; border-right: '. $portfolio_right['width'] .'px '. $portfolio_right['style'] .' '. $portfolio_right['color'] .'; '. $portfolio_full;
	$css .= '#home-portfolio { margin-bottom:' . get_option('palette_portfolio_margin_bottom') .'em; margin-top:' . get_option('palette_portfolio_margin_top') .'em;  padding-bottom:'. $woo_options['palette_portfolio_padding_bottom'] .'em; padding-top: '. $woo_options['palette_portfolio_padding_top'] .'em;}';

	// Print the CSS
	echo $css;
}

// Call to action styling
if ( get_option('palette_cta') == 'true' ) {
	$cta_font = get_option('palette_cta_text_font');
	$cta_top_border = get_option('palette_cta_top_border');
	$cta_bottom_border = get_option('palette_cta_bottom_border');
	$cta_full = ( get_option('palette_cta_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : '}' ;

	$css = '.home .call-to-action { background: '. get_option('palette_cta_bg_color') .';' . $cta_full;
	$css .= '#wrapper .woo-sc-button.custom { background:' . get_option('palette_cta_button_color') . ';}'
		 . '#wrapper .woo-sc-button.custom:hover { background:' . get_option('palette_cta_button_hover_color') . ';}'
		 . '.home .call-to-action .the-call { font:' . $cta_font['style']. ' ' . $cta_font['size'] . $cta_font['unit'] . '/1.2em ' . $cta_font['face'] . '; color:' . $cta_font['color'] . ';}';
	$css .= '.home .call-to-action { border-bottom:' . $cta_bottom_border['width'] .'px '. $cta_bottom_border['style'] .' '. $cta_bottom_border['color'] .'; border-top:' . $cta_top_border['width'] .'px '. $cta_top_border['style'] .' '. $cta_top_border['color'] .'; padding-bottom:'. get_option('palette_cta_padding_top') .'em; padding-top:'. get_option('palette_cta_padding_bottom') .'em; margin-bottom: '.get_option('palette_cta_margin_bottom').'em; }';

	// Print the CSS
	echo $css;
}

// Testimonials styling
if ( get_option('palette_team_section') == 'true' ) {
	$top = get_option('palette_testimonials_top_border');
	$bottom = get_option('palette_testimonials_bottom_border');
	$left = get_option('palette_testimonials_left_border');
	$right = get_option('palette_testimonials_right_border');
	$testimonial_full = ( get_option('palette_testimonials_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : 'padding-left: 2em; padding-right: 2em; }' ;
	$testimonials_head_font = get_option('palette_testimonials_head_text_font');
	$testimonials_subhead_font = get_option('palette_testimonials_subhead_text_font');

	$css = '.home .testimonials-head h2 { font:' . $testimonials_head_font['style']. ' ' . $testimonials_head_font['size'] . $testimonials_head_font['unit'] . '/1.2em ' . $testimonials_head_font['face'] . '; color:' . $testimonials_head_font['color'] . ';}';
	$css .= '.home .testimonials-head h4 { font:' . $testimonials_subhead_font['style']. ' ' . $testimonials_subhead_font['size'] . $testimonials_subhead_font['unit'] . '/1.2em ' . $testimonials_subhead_font['face'] . '; color:' . $testimonials_subhead_font['color'] . ';}';
	$css .= '.home .testimonials-head { margin-bottom: 3em;}';
	$css .= '#home-testimonials { background: '. get_option('palette_testimonials_bg_color') .'; border-bottom: '. $bottom['width'] .'px '. $bottom['style'] .' '. $bottom['color'] .'; border-top: '. $top['width'] .'px '. $top['style'] .' '. $top['color'] .'; border-left: '. $left['width'] .'px '. $left['style'] .' '. $left['color'] .'; border-right: '. $right['width'] .'px '. $right['style'] .' '. $right['color'] .'; '. $testimonial_full;
	$css .= '#home-testimonials { margin-bottom:' . get_option('palette_testimonials_margin_bottom') .'em; margin-top:' . get_option('palette_testimonials_margin_top') .'em; padding-bottom:'. $woo_options['palette_testimonials_padding_bottom'] .'em; padding-top: '. $woo_options['palette_testimonials_padding_top'] .'em; }';

	// Print the CSS
	echo $css;
}

// About styling
if ( get_option('palette_about_section') == 'true' ) {
	$about_head_font = get_option('palette_about_head_text_font');
	$about_subhead_font = get_option('palette_about_subhead_text_font');
	$about_top = get_option('palette_about_top_border');
	$about_bottom = get_option('palette_about_bottom_border');
	$about_left = get_option('palette_about_left_border');
	$about_right = get_option('palette_about_right_border');
	$about_full = ( get_option('palette_about_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : 'padding-left: 3em; padding-right: 2em; }' ;
	$about_background = ( get_option('palette_header_background_image') ) ? '' : 'background: '. $woo_options['palette_about_bg_color'] .';';

	$css = '.home .about-head h2 { font:' . $about_head_font['style']. ' ' . $about_head_font['size'] . $about_head_font['unit'] . '/1.2em ' . $about_head_font['face'] . '; color:' . $about_head_font['color'] . ';}';
	$css .= '.home .about-head h4 { font:' . $about_subhead_font['style']. ' ' . $about_subhead_font['size'] . $about_subhead_font['unit'] . '/1.2em ' . $about_subhead_font['face'] . '; color:' . $about_subhead_font['color'] . ';}';
	$css .= '.home .about-head { margin-bottom: 4em;}';
	$css .= '.about-image img { border-radius: 300px; }';
	$css .= '#home-about { '. $about_background .' border-bottom: '. $about_bottom['width'] .'px '. $about_bottom['style'] .' '. $about_bottom['color'] .'; border-top: '. $about_top['width'] .'px '. $about_top['style'] .' '. $about_top['color'] .'; border-left: '. $about_left['width'] .'px '. $about_left['style'] .' '. $about_left['color'] .'; border-right: '. $about_right['width'] .'px '. $about_right['style'] .' '. $about_right['color'] .'; margin-bottom:' . get_option('palette_about_margin_bottom') .'em; margin-top:' . get_option('palette_about_margin_top') .'em; padding-bottom:'. $woo_options['palette_about_padding_bottom'] .'em; padding-top: '. $woo_options['palette_about_padding_top'] .'em; '. $about_full;

	// Print the CSS
	echo $css;
}

// Our Team styling
if ( get_option('palette_team_section') == 'true' ) {
	$team_top = get_option('palette_team_top_border');
	$team_bottom = get_option('palette_team_bottom_border');
	$team_left = get_option('palette_team_left_border');
	$team_right = get_option('palette_team_right_border');
	$team_full = ( get_option('palette_team_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; }' : 'padding-left: 2em; padding-right: 2em; }' ;
	$team_head_font = get_option('palette_team_head_text_font');
	$team_subhead_font = get_option('palette_team_subhead_text_font');

	$css = '.home .team-head h2 { font:' . $team_head_font['style']. ' ' . $team_head_font['size'] . $team_head_font['unit'] . '/1.2em ' . $team_head_font['face'] . '; color:' . $team_head_font['color'] . ';}';
	$css .= '.home .team-head h4 { font:' . $team_subhead_font['style']. ' ' . $team_subhead_font['size'] . $team_subhead_font['unit'] . '/1.2em ' . $team_subhead_font['face'] . '; color:' . $team_subhead_font['color'] . ';}';
	$css .= '.home .team-head { margin-bottom: 2.5em;}';
	$css .= '#home-team { background: '. get_option('palette_team_bg_color') .'; border-bottom: '. $team_bottom['width'] .'px '. $team_bottom['style'] .' '. $team_bottom['color'] .'; border-top: '. $team_top['width'] .'px '. $team_top['style'] .' '. $team_top['color'] .'; border-left: '. $team_left['width'] .'px '. $team_left['style'] .' '. $team_left['color'] .'; border-right: '. $team_right['width'] .'px '. $team_right['style'] .' '. $team_right['color'] .'; '. $team_full;
	$css .= '#home-team { margin-bottom:' . get_option('palette_team_margin_bottom') .'em; margin-top:' . get_option('palette_team_margin_top') .'em; padding-bottom:'. $woo_options['palette_team_padding_bottom'] .'em; padding-top: '. $woo_options['palette_team_padding_top'] .'em;}';

	// Print the CSS
	echo $css;
}

// Contact Section styling
if ( get_option('palette_contact_section') == 'true' ) {
	$contact_top = get_option('palette_contact_top_border');
	$contact_bottom = get_option('palette_contact_bottom_border');
	$contact_left = get_option('palette_contact_left_border');
	$contact_right = get_option('palette_contact_right_border');
	$contact_full = ( get_option('palette_contact_full') == 'true' ) ? 'margin: 0 -200%; padding-left: 200%; padding-right: 200%; } #content { padding: 0; }' : 'padding-left: 2em; padding-right: 2em; }' ;
	$contact_head_font = get_option('palette_contact_head_text_font');
	$contact_subhead_font = get_option('palette_contact_subhead_text_font');

	$css = '.home .contact-head h2 { font:' . $contact_head_font['style']. ' ' . $contact_head_font['size'] . $contact_head_font['unit'] . '/1.2em ' . $contact_head_font['face'] . '; color:' . $contact_head_font['color'] . ';}';
	$css .= '.home .contact-head h4 { font:' . $contact_subhead_font['style']. ' ' . $contact_subhead_font['size'] . $contact_subhead_font['unit'] . '/1.2em ' . $contact_subhead_font['face'] . '; color:' . $contact_subhead_font['color'] . ';}';
	$css .= '.home .contact-head { margin-bottom: 2.5em;}';
	$css .= '#home-contact { background: '. get_option('palette_contact_bg_color') .'; border-bottom: '. $contact_bottom['width'] .'px '. $contact_bottom['style'] .' '. $contact_bottom['color'] .'; border-top: '. $contact_top['width'] .'px '. $contact_top['style'] .' '. $contact_top['color'] .'; border-left: '. $contact_left['width'] .'px '. $contact_left['style'] .' '. $contact_left['color'] .'; border-right: '. $contact_right['width'] .'px '. $contact_right['style'] .' '. $contact_right['color'] .'; '. $contact_full;
	$css .= '#home-contact { margin-bottom:' . get_option('palette_contact_margin_bottom') .'em; margin-top:' . get_option('palette_contact_margin_top') .'em; padding-bottom:'. $woo_options['palette_contact_padding_bottom'] .'em; padding-top: '. $woo_options['palette_contact_padding_top'] .'em;}';
	$css .= '#home-contact .contact-email { color: '. get_option('palette_contact_email_color') .'; border: 3px '. get_option('palette_contact_email_color') .' solid; }';
	$css .= '#home-contact .contact-email:hover { color: #FFF; border: 3px '. get_option('palette_contact_email_hover_color') .' solid; background: '. get_option('palette_contact_email_hover_color') .';}';
}

	// Close dynamic CSS styles
	$css .= '</style>';

	// Print the CSS
	echo $css;