<?php

function ml_movie_listings_settings() {
	add_settings_section(
		'ml_settings_section',
		'Movie Listings Settings',
		'ml_settings_section_callback',
		'reading'
	);

	add_settings_field(
		'ml_settings_show_editor',
		'Show Editor',
		'ml_settings_show_editor_callback',
		'reading',
		'ml_settings_section'
	);

	register_setting('reading', 'ml_settings_show_editor');

	add_settings_field(
		'ml_settings_show_media_buttons',
		'Show Media Buttons',
		'ml_settings_show_media_buttons_callback',
		'reading',
		'ml_settings_section'
	);

	register_setting('reading', 'ml_settings_show_media_buttons');
}

add_action('admin_init', 'ml_movie_listings_settings');

// Callback functions

function ml_settings_section_callback() {
	echo '<p>Settings for the Movie Listings Plugin</p>';
}

function ml_settings_show_editor_callback() {
	echo '<input 
		name="ml_settings_show_editor" 
		id="ml_settings_show_editor"
		type="checkbox"
		value="1"
		class="code"
		' . checked(1, get_option('ml_settings_show_editor'), false) . ' />
	    Choose if details should be an editor';
}

function ml_settings_show_media_buttons_callback() {
	echo '<input 
		name="ml_settings_show_media_buttons" 
		id="ml_settings_show_media_buttons"
		type="checkbox"
		value="1"
		class="code"
		' . checked(1, get_option('ml_settings_show_media_buttons'), false) . ' />
	    Choose if media buttons should be enabled';
}