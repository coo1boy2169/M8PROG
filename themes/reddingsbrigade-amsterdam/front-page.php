<?php get_header(); ?>

<div class="hero">
  <h2>Welkom bij de Reddingsbrigade Amsterdam</h2>
  <p>Wij waken over het water in en rond Amsterdam.</p>
</div>

<section class="nieuws">
  <h2>Laatste Nieuws</h2>
  <?php
  $news_query = new WP_Query(array('posts_per_page' => 3));
  while ($news_query->have_posts()) : $news_query->the_post(); ?>
    <article>
      <h3><?php the_title(); ?></h3>
      <p><?php the_excerpt(); ?></p>
      <a href="<?php the_permalink(); ?>">Lees meer</a>
    </article>
  <?php endwhile; wp_reset_postdata(); ?>
</section>

<section class="agenda">
  <h2>Agenda</h2>
  <!-- Voeg hier ACF of een agenda-plugin shortcodes toe -->
</section>

<?php get_footer(); ?>
