  <?php
  /**
   * Block Name: Newsletter
   *
   * This is the template that displays the Newsletter block.
   */

  $title = get_field('block_newsletter_title', 'option');
  $subtitle = get_field('block_newsletter_subtitle', 'option');
  $graphic = get_field('block_newsletter_graphic_element', 'option');

  $graphic_element_transformation = get_field('block_newsletter_graphic_element_transformation', 'option');

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

    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>

    <section class="block block-newsletter animation-rise-fade-in js-rise-fade-in<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="newsletter__inner">
          <div class="newsletter__heading">
            <div class="newsletter__copy">
              <h2 class="fs-h3"><?php echo $title; ?></h2>
              <p class="fs-p1"><?php echo $subtitle; ?></p>
            </div>
            <div class="newsletter__graphic-element graphic-element graphic-element--animate" data-name="<?php echo $graphic; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>"></div>
          </div>
          <div class="newsletter__form">
            <script>
              hbspt.forms.create({
                region: "na1",
                portalId: "9409389",
                formId: "57ef4d90-c8b5-414b-b318-c9f4b1094f16"
              });
            </script>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>