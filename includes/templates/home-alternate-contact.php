<?php
// File Security Check
if ( ! function_exists( 'wp' ) && ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}

global $woo_options;

// Set up the head and subhead content appropriately
$head = ( get_option('palette_contact_head_text') ) ? esc_html( stripslashes( get_option('palette_contact_head_text') ) ) : 'Doh! Looks like we need some content.' ;
$subhead = ( get_option('palette_contact_subhead_text') ) ? esc_html( stripslashes( get_option('palette_contact_subhead_text') ) ) : 'Enter some contact info to display here.' ;
?>

<section id="home-contact" class="col-full" >

	<div data-scroll-reveal class="contact-head ac">
		<h2><?php echo $head; ?></h2>
		<h4><?php echo $subhead; ?></h4>
	</div>

	<div data-scroll-reveal>
		<?php woo_subscribe_connect( 'true' ); ?>
	</div>
	
	<div data-scroll-reveal class="about-body col-full ac">
		<?php echo $woo_options['palette_contact_body_text']; ?>
	</div>

	<?php if (isset($woo_options['palette_contact_body_text']) && $woo_options['palette_contact_body_text'] != '' ) { ?> <a data-scroll-reveal class="contact-email" href="mailto:<?php echo $woo_options['palette_contact_email'] ?>"><i class="fa fa-envelope"></i><span><?php echo $woo_options['palette_contact_email_text'] ?></span></a> <?php } ?>

	<div data-scroll-reveal class="location-twitter">
	<?php if ( isset( $woo_options['woo_contact_panel'] ) && $woo_options['woo_contact_panel'] == 'true' ) { ?>
	<section data-scroll-reveal id="office-location"<?php if ( ( isset($woo_options['woo_contact_subscribe_and_connect']) && $woo_options['woo_contact_subscribe_and_connect'] == 'true' ) ) { ?> class="col-left"<?php } ?>>

		<?php if (isset($woo_options['woo_contact_title'])) { ?><h3><?php echo stripslashes( $woo_options['woo_contact_title'] ); ?></h3><?php } ?>

			<?php

				$divider = ( (isset($woo_options['woo_contact_number']) && $woo_options['woo_contact_number'] != '' ) || (isset($woo_options['woo_contact_fax']) && $woo_options['woo_contact_fax'] != '' ) ) ? ' | ' : '' ;

				if (isset($woo_options['woo_contact_number']) && $woo_options['woo_contact_number'] != '' ) {
					_e('Tel:','woothemes'); echo $woo_options['woo_contact_number'];
				}

				if (isset($woo_options['woo_contact_fax']) && $woo_options['woo_contact_fax'] != '' ) {
					echo $divider; _e('Fax:','woothemes'); echo $woo_options['woo_contact_fax'];
				}

				if (isset($woo_options['woo_contact_address']) && $woo_options['woo_contact_address'] != '' ) {
					echo $divider; echo stripslashes( $woo_options['woo_contact_address'] );
				}

			?>

		</ul>
	</section>
	<?php } ?>

	<div class="clear"></div>

	</div>

</section>