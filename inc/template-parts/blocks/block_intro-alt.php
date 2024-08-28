  <?php
  /**
   * Block Name: Intro Alt
   *
   * This is the template that displays the Intro Alt block.
   */

  $title = get_field('block_intro_alt_title');
  $subtitle = get_field('block_intro_alt_subtitle');
  $copy = get_field('block_intro_alt_copy');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;


  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-intro-alt<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-intro-alt__text">
          <div class="block-intro-alt__text-col-1 animation-rise-fade-in js-rise-fade-in">
            <h2 class="fs-h6"><?php echo $title; ?></h2>
          </div>
          <div class="block-intro-alt__text-col-2 animation-rise-fade-in js-rise-fade-in">
            <h3 class="fs-h3"><?php echo $subtitle; ?></h3>
            <p class="fs-p2"><?php echo $copy; ?></p>
          </div>
        </div>
      </div>
    </section>

  <?php } ?>