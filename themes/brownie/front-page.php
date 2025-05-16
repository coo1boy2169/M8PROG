<?php get_header(); ?>

    <div class="hero" style="background-image: url('<?php echo get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/brownies.jpg'); ?>');">
        <!-- Hero image of brownies -->
    </div>
    
    <section class="content-section">
        <div class="container">
            <h2 class="section-title"><?php echo get_theme_mod('content_title', 'Our Delicious Treats'); ?></h2>
            <div class="feature-grid">
                <?php
                // Haal 4 recente berichten op
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="feature-box">
                    <div class="feature-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php endif; ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>