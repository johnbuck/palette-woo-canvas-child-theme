<?php
global $woo_options;
?>


<style type="text/css">

body { overflow-x: hidden; }

<?php
// Get border radius for social icons 
$sc_radius = get_option('palette_connect_border_radius');
?>

#connect .social a:before {
	border-radius: <?php echo $sc_radius; ?>;
	-webkit-border-radius: <?php echo $sc_radius; ?>;
	-moz-border-radius: <?php echo $sc_radius; ?>;
}

<?php
// Main banner styling
$head_font = get_option('palette_main_banner_text_font');
$subhead_font = get_option('palette_sub_banner_text_font');
?>


.home #main-banner {
	margin-bottom: <?php echo get_option('palette_main_banner_margin_bottom'); ?>
	text-align: center;
}

.home #main-banner h2 {
	font: <?php echo $head_font['style'] . ' ' . $head_font['size'] . ' ' . $head_font['unit'] . '/1.2em ' . $head_font['face']; ?>;
	color: <?php echo $head_font['color']; ?>;
}

.home #main-banner h4 {
	font:<?php echo $subhead_font['style'] . ' ' . $subhead_font['size'] . $subhead_font['unit'] . '/1.2em ' . $subhead_font['face']; ?>;
	color: <?php echo $subhead_font['color']; ?>;
}

/* Slider styling */
.home .wooslider {
	border: none;
	margin-top: <?php echo get_option('palette_slider_margin_top') .'em !important'; ?>;
	margin-bottom: <?php echo get_option('palette_slider_margin_bottom') .'em !important'; ?>;
}

/* Hide the stuff we don't want on the subscribe & connect widget */
.header-widget {
	margin-top: 1em;
}

.header-widget #connect h3, .header-widget #connect div p {
	display: none;
}

.header-widget #connect .social {
	text-align: right;
}


<?php
// Features styling
$features_head_font = get_option('palette_features_head_text_font');
$features_subhead_font = get_option('palette_features_subhead_text_font');
$features_full = ( get_option('palette_features_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : '' ;
?>

.home .features-head { margin-bottom: 3em;}

.home .features-head h2 {
	font: <?php echo $features_head_font['style']. ' ' . $features_head_font['size'] . $features_head_font['unit'] . '/1.2em ' . $features_head_font['face']; ?>;
	color: <?php echo $features_head_font['color']; ?>;
}

.home .features-head h4 {
	font: <?php echo $features_subhead_font['style']. ' ' . $features_subhead_font['size'] . $features_subhead_font['unit'] . '/1.2em ' . $features_subhead_font['face']; ?>;
	color:  <?php echo $features_subhead_font['color']; ?>;
}

#home-features {
	background:  <?php echo get_option('palette_features_bg_color'); ?>
	 <?php echo $features_full; ?>
}

#home-features .feature:hover {
	background: <?php echo get_option('palette_feature_bg_hover_color'); ?>;
	color: <?php echo get_option('palette_feature_text_hover_color'); ?>;
}

#home-features .feature:hover h3 {
	color: <?php echo get_option('palette_feature_text_hover_color'); ?>;
}

#home-features .feature .fa {
	color: <?php echo get_option('palette_feature_icon_color'); ?>;
}

#home-features .feature:hover .fa {
	color: <?php echo get_option('palette_feature_icon_hover_color'); ?>;
}

#home-features {
	margin-bottom: <?php echo get_option('palette_features_margin_bottom') .'em'; ?>;
	margin-top: <?php echo get_option('palette_features_margin_top') .'em'; ?>;
}

<?php
// Portfolio Section styling
$portfolio_head_font = get_option('palette_portfolio_head_text_font');
$portfolio_subhead_font = get_option('palette_portfolio_subhead_text_font');
$portfolio_top = get_option('palette_portfolio_top_border');
$portfolio_bottom = get_option('palette_portfolio_bottom_border');
$portfolio_left = get_option('palette_portfolio_left_border');
$portfolio_right = get_option('palette_portfolio_right_border');
$portfolio_full = ( get_option('palette_portfolio_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : 'padding-left: 2em; padding-right: 2em;' ;
?>

.home .portfolio-head h2 {
	font: <?php echo $portfolio_head_font['style']. ' ' . $portfolio_head_font['size'] . $portfolio_head_font['unit'] . '/1.2em ' . $portfolio_head_font['face']; ?>;
	color: <?php echo $portfolio_head_font['color']; ?>;
}

.home .portfolio-head h4 {
	font: <?php echo $portfolio_subhead_font['style'] . ' ' . $portfolio_subhead_font['size'] . $portfolio_subhead_font['unit'] . '/1.2em ' . $portfolio_subhead_font['face']; ?>;
	color: <?php echo $portfolio_subhead_font['color']; ?>;
}

.home .portfolio-head {
	margin-bottom: 2.5em;
}

#home-portfolio {
	background: <?php echo get_option('palette_portfolio_bg_color'); ?>;
	border-bottom: <?php echo $portfolio_bottom['width'] .'px '. $portfolio_bottom['style'] .' '. $portfolio_bottom['color']; ?>;
	border-top: <?php echo $portfolio_top['width'] .'px '. $portfolio_top['style'] .' '. $portfolio_top['color']; ?>;
	border-left: <?php echo $portfolio_left['width'] .'px '. $portfolio_left['style'] .' '. $portfolio_left['color']; ?>;
	border-right: <?php echo $portfolio_right['width'] .'px '. $portfolio_right['style'] .' '. $portfolio_right['color'];
	<?php echo $portfolio_full; ?>
	margin-bottom: <?php echo get_option('palette_portfolio_margin_bottom') . 'em'; ?>;
	margin-top: <?php echo get_option('palette_portfolio_margin_top') . 'em'; ?>;
}


<?php
// Call to action styling
$cta_font = get_option('palette_cta_text_font');
$cta_top_border = get_option('palette_cta_top_border');
$cta_bottom_border = get_option('palette_cta_bottom_border');
$cta_full = ( get_option('palette_cta_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : '' ;
?>

#wrapper .woo-sc-button.custom {
	background: <?php echo get_option('palette_cta_button_color'); ?>;
}

#wrapper .woo-sc-button.custom:hover {
	background: <?php echo get_option('palette_cta_button_hover_color'); ?>;
}

.home .call-to-action .the-call {
	font: <?php echo $cta_font['style'] . ' ' . $cta_font['size'] . $cta_font['unit'] . '/1.2em ' . $cta_font['face']; ?>;
	color: <?php echo $cta_font['color']; ?>;
}

.home .call-to-action {
	background: <?php echo get_option('palette_cta_bg_color'); ?>;
	border-bottom: <?php echo $cta_bottom_border['width'] .'px '. $cta_bottom_border['style'] .' '. $cta_bottom_border['color'];?>;
	border-top: <?php echo $cta_top_border['width'] .'px '. $cta_top_border['style'] .' ' . $cta_top_border['color']; ?>;
	padding-bottom: <?php echo get_option('palette_cta_padding_top') .'em'; ?>;
	padding-top: <?php echo get_option('palette_cta_padding_bottom') .'em'; ?>;
	<?php echo $cta_full; ?>
	margin-bottom: <?php echo get_option('palette_cta_margin_bottom').'em'; ?>;
}

<?php
$testimonials_head_font = get_option('palette_testimonials_head_text_font');
$testimonials_subhead_font = get_option('palette_testimonials_subhead_text_font');
$top = get_option('palette_testimonials_top_border');
$bottom = get_option('palette_testimonials_bottom_border');
$left = get_option('palette_testimonials_left_border');
$right = get_option('palette_testimonials_right_border');
$testimonial_full = ( get_option('palette_testimonials_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : 'padding-left: 2em; padding-right: 2em;' ;
?>

.home .testimonials-head { margin-bottom: 3em;}

.home .testimonials-head h2 {
	font: <?php echo $testimonials_head_font['style']. ' ' . $testimonials_head_font['size'] . $testimonials_head_font['unit'] . '/1.2em ' . $testimonials_head_font['face']; ?>;
	color: <?php echo $testimonials_head_font['color']; ?>;
}

.home .testimonials-head h4 {
	font:  <?php echo $testimonials_subhead_font['style']. ' ' . $testimonials_subhead_font['size'] . $testimonials_subhead_font['unit'] . '/1.2em ' . $testimonials_subhead_font['face']; ?>;
	color: <?php echo $testimonials_subhead_font['color']; ?>;
}

#home-testimonials {
	background:  <?php echo get_option('palette_testimonials_bg_color'); ?>;
	border-bottom:  <?php echo $bottom['width'] .'px '. $bottom['style'] .' '. $bottom['color']; ?>;
	border-top:  <?php echo $top['width'] .'px '. $top['style'] .' '. $top['color']; ?>;
	border-left:  <?php echo $left['width'] .'px '. $left['style'] .' '. $left['color']; ?>; 
	border-right:  <?php echo $right['width'] .'px '. $right['style'] .' '. $right['color']; ?>;
	<?php echo $testimonial_full; ?>
	margin-bottom:  <?php echo get_option('palette_testimonials_margin_bottom') .'em'; ?>;
	margin-top:  <?php echo get_option('palette_testimonials_margin_top') .'em'; ?>;
}

/* About styling */
<?php
$about_head_font = get_option('palette_about_head_text_font');
$about_subhead_font = get_option('palette_about_subhead_text_font');
$about_top = get_option('palette_about_top_border');
$about_bottom = get_option('palette_about_bottom_border');
$about_left = get_option('palette_about_left_border');
$about_right = get_option('palette_about_right_border');
$about_full = ( get_option('palette_about_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : 'padding-left: 3em; padding-right: 2em;' ;
?>

.home .about-head h2 {
	font: <?php echo $about_head_font['style']. ' ' . $about_head_font['size'] . $about_head_font['unit'] . '/1.2em ' . $about_head_font['face']; ?>;
	color: <?php echo $about_head_font['color']; ?>;
}

.home .about-head h4 {
	font: <?php echo $about_subhead_font['style']. ' ' . $about_subhead_font['size'] . $about_subhead_font['unit'] . '/1.2em ' . $about_subhead_font['face']; ?>;
	color: <?php echo $about_subhead_font['color']; ?>;
}

.home .about-head { margin-bottom: 4em; }

#home-about {
	background: <?php echo get_option('palette_about_bg_color'); ?>;
	border-bottom: <?php echo $about_bottom['width'] .'px '. $about_bottom['style'] .' '. $about_bottom['color']; ?>;
	border-top: <?php echo $about_top['width'] .'px '. $about_top['style'] .' '. $about_top['color']; ?>;
	border-left: <?php echo $about_left['width'] .'px '. $about_left['style'] .' '. $about_left['color']; ?>;
	border-right: <?php echo $about_right['width'] .'px '. $about_right['style'] .' '. $about_right['color']; ?>;
	<?php $about_full; ?>
	margin-bottom: <?php echo get_option('palette_about_margin_bottom') .'em'; ?>;
	margin-top: <?php echo get_option('palette_about_margin_top') .'em'; ?>;
	padding-top: 4em; padding-bottom: 4em;
}

.about-image img { border-radius: 300px; }

/* Our Team styling */
<?php
$team_head_font = get_option('palette_team_head_text_font');
$team_subhead_font = get_option('palette_team_subhead_text_font');
$team_top = get_option('palette_team_top_border');
$team_bottom = get_option('palette_team_bottom_border');
$team_left = get_option('palette_team_left_border');
$team_right = get_option('palette_team_right_border');
$team_full = ( get_option('palette_team_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : 'padding-left: 2em; padding-right: 2em;' ;
?>

.home .team-head { margin-bottom: 2.5em;}

.home .team-head h2 {
	font: <?php echo $team_head_font['style']. ' ' . $team_head_font['size'] . $team_head_font['unit'] . '/1.2em ' . $team_head_font['face']; ?>;
	color: <?php echo $team_head_font['color']; ?>;
}

.home .team-head h4 {
	font: <?php echo $team_subhead_font['style']. ' ' . $team_subhead_font['size'] . $team_subhead_font['unit'] . '/1.2em ' . $team_subhead_font['face']; ?>;
	color: <?php echo $team_subhead_font['color']; ?>;
}

#home-team {
	background: <?php echo get_option('palette_team_bg_color'); ?>;
	border-bottom: <?php echo $team_bottom['width'] .'px '. $team_bottom['style'] .' '. $team_bottom['color']; ?>;
	border-top: <?php echo $team_top['width'] .'px '. $team_top['style'] .' '. $team_top['color']; ?>;
	border-left:  <?php echo $team_left['width'] .'px '. $team_left['style'] .' '. $team_left['color']; ?>;
	border-right: <?php echo $team_right['width'] .'px '. $team_right['style'] .' '. $team_right['color']; ?>;
	<?php echo $team_full; ?>
	margin-bottom: <?php echo get_option('palette_team_margin_bottom') .'em'; ?>;
	margin-top: <?php echo get_option('palette_team_margin_top') .'em'; ?>;
}

/* Contact Section styling */
<?php
$contact_head_font = get_option('palette_contact_head_text_font');
$contact_subhead_font = get_option('palette_contact_subhead_text_font');
$contact_top = get_option('palette_contact_top_border');
$contact_bottom = get_option('palette_contact_bottom_border');
$contact_left = get_option('palette_contact_left_border');
$contact_right = get_option('palette_contact_right_border');
$contact_full = ( get_option('palette_contact_full') == 'true' ) ? 'margin: 0 -200%; padding: 1.5em 200%;' : 'padding-left: 2em; padding-right: 2em;' ;
?>

.home .contact-head { margin-bottom: 2.5em;}

.home .contact-head h2 {
	font: <?php echo $contact_head_font['style']. ' ' . $contact_head_font['size'] . $contact_head_font['unit'] . '/1.2em ' . $contact_head_font['face']; ?>;
	color: <?php echo $contact_head_font['color']; ?>;
}

.home .contact-head h4 {
	font: <?php echo $contact_subhead_font['style']. ' ' . $contact_subhead_font['size'] . $contact_subhead_font['unit'] . '/1.2em ' . $contact_subhead_font['face']; ?>;
	color: <?php echo $contact_subhead_font['color']; ?>;
}

#home-contact {
	background: <?php echo get_option('palette_contact_bg_color'); ?>;
	border-bottom: <?php echo $contact_bottom['width'] .'px '. $contact_bottom['style'] .' '. $contact_bottom['color']; ?>;
	border-top: <?php echo $contact_top['width'] .'px '. $contact_top['style'] .' '. $contact_top['color']; ?>;
	border-left: <?php echo $contact_left['width'] .'px '. $contact_left['style'] .' '. $contact_left['color']; ?>;
	border-right: <?php echo $contact_right['width'] .'px '. $contact_right['style'] .' '. $contact_right['color']; ?>;
	<?php echo $contact_full; ?>
	margin-bottom: <?php echo get_option('palette_contact_margin_bottom') . 'em'; ?>;
	margin-top: <?php echo get_option('palette_contact_margin_top') .'em'; ?>;
}

#home-contact .contact-email {
	color: <?php echo get_option('palette_contact_email_color'); ?>;
	border: 3px <?php echo get_option('palette_contact_email_color'); ?> solid;
}

#home-contact .contact-email:hover {
	color: #FFF;
	border: 3px <?php echo get_option('palette_contact_email_hover_color'); ?> solid;
	background: <?php echo get_option('palette_contact_email_hover_color'); ?>;
}

</style>