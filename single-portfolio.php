<?php get_header(); ?>

  <div class="small-12 large-12 columns" role="main">

  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header>
      <?php the_post_thumbnail(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php getPostViews(the_ID()); ?>
        <?php FoundationPress_entry_meta(); ?>
      </header>
      <div class="post row clearfix" data-equalizer>
        <!-- <div class="large-1 columns"></div> -->
        <div class="large-10 columns clearfix">
          <div class="icon"></div>
          <div class="stem-mask"></div>
          <div class="post-content clearfix" data-equalizer-watch>
            <?php the_content(); ?>
          </div>
        </div>
        <div class="large-2 columns" data-equalizer-watch>
          <h2>Skills</h2>
          <p><?php the_field('skills'); ?></p>
          <h2>Client</h2>
          <p><?php the_field('client'); ?></p>
          <h2>Type</h2>
          <?php

          /*
          *  Displaying a single value's Label
          */

          $label = get_field_object('type')['choices'][get_field('type')];

          ?>
          <p>Colors: <?php echo $label; ?></p>
        </div>
      </div>
      <div class="large-12 columns add-bg">
        <?php previous_post_link( '%link', _x( '&larr;', 'Previous post link', 'personal' ) . '%title' ); ?>
        <?php next_post_link( '%link', '%title' . _x( '&rarr;', 'Next post link', 'personal' ) ); ?>
      </div>
      <footer>
        <p><?php the_tags(); ?></p>
      </footer>
      <?php comments_template(); ?>

    </article>
  <?php endwhile;?>

  </div>

<?php get_footer(); ?>
