  <?php
  /**
   * Block Name: Hero Alt
   *
   * This is the template that displays the Hero Alt block.
   */
  $title = get_field('hero_alt_title');
  $subtitle = get_field('hero_alt_subtitle');
  $image = get_field('hero_alt_image');
  $graphic_element = get_field('hero_alt_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block hero-alt block-hero-alt">
      <div class="container">
        <article class="block-hero-alt__text animation-rise-fade-in js-rise-fade-in">
          <h1 class="fs-h1"><?php echo $title; ?></h1>
          <h2 class="fs-h2"><?php echo $subtitle; ?>
            <?php if ($graphic_element) { ?>
              <span class="graphic-element graphic-element--animate animation-autoplay" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
              </span>
            <?php } ?>
          </h2>
        </article>
        <div class="block-hero-alt__media animation-rise-fade-in js-rise-fade-in">
          <div class="block-hero-alt__img">
            <picture>
              <?php echo wp_get_attachment_image($image, 'hero'); ?>
            </picture>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>