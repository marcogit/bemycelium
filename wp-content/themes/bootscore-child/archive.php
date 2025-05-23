<?php

/**
 * Archive Template: Equal Height
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 * @version 6.0.0
 */

// Exit if accessed directly
defined('ABSPATH') || exit;

get_header();
?>

<div id="content" class="site-content container pt-4 pb-5">
  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <div class="page-header">
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
      </div>

      <div class="row">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4">

              <div class="card h-100">

                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                  </a>
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

                  <p class="card-text mt-auto">
                    <a class="read-more" href="<?php the_permalink(); ?>">
                      <?php _e('Read more »', 'bootscore'); ?>
                    </a>
                  </p>

                  <?php bootscore_tags(); ?>

                </div>

              </div>

            </div>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>

      <div class="entry-footer">
        <?php bootscore_pagination(); ?>
      </div>

    </main>

  </div>
</div>
<?php
get_footer();
