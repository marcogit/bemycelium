<?php

/**
 * Template Name: No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.1.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <?php do_action('bootscore_after_primary_open', 'page-sidebar-none'); ?>

    <main id="main" class="site-main">

      <div class="entry-header">
        <div class="container">
          <div class="entry-header_inner entry-header-inner--standard">
            <?php do_action('bootscore_before_entry_header', 'page-sidebar-none'); ?>
            <?php the_post(); ?>
            <?php do_action('bootscore_before_title', 'page-sidebar-none'); ?>
            <?php the_title('<h1 class="entry-title ' . apply_filters('bootscore/class/entry/title', '', 'page-sidebar-none') . '">', '</h1>'); ?>
            <?php do_action('bootscore_after_title', 'page-sidebar-none'); ?>
            <?php bootscore_post_thumbnail(); ?>
          </div>
        </div>

      </div>

      <?php do_action('bootscore_after_featured_image', 'page-sidebar-none'); ?>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <?php do_action('bootscore_before_entry_footer', 'page-sidebar-none'); ?>

    </main>

  </div>
</div>

<?php
get_footer();
