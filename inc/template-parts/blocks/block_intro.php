  <?php
  /**
   * Block Name: Intro
   *
   * This is the template that displays the Intro block.
   */

  $title = get_field('intro_title');
  $underline_1 = $title['title_row_1_underline'];
  $underline_2 = $title['title_row_2_underline'];
  $subtitle = get_field('intro_subtitle');
  $copy = get_field('intro_copy');
  $background_colour = get_field('intro_background_color');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>


    <section class="block block-intro<?php echo $background_colour == 'grey' ? ' bg-grey' : '';
                                      echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-intro__title animation-rise-fade-in js-rise-fade-in">
          <h2 class="fs-h4">
            <span <?php echo  $underline_1 ? "class='js-animate-draw-scroll graphic-underline'" : '' ?>><?php echo $title['title_row_1']; ?>
              <?php $underline_1 ? get_template_part('inc/template-parts/graphic/graphic-underline') : '' ?></span><br>
            <span <?php echo  $underline_2 ? "class='js-animate-draw-scroll graphic-underline'" : '' ?>><?php echo $title['title_row_2']; ?>
              <?php $underline_2 ? get_template_part('inc/template-parts/graphic/graphic-underline') : '' ?></span>
          </h2>
        </div>
        <div class="block-intro__inner">
          <h3 class="fs-h5 animation-rise-fade-in js-rise-fade-in"><?php echo $subtitle; ?></h3>
          <article class="animation-rise-fade-in js-rise-fade-in"><?php echo $copy; ?></article>
        </div>
      </div>
    </section>
  <?php } ?>