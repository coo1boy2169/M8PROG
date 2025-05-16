<?php get_header(); ?>
<main style="padding:2rem;">
  <h1><?php the_title(); ?></h1>
  <?php if (has_post_thumbnail()) {
    the_post_thumbnail('large');
  } ?>
  <div><?php the_content(); ?></div>
</main>
<?php get_footer(); ?>
