  <?php
  /**
   * Block Name: Masonry
   *
   * This is the template that displays the Masonry block.
   */


  $masonry_images = get_field('block_masonry_images');
  $columns = get_field('block_masonry_layout')['columns'];

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-masonry<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-masonry__inner animation-rise-fade-in js-rise-fade-in" <?php echo set_grid_layout($columns); ?>>
          <?php foreach ($masonry_images as $image) {
            $span_horizontal = $image['span_horizontal'];
            $span_vertical = $image['span_vertical'];
            $image = $image['image'];
            $layout = set_image_layout($span_horizontal, $span_vertical);
          ?>
            <picture class="masonry-item <?php echo $layout; ?>">
              <?php echo wp_get_attachment_image($image, 'entry'); ?>
            </picture>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>