<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

require get_stylesheet_directory() . '/includes/palette-font-awesome.php';
$fa_icons = palette_get_fa_icons();

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_font-awesome-icons',
		'title' => 'Font Awesome Icons',
		'fields' => array (
			array (
				'key' => 'field_526f575e4f67b',
				'label' => 'Icon',
				'name' => 'palette_fa_icon_select',
				'type' => 'select',
				'instructions' => 'Palette brings the power of Font Awesome to your features! This icon will display just above your feature section text.',
				'choices' => $fa_icons,
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
/*			array (
				'key' => 'field_526f5a7f1f7a9',
				'label' => 'Size',
				'name' => 'palette_fa_icon_size',
				'type' => 'select',
				'instructions' => 'Select the size you\'d like the icon to be.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_526f575e4f67b',
							'operator' => '!=',
							'value' => "null",
						),
					),
					'allorany' => 'all',
				),
				// Here's where we need to get the icon sizes
				'choices' => array (
					'fa-2x' => 'Small',
					'fa-3x' => 'Medium',
					'fa-4x' => 'Large',
					'fa-5x' => 'Gigante',
				),
				'default_value' => 'fa-3x',
				'allow_null' => 0,
				'multiple' => 0,
			), */
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'feature',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'featured_image',
			),
		),
		'menu_order' => 0,
	));
}