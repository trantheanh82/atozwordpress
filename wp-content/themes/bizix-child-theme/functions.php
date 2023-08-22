<?php

/* *********************************************************************************************
 PLEASE DO NOT DELETE THIS FUNCTION BECAUSE THIS FUNCTION IS CALLING CHILD THIME CSS FILE
********************************************************************************************* */

function bizix_load_child_themestyles () {
	if (!is_admin()) {
		$bizix_stylesheet_uri = get_stylesheet_directory_uri();

		wp_enqueue_style('bizix-child-theme-style', $bizix_stylesheet_uri . '/style.css');
		wp_enqueue_style( 'bizix-child-theme-style', $bizix_stylesheet_uri . '/style.css', '', '1.0' );

	}
}
add_action('wp_enqueue_scripts', 'bizix_load_child_themestyles',1000);

/* ******************************************************************************************** */