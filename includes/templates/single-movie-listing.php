<?php get_header(); ?>
<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_title('<h1 class="ml-title">','</h1>'); ?>
				<div class="ml-release"><?php esc_html_e('Release Date:', 'ml-domain'); ?> <strong><?php esc_html_e($post->release_date, 'ml-domain'); ?></strong></div>
				<div class="ml-content">
					<div class="ml-left">
						<img class="feat-img-single" src="<?php echo $image[0]; ?>">
					</div>
					<div class="ml-right">
						<h3><?php esc_html_e('Plot / Details', 'ml-domain'); ?></h3>
						<?php esc_html_e($post->details); ?>
						<br><br><hr>
						<h3><?php esc_html_e('Movie Info', 'ml-domain'); ?></h3>
						<ul class="movie-info">
							<?php if($post->mpaa_rating) : ?>
								<li><strong><?php esc_html_e('MPAA Rating: ', 'ml-domain'); ?><?php esc_html_e($post->mpaa_rating, 'ml-domain'); ?></li>
							<?php endif; ?>
							<?php if($post->director) : ?>
								<li><strong><?php esc_html_e('Director: ', 'ml-domain'); ?> <?php esc_html_e($post->director, 'ml-domain'); ?></li>
							<?php endif; ?>
							<?php if($post->stars) : ?>
								<li><strong><?php esc_html_e('Stars: ', 'ml-domain'); ?> <?php esc_html_e($post->stars, 'ml-domain'); ?></li>
							<?php endif; ?>
							<?php if($post->runtime) : ?>
								<li><strong><?php esc_html_e('Runtime: ', 'ml-domain'); ?> <?php esc_html_e($post->runtime, 'ml-domain'); ?></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="clr"></div>
					<?php if($post->trailer) : ?>
						<div class="trailor">
							<h2><?php esc_html_e('Movie Trailer: ', 'ml-domain'); ?></h2>
							<iframe width="100%" height="415" src="https://www.youtube.com/embed/<?php echo $post->trailer; ?>" frameborder="0" allowfullscreen></iframe>
						</div>
					<?php endif; ?>
				</div>
			</article>
		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>