<?php

/**
 * Block Name: Case Study - Minimal
 *
 * This is the template that displays the Case Study - Minimal block.
 */

$case_study_id = get_field('case_study_minimal')->ID;
$case_study_client = get_field('case_study_client', $case_study_id);
$case_study_featured_image = get_the_post_thumbnail($case_study_id, 'entry');
$case_study_featured_video = get_field('case_study_featured_video', $case_study_id);
$autoplay_video = get_field('autoplay_video_on_scroll');

$layout = get_field('case_study_minimal_layout');
$case_studies = get_field('case_study_minimal_case_studies');

if ($autoplay_video) {
  $autoplay = ' video-autoplay';
}

$spacing_top = get_field('block_spacing')['margin_top'];
$spacing_bottom = get_field('block_spacing')['margin_bottom'];

$spacing = $spacing_top . ' ' . $spacing_bottom;

// Block preview
if (!empty($block['data']['_is_preview'])) {
  block_preview_image($block['name']);
} else if ($case_study_id or $case_studies) { ?>
  <section class="block block-case-study block-case-study--minimal <?php echo $spacing; ?>">
    <div class="container">
      <?php if ($layout === 'full') { ?>
        <div class="block-case-study__inner">
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
              <h4 class=" fs-p1"><?php echo $case_study_client; ?></h4>
            </div>
          </div>
        </div>
      <?php } else {
        $column_ratio = get_field('case_study_minimal_columns_ratio');

        if ($column_ratio == 'offset') {
          $column_ratio = ' block-case-study__inner--col-2--offset';
        } elseif ($column_ratio == 'offset-reverse') {
          $column_ratio = ' block-case-study__inner--col-2--offset block-case-study__inner--col-2--offset--reverse';
        } else {
          $column_ratio = '';
        }
      ?>
        <div class="block-case-study__inner block-case-study__inner--col-2<?php echo $column_ratio; ?>">
          <?php foreach ($case_studies as $case_study) {
            $case_study_id = $case_study['case_study']->ID;
            $case_study_client = get_field('case_study_client', $case_study_id);
            $case_study_featured_image = get_the_post_thumbnail($case_study_id, 'entry');
            $case_study_featured_video = get_field('case_study_featured_video', $case_study_id);
          ?>
            <?php if ($case_study_id) { ?>
              <div class="block-case-study--minimal-case-study-wrapper <?php echo 'item-' . array_search($case_study, $case_studies); ?>">
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
                    <h4 class="fs-p1"><?php echo $case_study_client; ?></h4>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </section>
<?php } ?>