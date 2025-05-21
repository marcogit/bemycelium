<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.1.1
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>
<div id="content" class="site-content <?= apply_filters('bootscore/class/container', '', 'index'); ?> <?= apply_filters('bootscore/class/content/spacer', '', 'index'); ?>">
  <div id="primary" class="content-area">

    <?php do_action('bootscore_after_primary_open', 'index'); ?>

    <main id="main" class="site-main">

      <!-- Header -->
      <div class="page-header">
        <div class="container">
          <?php do_action('bootscore_before_title', 'index'); ?>
          <h1 class="entry-title <?= apply_filters('bootscore/class/entry/title', '', 'index'); ?>">Blog</h1>
          <?php do_action('bootscore_after_title', 'index'); ?>
        </div>
      </div>

      <!-- Post List -->
      <div class="container">
        <div class="row justify-content-between">
          <div class="<?= apply_filters('bootscore/class/main/col', 'col'); ?>">
            <div class="row">
              <?php do_action('bootscore_before_loop', 'index'); ?>

              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                  <?php do_action('bootscore_before_loop_item', 'index'); ?>

                  <div class="col-md-6 col-lg-4">

                    <article class="card card-post">

                      <?php if (has_post_thumbnail()) : ?>
                        <div class="card-header">
                          <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('custom-size', array('class' => 'card-img-top')); ?>
                          </a>
                        </div>
                      <?php endif; ?>

                      <div class="card-body d-flex flex-column">

                        <?php bootscore_category_badge(); ?>

                        <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                          <?php the_title('<h2 class="blog-post-title h5">', '</h2>'); ?>
                        </a>

                        <?php if ('post' === get_post_type()) : ?>
                          <p class="meta small mb-2 text-body-secondary">
                            <?php
                            bootscore_date();
                            bootscore_author();
                            bootscore_comments();
                            bootscore_edit();
                            ?>
                          </p>
                        <?php endif; ?>

                        <p class="card-text">
                          <a class="text-body text-decoration-none" href="<?php the_permalink(); ?>">
                            <?= strip_tags(get_the_excerpt()); ?>
                          </a>
                        </p>
                        <?php bootscore_tags(); ?>

                      </div>
                      <div class="card-footer">
                        <a class="read-more" href="<?php the_permalink(); ?>">
                          <?php _e('Read more »', 'bootscore'); ?>
                        </a>
                      </div>

                    </article>

                  </div>

                  <?php do_action('bootscore_after_loop_item', 'index'); ?>

                <?php endwhile; ?>
              <?php endif; ?>

              <?php do_action('bootscore_after_loop', 'index'); ?>

              <div class="entry-footer">
                <?php bootscore_pagination(); ?>
              </div>
            </div>
          </div><!-- col -->
          <?php get_sidebar(); ?>
        </div><!-- row -->
      </div><!-- container -->
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
