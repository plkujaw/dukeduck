<?php

/**
 * ------> index.php
 */

get_header();

?>
<?php get_template_part('inc/template-parts/visual-popup'); ?>


<section class="post-archive__heading">
  <div class="container">
    <?php get_template_part('inc/template-parts/journal-top'); ?>
  </div>
</section>

<section class="post-archive">
  <div class="container">
    <div class="content">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php echo get_template_part('loop'); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="pagination">
      <?php the_posts_pagination(array(
        'mid_size'  => 4,
        'prev_text' => __('', 'textdomain'),
        'next_text' => __('', 'textdomain'),
      )); ?>
    </div>
  </div>
</section>
<?php get_footer();
