<?php

/**
 * ------> loop.php
 */

// Categories
$post_cats = get_the_category();
$video = get_field('post_featured_video');
$video_autoplay = get_field('visual_play_video');
$featured = get_field('post_featured');
$graphic_element_1 = get_field('posts_archive_graphic_elements')['post_graphic_element_1'];

if (true) : ?>
  <div class="journal-post__wrapper">
    <article <?php post_class('block-journal-post__single animation-rise-fade-in js-rise-fade-in') ?>>
      <?php if ($featured) { ?>
        <?php get_template_part('inc/template-parts/badge-featured'); ?>
      <?php } ?>
      <div class="block-journal-post__media animation-rise-fade-in js-rise-fade-in">
        <a href="<?php echo esc_url(get_the_permalink($post)); ?>" data-category="<?php echo get_the_category()[0]->slug; ?>">
          <?php if ($video) { ?>
            <div class="embed-container vimeo-player-custom-controls <?php echo $video_autoplay == "autoplay" ? " video-autoplay" : '' ?>">
              <?php if ($video_autoplay != 'autoplay') { ?>
                <button class="video-ctrl js-video-ctrl">
                  <?php get_template_part('inc/template-parts/video-ctrl'); ?>
                </button>
              <?php } ?>
              <?php echo get_plain_video($video); ?>
            </div>
          <?php } else { ?>
            <picture>
              <?php echo wp_get_attachment_image(get_post_thumbnail_id($post->ID), 'entry', false, array(
                'data-full-size' =>  get_the_post_thumbnail_url($post->ID),
              )); ?>
            </picture>
          <?php } ?>
        </a>
      </div>
      <div class="block-journal-post__text animation-rise-fade-in js-rise-fade-in">
        <div class="block-journal-post__heading">
          <?php if ($post_cats) : ?>
            <span class="fs-h6 post-card__categories"><?php echo post_categories($post_cats); ?></span>
          <?php endif; ?>
          <h3 class="fs-h3"><?php echo get_the_title($post); ?></h3>
        </div>
        <div class="block-journal-post__copy">
          <?php if (get_the_excerpt($post)) { ?>
            <p class="fs-p3"><?php echo get_the_excerpt($post); ?></p>
          <?php } ?>
          <a href="<?php echo esc_url(get_the_permalink($post)); ?>" class="link-arrow-1 arrow-right fs-b1">READ MORE <?php get_template_part('inc/template-parts/arrow-1'); ?>
          </a>
        </div>
      </div>
    </article>
    <?php if ($graphic_element_1) { ?>
      <div class="graphic-element graphic-element--animate post-graphic-element-1" data-name="<?php echo $graphic_element_1; ?>"></div>
    <?php } ?>
  </div>
<?php endif; ?>