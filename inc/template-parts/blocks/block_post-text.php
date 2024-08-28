  <?php
  /**
   * Block Name: Post Text
   *
   * This is the template that displays the Post Text block.
   */
  $text = get_field('block_post_text');
  $font_size = get_field('block_post_font_size');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block post-text<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <article class="<?php echo $font_size; ?> animation-rise-fade-in js-rise-fade-in">
          <?php echo $text; ?>
        </article>
      </div>
    </section>
  <?php } ?>