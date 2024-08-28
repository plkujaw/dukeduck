  <?php
  /**
   * Block Name: Link Alt
   *
   * This is the template that displays the Link Alt block.
   */

  $title = get_field('block_link_alt_title');
  $copy = get_field('block_link_alt_copy');
  $link = get_field('block_link_alt_link');
  $graphic_element = get_field('block_link_alt_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>


    <section class="block block-link-alt<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-link-alt__inner animation-rise-fade-in js-rise-fade-in">
          <div class="block-link-alt__text animation-rise-fade-in js-rise-fade-in">
            <h2 class="fs-h5"><?php echo $title; ?></h2>
            <p class="fs-p2"><?php echo $copy; ?></p>
          </div>
          <div class="block-link-alt__meta">
            <div class="block-link-alt__graphic-element graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
            </div>
            <?php if ($link) { ?>
              <div class="block-link-alt__link animation-rise-fade-in js-rise-fade-in">
                <a href="<?php echo esc_url($link['url']); ?>" class="link-arrow-1 arrow-right fs-b2" target="<?php echo esc_attr($link['target']); ?>"><?php echo $link['title']; ?> <?php get_template_part('inc/template-parts/arrow-1'); ?></a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>