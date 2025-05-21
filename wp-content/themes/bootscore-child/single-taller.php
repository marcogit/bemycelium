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
    <div class="entry-header entry-header--taller">
      <div class="container">
        <?php the_post(); ?>
        <?php bootscore_category_badge(); ?>
        <span class="h6">Taller</span>
        <?php do_action('bootscore_before_title', 'single'); ?>
        <?php the_title('<h1 class="entry-title ' . apply_filters('bootscore/class/entry/title', '', 'single') . '">', '</h1>'); ?>
        <?php do_action('bootscore_after_title', 'single'); ?>

      </div>
    </div>

    <div class="container">
      <main id="main" class="site-main">
        <?php do_action('bootscore_after_featured_image', 'single'); ?>
        <?php
        if (has_post_thumbnail()) :
          the_post_thumbnail('full', array('class' => 'img-fluid rounded'));
        endif;
        ?>
        <div class="entry-content entry-content--taller">
          <div class="row justify-content-center">
            <div class="col-lg-9">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php do_action('bootscore_before_entry_footer', 'single'); ?>
      </main>
    </div>
  </div>
</div>

<?php
get_footer();
