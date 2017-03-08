<?php

function ml_add_fields_metabox() {
	add_meta_box(
		'ml_listing_info',
		__('Listing Info'),
		'ml_add_fields_callback',
		'movie_listing',
		'normal',
		'default'
	);
}

add_action('add_meta_boxes', 'ml_add_fields_metabox');

function ml_add_fields_callback($post) {
	wp_nonce_field(basename(__FILE__), 'ml_movie_listings_nonce');
	$ml_stored_meta = get_post_meta($post->ID);
	?>
	<div class="wrap movie-listing-form">
		<div class="form-group">
			<label for="movie_id"><?php esc_html_e('Movie Listing ID', 'ml-domain'); ?></label>
			<input type="text"
			       id="movie_id"
			       name="movie_id"
				   value="<?php if(!empty($ml_stored_meta['movie_id'])) echo esc_attr($ml_stored_meta['movie_id'][0]); ?>">
		</div>
		<div class="form-group">
			<label for="mpaa_rating"><?php esc_html_e('MPAA Rating', 'ml-domain'); ?></label>
			<select id="mpaa_rating" name="mpaa_rating">
				<?php
					$option_values = array('G', 'PG', 'PG-13', 'R', 'NR');
					foreach($option_values as $key => $value) {
						if($value == $ml_stored_meta['mpaa_rating'][0]) {
							?>
							<option selected><?php echo $value; ?></option>
							<?php
						} else {
							?>
							<option><?php echo $value; ?></option>
							<?php
						}
					} ?>
			</select>
		</div>
		<div class="form-group">
			<label for="details"><?php esc_html_e('Details', 'ml-domain'); ?></label>
			<?php
				$content = get_post_meta($post->ID, 'details', true);
				$editor = 'details';
				$settings = array(
					'textarea_rows' =>  5,
					'media_buttons' =>  true
				);

				wp_editor($content, $editor, $settings);
			?>
		</div>
		<div class="form-group">
			<label for="release_date"><?php esc_html_e('Release Date', 'ml-domain'); ?></label>
			<input type="date"
			       id="release_date"
			       name="release_date"
			       value="<?php if(!empty($ml_stored_meta['release_date'])) echo esc_attr($ml_stored_meta['release_date'][0]); ?>">
		</div>
		<div class="form-group">
			<label for="director"><?php esc_html_e('Director', 'ml-domain'); ?></label>
			<input type="text"
			       id="director"
			       name="director"
			       value="<?php if(!empty($ml_stored_meta['director'])) echo esc_attr($ml_stored_meta['director'][0]); ?>">
		</div>
		<div class="form-group">
			<label for="stars"><?php esc_html_e('Stars', 'ml-domain'); ?></label>
			<input type="text"
			       id="stars"
			       name="stars"
			       value="<?php if(!empty($ml_stored_meta['stars'])) echo esc_attr($ml_stored_meta['stars'][0]); ?>">
		</div>
		<div class="form-group">
			<label for="runtime"><?php esc_html_e('Runtime', 'ml-domain'); ?></label>
			<input type="text"
			       id="runtime"
			       name="runtime"
			       value="<?php if(!empty($ml_stored_meta['runtime'])) echo esc_attr($ml_stored_meta['runtime'][0]); ?>"> <span class="mins"> Mins</span>
		</div>
		<div class="form-group">
			<label for="trailer"><?php esc_html_e('YouTube Trailer ID', 'ml-domain'); ?></label>
			<input type="text"
			       id="trailer"
			       name="trailer"
			       value="<?php if(!empty($ml_stored_meta['trailer'])) echo esc_attr($ml_stored_meta['trailer'][0]); ?>">
		</div>
	</div>
	<?php
}