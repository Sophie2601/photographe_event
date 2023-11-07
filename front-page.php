<?php
the_content();

get_header();
?>
<main>
<section class="banner">
    <img class="banner" src="wp-content/themes/photoevent/screenshot.png" alt='banner'>
</section>

<?php include('filtre.php');?>



<?php if ($photos_query->have_posts()) : ?>
			<div class="gallery">
				<?php while ($photos_query->have_posts()) : $photos_query->the_post(); ?>
					<?php get_template_part('template-parts/photo_block'); ?>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<div class="button-charger">
			<button id="load-more" class="btn load-more">Charger plus</button>
		</div>
<!--*******-->
<?php
		$args = array(
			'post_type' => 'photo',
			'posts_per_page' => 8,
			'orderby' => 'date',
			'order' => 'DESC',
		);

		$photos_query = new WP_Query($args);
		?>

<?php include('lightbox.php');?>



</main>
<?php

get_footer();

