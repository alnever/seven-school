<?php
/**
* Index of the Blue Berry Theme
*
* The file contains the definitions of the main loop of the theme
*
* @package SWTK
* @subpackage blue_berry
* @since Funny Colors 1.0
*/
?>
<?php get_header(); ?>


<div class="container">
    <?php get_template_part('head'); ?>

    <div class="content">
        <div class="sidebar">
        </div>

        <div class="posts">
            <!-- sticky posts -->
            <?php
                $sticky = get_option('sticky_posts');
                $args = [
                    'post__in' => $sticky,
                    'ignore_sticky_posts' => 5,
                ];
                $query = new WP_Query($args);
                if ( $query->have_posts() ): ;
            ?>
            <div class="posts-sticky">
                    <?php

                        while ( $query->have_posts() ): $query->the_post();
                    ?>
                        <article class="post-sticky" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <div class="post-sticky-title"> <?php the_title(); ?> </div>

                                <div class="post-sticky-date">
                                    <?php echo get_the_date('d.m.Y'); ?>
                                </div>

                                <div class="post-sticky-content">
                                    <?php the_excerpt(); ?>
                                </div>

                                <?php if (has_category()): ?>
                                    <div class="post-sticky-categories">
                                        <img src="<?php echo get_theme_file_uri('/icons/category.svg'); ?>" class="swtk-icon">
                                        <?php the_category(); ?>
                                    </div>
                                <?php endif; ?>

                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>

            </div>
            <?php endif; ?>

            <!-- main cycle -->
            <?php
                $args = [
                    'posts_per_page' => 12,
                    'ignore_sticky_posts' => 1,
                ];
                $query = new WP_Query($args);
            ?>

                <?php if ($query->have_posts()): ?>
                    <div class="posts-feed">

                          <?php while($query->have_posts()): $query->the_post(); ?>
                            <article class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <!-- post header -->
                                <div class="post-title"> <?php the_title(); ?> </div>

                                <div class="post-date">
                                    <?php echo get_the_date('d.m.Y'); ?>
                                </div>

                                <div class="post-content">
                                    <?php the_excerpt(); ?>
                                </div>

                                <?php if (has_category()): ?>
                                    <div class="post-categories">
                                        <img src="<?php echo get_theme_file_uri('/icons/category.svg'); ?>" class="swtk-icon">
                                        <?php the_category(); ?>
                                    </div>
                                <?php endif; ?>


                            </article>
                          <?php endwhile; ?>
                          <div class="swtk-pagination">
                              <img src="<?php echo get_theme_file_uri('/icons/pages.svg'); ?>" alt="" class="swtk-icon">
                              <?php the_posts_pagination(); ?>
                          </div>
                    </div>
                <?php endif; ?>
        </div>
        <div class="sidebar">
        </div>
    </div>

    <?php get_template_part('foot'); ?>

</div>

<?php get_footer(); ?>