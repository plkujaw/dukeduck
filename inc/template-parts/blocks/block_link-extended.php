  <?php
  /**
   * Block Name: Link Extended
   *
   * This is the template that displays the Link Extended block.
   */
  $title = get_field('link_extended_title');
  $image = get_field('link_extended_image');
  $background_colour = get_field('link_extended_background_color');
  $graphic_element = get_field('link_extended_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $copy = get_field('link_extended_copy');
  $link = get_field('link_extended_link');

  $options = '';

  if ($background_colour == 'grey') {
    $options .= ' bg-grey';
  }

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>


    <section class="block block-link-extended<?php echo $options . ' ' . $spacing; ?>">
      <div class="container">
        <h2 class="block-link-extended__title fs-h5 animation-rise-fade-in js-rise-fade-in"><?php echo $title; ?></h2>
        <div class="block-link-extended__inner">
          <div class="block-link-extended__media animation-rise-fade-in js-rise-fade-in">
            <a href="<?php echo esc_url($link['url']); ?>">
              <picture>
                <?php echo wp_get_attachment_image($image, 'entry'); ?>
              </picture>
            </a>
          </div>
          <div class="block-link-extended__text">
            <?php if ($graphic_element) { ?>
              <div class="block-link-extended__graphic-element graphic-element graphic-element--animate" data-name="<?php echo $graphic_element ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
              </div>
            <?php } ?>
            <div class="block-link-extended__copy animation-rise-fade-in js-rise-fade-in">
              <?php echo $copy; ?>
            </div>
            <a href="<?php echo esc_url($link['url']); ?>" class="link-arrow-1 arrow-right fs-b1 animation-rise-fade-in js-rise-fade-in"><?php echo $link['title']; ?> <?php get_template_part('inc/template-parts/arrow-1'); ?>
            </a>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>