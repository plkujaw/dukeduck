<?php

/**
 * Block Name: Page Title
 *
 * This is the template that displays the Page Title block.
 */

$title = get_field('block_page_title');
?>
<section class="block block-page-title">
  <div class="container">
    <h1 class="fs-h1 animation-rise-fade-in js-rise-fade-in"><span class="js-animate-draw graphic-underline"><?php echo $title; ?>
        <?php get_template_part('inc/template-parts/graphic/graphic-underline'); ?>
      </span></h1>
  </div>
</section>