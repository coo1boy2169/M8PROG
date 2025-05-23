<?php get_header(); ?>

<main class="container">
    <?php the_post(); ?>

    <article>
        <h1><?php the_title(); ?></h1>
        <p><strong>Gepubliceerd op:</strong> <?php the_date(); ?></p>
        <p><strong>Laatste update:</strong> <?php the_modified_date(); ?></p>
        <div class="author-info">
            <?php echo get_avatar(get_the_author_meta('user_email'), 80); ?>
            <p><strong>Auteur:</strong> <?php the_author(); ?></p>
            <p><?php the_author_meta('description'); ?></p>
        </div>

        <div class="post-content">
            <?php the_content(); ?>
        </div>

        <div class="post-navigation">
            <?php
            the_post_navigation([
                'next_text' => __('Volgend bericht', 'jouw-textdomain'),
                'prev_text' => __('Vorig bericht', 'jouw-textdomain'),
            ]);
            ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>
