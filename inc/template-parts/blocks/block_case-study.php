  <?php
  /**
   * Block Name: Case Study
   *
   * This is the template that displays the Case Study block.
   */
  $case_study_id = get_field('case_study')->ID;
  $case_study_client = get_field('case_study_client', $case_study_id);
  $case_study_featured_image = get_the_post_thumbnail($case_study_id, 'entry');
  $case_study_featured_video = get_field('case_study_featured_video', $case_study_id);

  $layout_type = get_field('case_study_layout_type');
  $layout_reverse = get_field('case_study_layout_reverse');
  $background_colour = get_field('case_study_background_color');
  $graphic_element = get_field('case_study_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $options = '';

  if ($layout_reverse == 1) {
    $options .= ' block-case-study--reverse';
  }

  if ($background_colour == 'grey') {
    $options .= ' bg-grey';
  }

  if ($layout_type == 'wide') {
    $options .= ' block-case-study--wide';
  }


  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;
  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else if ($case_study_id) { ?>
    <section class="block block-case-study<?php echo $options . ' ' . $spacing; ?>">
      <div class="container">
        <div class="block-case-study__inner">
          <?php if ($graphic_element) { ?>
            <div class="block-case-study__graphic-element">
              <div class=" graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
              </div>
            </div>
          <?php } ?>
          <div class="block-case-study__media animation-rise-fade-in js-rise-fade-in">
            <?php if ($case_study_featured_video) { ?>
              <div class="embed-container vimeo-player-custom-controls">
                <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>">
                  <?php echo get_plain_video($case_study_featured_video); ?>
                </a>
              </div>
            <?php } elseif ($case_study_featured_image) { ?>
              <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>">
                <picture>
                  <?php echo $case_study_featured_image; ?>
                </picture>
              </a>
            <?php } ?>
          </div>
          <div class="block-case-study__text animation-rise-fade-in js-rise-fade-in">
            <div class="block-case-study__heading">
              <h3 class="fs-h3"><a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>"><?php echo get_the_title($case_study_id); ?></a></h3>
              <!-- <h4 class=" fs-p1"><?php echo $case_study_client; ?></h4> -->
            </div>
            <div class="block-case-study__copy">
              <p class="fs-p3"><?php echo get_the_excerpt($case_study_id); ?></p>
              <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>" class="link-arrow-1 arrow-right fs-b1">VIEW MORE <?php get_template_part('inc/template-parts/arrow-1'); ?>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>