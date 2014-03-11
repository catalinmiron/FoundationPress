<?php
/*
Template Name: Portfolio
*/
get_header(); ?>

    <div class="small-12 large-12 columns" role="main">

    <?php /* Start loop */ ?>
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    </div>

  </div> <!-- end row from header -->

  <div class="row full-width">
    <?php $portfolio = new WP_Query(array(
            'post_type' => 'portfolio'
          ));
    ?>
    <?php while ($portfolio->have_posts()) : $portfolio->the_post() ;?>
      <div class="large-3 columns portfolio-item">
          <!-- <a href="<?php the_permalink(); ?>"> -->
          <?php the_post_thumbnail('large'); ?>
          <!-- </a> -->
          <div class="portfolio-item-details">
            <h2><?php the_title(); ?></h2>
            <p><?php  echo substr(strip_tags(get_the_content()),0,100) . ' [...] '; ?></p>
            <a href="<?php the_permalink(); ?>" class="button batman tiny">Read more</a>
          </div>
      </div>
    <?php endwhile; ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
  </footer>
  <?php endwhile; // End the loop ?>

<?php get_footer(); ?>
