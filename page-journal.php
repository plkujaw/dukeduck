<?php
/*
Template name: Journal
*/

get_header();

?>
<?php get_template_part('inc/template-parts/visual-popup'); ?>


<div class="journal">
  <div class="container">
    <?php get_template_part('inc/template-parts/journal-top'); ?>
  </div>
  <section class="journal__main">
    <?php the_content(); ?>
  </section>
</div>

<?php get_footer() ?>