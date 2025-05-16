<?php get_header(); ?>
<h1 style="text-align:center;">Alle Brownie Recepten</h1>

<?php get_template_part('template-parts/filter'); ?>

<div class="grid">
  <?php
  $args = [
    'post_type' => 'recept',
    'posts_per_page' => -1,
  ];

  if (isset($_GET['ingredient'])) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'ingredienten',
        'field' => 'slug',
        'terms' => sanitize_text_field($_GET['ingredient']),
      ]
    ];
  }

  $query = new WP_Query($args);
  while ($query->have_posts()) : $query->the_post();
    get_template_part('template-parts/card', 'recept');
  endwhile;
  wp_reset_postdata();
  ?>
</div>
<?php get_footer(); ?>
