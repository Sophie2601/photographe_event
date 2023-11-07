<?php
get_header() ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post_contant">
    <div class="post_image">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail" />
        <?php endif; ?>
        <?php the_content(); ?>
    </div>
    <div class="post_description">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <p class="single-photo-txt">CATÉGORIE : <?php echo the_terms(get_the_ID(), 'categorie', false); ?></p>
        <p class="single-photo-txt">TYPE : <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p>
        <p class="single-photo-txt">FORMAT : <?php echo the_terms(get_the_ID(), 'format', false); ?></p>
        <p class="single-photo-txt">RÉFÉRENCE : <?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
        <time class="single-photo-txt" datetime="<?= get_the_date('Y-m-d'); ?>">ANNÉE: <?php echo get_the_date('Y'); ?></time>
    </div>
</div>
<span class="separateur"></span>

</article><!-- #post-<?php the_ID(); ?> -->
<div class="second-part-slider">
<button class="favorite styled" type="button">
    <h3>contact</3>
</button>
        <?php
		$previousPhoto = get_previous_post();
		$nextPhoto = get_next_post();
		?>

        <div class="second-part-arrows">
            <?php if (!empty($previousPhoto)) {
				$previousThumbnail = get_the_post_thumbnail_url($previousPhoto->ID);
				$previousLink = get_permalink($previousPhoto); ?>
            <a href="<?php echo $previousLink; ?>">
                <img class="arrow arrow_left"
                    src="<?php echo get_template_directory_uri(); ?>/photos/Arrow_left.png"
                    alt="Flèche vers la gauche" />
            </a>
            <?php } else { ?>
            <img style="opacity:0; cursor: auto;"
                src="<?php echo get_template_directory_uri(); ?>/photos/Arrow_left.png"
                alt="Flèche vers la gauche" />
            <?php }
			if (!empty($nextPhoto)) {
				$nextThumbnail = get_the_post_thumbnail_url($nextPhoto->ID);
				$nextLink = get_permalink($nextPhoto); ?>
            <a href="<?php echo $nextLink; ?>">
                <img class="arrow arrow_right"
                    src="<?php echo get_template_directory_uri(); ?>/photos/Arrow_right.png"
                    alt="Flèche vers la droite" />
            </a>
            <?php } else { ?>
            <img style="opacity:0; cursor: auto;"
                src="<?php echo get_template_directory_uri(); ?>/photos/Arrow_right.png"
                alt="Flèche vers la droite" />
            <?php } ?>
        </div>
        <div class="img-container">
            <div>
                <?php
				if (isset($previousThumbnail) && !empty($previousThumbnail)) {
					// Afficher l'image précédente
					echo '<img class="previous-img" src="' . $previousThumbnail . '" alt="afficher la photo précédente" />';
				} else {
					// Afficher un message d'erreur ?
					echo '<p></p>';
				}
				?>
            </div>

            <div>
                <?php
				if (isset($nextThumbnail) && !empty($nextThumbnail)) {
					// Afficher l'image suivante
					echo '<img class= "next-img" src="' . $nextThumbnail . '" alt="afficher la photo suivante" />';
				} else {
					// Afficher un message d'erreur ?
					echo '<p></p>';
				}
				?>
            </div>
        </div>
    </div>
</div>

<p class="entre"> Cette photo vous intéresse ?</p>

<span class="separateur-2"></span>



<aside class="related-photos">
    <h2 class="related-photos-title">Vous aimerez aussi</h2>
    <?php
    $categories = get_the_terms(get_the_ID(), 'categorie');
    $category_ids = array();

    if ($categories) {
        $category_ids = array_map(function ($category) {
            return $category->term_id;
        }, $categories);
    }

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 2,
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie',
                'field' => 'term_id',
                'terms' => $category_ids,
            )
        ),
        'post__not_in' => array(get_the_ID())
    );

    $photos_query = new WP_Query($args);
    ?>

    <?php if ($photos_query->have_posts()): ?>
        <div class="gallery">
            <?php while ($photos_query->have_posts()):
                $photos_query->the_post(); ?>
                <?php get_template_part('template-parts/photo_block'); ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    $category_link = get_term_link($categories[0], 'categorie');
    if (!is_wp_error($category_link)):
        ?>
        <div class="button-all">
        <a href="<?php echo esc_url($category_link); ?>" class="btn view-all-photos center-flex">Toutes les photos</a>
        </div>
    <?php endif; ?>

</aside>
<?php get_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const boutonContact = document.querySelector(".favorite.styled");
  const popupContact = document.getElementById("popupContact");
  const fermerPopupContact = document.getElementById("fermerPopupContact");
  const refDisplayElement = document.getElementById('photoReference'); 
  boutonContact.addEventListener("click", function() {
      const photoRefElement = document.querySelector('.single-photo-txt:nth-child(4)');
      let photoRef = "";
      if (photoRefElement) {
          photoRef = photoRefElement.textContent.split(' : ')[1].trim();
      }

      if (refDisplayElement) {
          refDisplayElement.textContent = "Référence: " + photoRef; 
      }

      popupContact.style.display = "block";
  });

  fermerPopupContact.addEventListener("click", function() {
      popupContact.style.display = "none"; 
  });
});
</script>

<?php get_footer(); ?>



