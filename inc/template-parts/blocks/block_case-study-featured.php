<?php

/**
 * Block Name: Featured Case Study
 *
 * This is the template that displays the Featured Case Study block.
 * 
 */
$block_title = get_field('featured_case_study_block_title');
$case_study_id = get_field('featured_case_study', 'option')->ID;
$case_study_client = get_field('case_study_client', $case_study_id);
$case_study_featured_image = get_the_post_thumbnail($case_study_id, 'hero');
$case_study_featured_video = get_field('case_study_featured_video', $case_study_id);
$autoplay_video = get_field('autoplay_video_on_scroll');

$background_colour = get_field('case_study_background_color');
$graphic_element = get_field('featured_case_study_graphic_element');

$graphic_element_transformation = get_field('graphic_element_transformation');

$flip_vertical = $graphic_element_transformation['flip_vertical'];
$flip_horizontal = $graphic_element_transformation['flip_horizontal'];
$rotate = $graphic_element_transformation['rotate'];

if ($autoplay_video) {
  $autoplay = ' video-autoplay';
}

$spacing_top = get_field('block_spacing')['margin_top'];
$spacing_bottom = get_field('block_spacing')['margin_bottom'];

$spacing = $spacing_top . ' ' . $spacing_bottom;

// Block preview
if (!empty($block['data']['_is_preview'])) {
  block_preview_image($block['name']);
} else { ?>

  <section class="block block-case-study block-case-study--featured  block-case-study--wide animation-rise-fade-in js-rise-fade-in <?php echo $spacing; ?>">
    <div class="container">
      <?php if ($block_title) { ?>
        <h2 class="fs-h5 featured-title"><?php echo $block_title; ?></h2>
      <?php } ?>
      <div class="block-case-study__inner">
        <div class="block-case-study__graphic-element">
          <?php if ($block_title) { ?>
            <h2 class="fs-h3 featured-title"><?php echo $block_title; ?></h2>
          <?php } ?>

          <?php if ($graphic_element) { ?>
            <div class="graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
            </div>
          <?php } ?>
        </div>
        <div class="block-case-study__media animation-rise-fade-in js-rise-fade-in">
          <?php if ($case_study_featured_video) { ?>
            <div class="embed-container vimeo-player-custom-controls<?php echo $autoplay; ?>">
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
            <h4 class="fs-p1"><?php echo $case_study_client; ?></h4>
          </div>
          <!-- <div class="block-case-study__copy">
            <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>" class="link-arrow-1 arrow-right fs-b1">VIEW MORE <?php get_template_part('inc/template-parts/arrow-1'); ?>
            </a>
          </div> -->
        </div>
      </div>
    </div>
  </section>
<?php } ?>