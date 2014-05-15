<?php

/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ INSTRUCTIONS /\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

	Unlike the style.css child theme file, functions.php does not replace repeated
	code, but instead appends code. Therefore, any functions placed here will append
	to the code generated by the parent functions.php. WARNING: Duplicating functions
	present in the parent functions.php will cause massive errors and your entire
	site will break.   

	You're free to place any functions here that you've found on the web or that you
	create yourself, but do this at your on risk.
	
	Be forewarned that even the simplest mistake within this file can completely
	bring down your website. Please make sure to create backups and have FTP
	access to your server before modifying this file so you amy correct any issues.
	
	Be sure to place any code after these instructions and before the closing 
	PHP tag (ie. "?>").
	
	Credit goes to 8bit for inspiring this child theme, to WooThemes for making
	their themes and theme options extendable, to WP Engine for inspiring me to make
	the most out of WordPress, to the WordPress foundation for making an awesome
	project even better, and to MediaMouth Marketing for showing me how useful it
	is to keep things as DRY as possible. Nice work guys.

/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/

// Set path to theme specific functions
$palette_functions_path = get_stylesheet_directory() . '/functions/';
$palette_includes_path = get_stylesheet_directory() . '/includes/';
$palette_classes_path = get_stylesheet_directory() . '/classes/';

require_once( $palette_classes_path . '/class-tgm-plugin-activation.php' );

/*-------------------------------------------------------------------------------------------------*/
/* If we're using Palette as a Canvas child theme, extend WooFramework with Palette options
/* and features */
/*-------------------------------------------------------------------------------------------------*/

// Get the theme info so we know what to do
global $theme_info;
$theme_info = wp_get_theme();

// Load Canvas WooFramework extensions and required plugins if we're using Canvas
if ( $theme_info->template == 'canvas' ) {
	require_once( $palette_includes_path . 'palette-extend-canvas.php' );
	require_once( $palette_includes_path . 'palette-extend-woo-framework.php' );
	require_once( $palette_includes_path . 'palette-extend-canvas-plugins.php' );
}


/*------------------------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a plugin.
/* (In case it wasn't already apparent, this section is heavily influenced by WooThemes.)
/*------------------------------------------------------------------------------------------------*/
$palette_includes = array(
				'includes/palette-theme-functions.php', 		// Custom theme functions
				);

// Allow child themes/plugins to add widgets to be loaded.
$palette_includes = apply_filters( 'palette_includes', $palette_includes );

foreach ( $palette_includes as $i ) {
	locate_template( $i, true );
}

/*-------------------------------------------------------------------------------------------------*/
/* Add your custom functions below */
/*-------------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------------------*/
/* Don't add anything below here or your website will implode.								       */
/*-------------------------------------------------------------------------------------------------*/
?>