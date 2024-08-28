<?php

/**
 * The template for displaying the error 404 page
 *
 *
 */
$case_study_id = get_field('featured_case_study', 'option')->ID;
$case_study_client = get_field('case_study_client', $case_study_id);
$case_study_featured_image = get_the_post_thumbnail($case_study_id, 'hero');
$case_study_featured_video = get_field('case_study_featured_video', $case_study_id);
get_header(); ?>


<section class="page404">
  <div class="page404__inner">
    <div class="container">
      <div class="page404__heading">
        <h1 class="fs-h2">404 - This page has flown south</h1>
        <h2 class="fs-p1">Watch something while we get our ducks back in a row.</h2>
      </div>
      <div class="page404__home-link">
        <a href="<?php echo site_url(); ?>" class="link-arrow-1 arrow-right fs-b1">BACK TO HOMEPAGE <?php get_template_part('inc/template-parts/arrow-1'); ?>
        </a>
      </div>
      <div class="page404__media">
        <?php if ($case_study_featured_video) { ?>
          <div class="embed-container vimeo-player-custom-controls">
            <!-- <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>"></a> -->
            <?php echo get_plain_video($case_study_featured_video); ?>
          </div>
        <?php } elseif ($case_study_featured_image) { ?>
          <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>">
            <picture>
              <?php echo $case_study_featured_image; ?>
            </picture>
          </a>
        <?php } ?>
        <div class="page404__media-bg"></div>
      </div>
      <div class="page404__link">
        <a href="<?php echo esc_url(get_the_permalink($case_study_id)); ?>" class="link-arrow-1 arrow-right fs-b1">GO TO PROJECT CASE STUDY <?php get_template_part('inc/template-parts/arrow-1'); ?>
        </a>

      </div>

    </div>
  </div>
</section>
<?php wp_footer();
