<?php get_header(); ?>

<main class="container">
    <?php the_post(); ?> <!-- Zorg dat WordPress weet welke content hij moet laden -->

    <article>
        <h1><?php the_title(); ?></h1>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>
