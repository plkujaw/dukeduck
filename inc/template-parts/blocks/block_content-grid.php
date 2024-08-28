  <?php
  /**
   * Block Name: Content Grid
   *
   * This is the template that displays the Content Grid block.
   */

  $title = get_field('block_content_grid_title');
  $content = get_field('block_content_grid_content');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-content-grid<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-content-grid__heading animation-rise-fade-in js-rise-fade-in">
          <h2 class="fs-h5"><?php echo $title; ?></h2>
        </div>
        <div class="block-content-grid__content animation-rise-fade-in js-rise-fade-in">
          <?php foreach ($content as $entry) { ?>
            <div class="block-content-grid__entry">
              <?php echo wp_get_attachment_image($entry, 'entry-small') ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>