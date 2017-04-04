<?php
/**
 * Plugin Name: Movie Listings
 * Description: List movies and info
 * Version: 1.0
 * Author: Benjamin Mercer
 *
 **/

// Exit if Accessed Directly
if(!defined('ABSPATH')){
	exit;
}

// Include Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-scripts.php');

// Check if Admin
if(is_admin()) {
	require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-fields.php');
	require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-reorder.php');
	require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-settings.php');
}
require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-cpt.php');

require_once(plugin_dir_path(__FILE__) . '/includes/movie-listings-shortcodes.php');
