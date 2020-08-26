<?php
/**
 * Plugin Name:       Ajax Contact Widget
 * Description:       Simple Ajax powered contact form widget.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            senebi
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ajax-contact-widget
 * Domain Path:       /languages
 */

/*
 * Include JavaScript
 */
	function add_scripts(){
		wp_enqueue_script("contact-scripts", plugins_url()."/contact-widget/js/script.js", array("jquery"),"1.0.0", false);
	}
	add_action("wp_enqueue_scripts","add_scripts");
	
/*
 * Include class
 */
	include("class.contact-widget.php");
	
/*
 * Register Widget
 */
	function register_contact_widget(){
		register_widget("Contact_Widget");
	}
	add_action("widgets_init", "register_contact_widget");
?>