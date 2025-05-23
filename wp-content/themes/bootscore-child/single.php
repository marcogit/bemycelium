<?php

/**
 * Template Post Type: post
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<div id="content" class="site-content <?= apply_filters('bootscore/class/container', '', 'single'); ?> <?= apply_filters('bootscore/class/content/spacer', '', 'single'); ?>">
  <div id="primary" class="content-area">

    <?php do_action('bootscore_after_primary_open', 'single'); ?>
    <div class="entry-header entry-header--post">
      <div class="container">
        <?php the_post(); ?>
        <?php bootscore_category_badge(); ?>
        <?php do_action('bootscore_before_title', 'single'); ?>
        <?php the_title('<h1 class="entry-title ' . apply_filters('bootscore/class/entry/title', '', 'single') . '">', '</h1>'); ?>
        <?php do_action('bootscore_after_title', 'single'); ?>
        <p class="entry-meta">
          <small class="text-body-secondary">
            <?php
            bootscore_date();
            bootscore_author();
            bootscore_comment_count();
            ?>
          </small>
        </p>
        <?php bootscore_post_thumbnail(); ?>
      </div>
    </div>
    <div class="container">
      <?php the_breadcrumb(); ?>
      <div class="row justify-content-between">
        <div class="<?= apply_filters('bootscore/class/main/col', 'col'); ?>">

          <main id="main" class="site-main">

            <?php do_action('bootscore_after_featured_image', 'single'); ?>

            <div class="entry-content entry-content--post">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <?php the_content(); ?>
                </div>
              </div>
            </div>

            <?php do_action('bootscore_before_entry_footer', 'single'); ?>

            <div class="entry-footer clear-both">
              <div class="mb-4">
                <?php bootscore_tags(); ?>
              </div>
              <!-- Related posts using bS Swiper plugin -->
              <?php if (function_exists('bootscore_related_posts')) bootscore_related_posts(); ?>
              <nav aria-label="bs page navigation">
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <?php previous_post_link('%link'); ?>
                  </li>
                  <li class="page-item">
                    <?php next_post_link('%link'); ?>
                  </li>
                </ul>
              </nav>
              <?php comments_template(); ?>
            </div>

          </main>

        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
