  <?php
  /**
   * Block Name: Journal Post
   *
   * This is the template that displays the Journal Post block.
   */

  $post = get_field('journal_post_block_post');
  $posts = get_field('journal_post_block_posts');
  $layout_reverse = get_field('journal_post_block_layout_reverse');
  $video = get_field('post_featured_video', $post);
  $video_play = get_field('play_video');

  $badge = get_field('journal_post_badge');

  $graphic_element_1 = get_field('posts_archive_graphic_elements', $post)['post_graphic_element_1'];

  $graphic_element_transformation = get_field('graphic_element1_transformation');

  $graphic1_flip_vertical = $graphic_element_transformation['flip_vertical'];
  $graphic1_flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $graphic1_rotate = $graphic_element_transformation['rotate'];

  $layout_type = get_field('journal_post_block_layout');
  $columns_ratio = get_field('journal_post_block_column_ratio');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;
  $options = 'block-journal-post__inner animation-rise-fade-in js-rise-fade-in';

  if ($layout_reverse == 1) {
    $options .= ' block-journal-post--reverse';
  }

  if ($layout_type == 'two-col') {
    $options .= ' block-journal-post--two-col';
  }

  if ($columns_ratio == 'offset') {
    $options .= ' col-offset';
  }


  // Categories
  $post_cats = get_the_category($post->ID);

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else if ($post or $posts) { ?>

    <section class="block journal-post block-journal-post<?php echo ' ' . $spacing ?>">
      <div class="container">
        <div <?php post_class($options, $post->ID); ?>>
          <?php if ($badge == 'featured') get_template_part('inc/template-parts/badge-featured');
          ?>
          <?php if ($badge == 'custom') {
            $badge_text = get_field('journal_post_block_custom_badge_text');
            $args = array(
              'badge_text' => $badge_text,
            );
            get_template_part('inc/template-parts/badge-custom', null, $args);
          } ?>

          <?php if ($layout_type == 'two-col') {
            foreach ($posts as $post) {
              $item_index = 'item-' . array_search($post, $posts);
              $badge = $post['badge'];
              $badge_text = $post['badge_text'];
              $video_autoplay = $post['visual_play_video'];
              $post = $post['journal_post_block_posts_post'];
              $post_cats = get_the_category($post->ID);
              $video = get_field('post_featured_video', $post->ID);
              $graphic_element_1 = get_field('posts_archive_graphic_elements', $post->ID)['post_graphic_element_1'];
              $graphic_element_transformation = get_field('posts_archive_graphic_elements', $post->ID)['graphic_element1_transformation'];
              $graphic1_flip_vertical = $graphic_element_transformation['flip_vertical'];
              $graphic1_flip_horizontal = $graphic_element_transformation['flip_horizontal'];
              $graphic1_rotate = $graphic_element_transformation['rotate'];
          ?>
              <?php if ($post) { ?>
                <div class="block-journal-post__single-wrapper <?php echo $item_index ?>">
                  <article <?php post_class("block-journal-post__single animation-rise-fade-in js-rise-fade-in", $post->ID) ?>>
                    <?php if ($badge == 'featured') get_template_part('inc/template-parts/badge-featured');
                    ?>
                    <?php if ($badge == 'custom') {
                      $args = array(
                        'badge_text' => $badge_text,
                      );
                      get_template_part('inc/template-parts/badge-custom', null, $args);
                    } ?>
                    <div class="block-journal-post__media animation-rise-fade-in js-rise-fade-in">
                      <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" data-category="<?php echo get_the_category($post->ID)[0]->slug; ?>">
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
                    <div class="block-journal-post__text">
                      <div class="block-journal-post__heading animation-rise-fade-in js-rise-fade-in">
                        <?php if ($post_cats) : ?>
                          <span class="fs-h6 post-card__categories"><?php echo post_categories($post_cats); ?></span>
                        <?php endif; ?>
                        <h3 class="fs-h3"><?php echo get_the_title($post->ID); ?></h3>
                      </div>
                      <div class="block-journal-post__copy animation-rise-fade-in js-rise-fade-in">
                        <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="link-arrow-1 arrow-right fs-b1">READ MORE <?php get_template_part('inc/template-parts/arrow-1'); ?>
                        </a>
                      </div>
                    </div>
                  </article>
                  <?php if ($graphic_element_1) { ?>
                    <div class="graphic-element graphic-element--animate post-graphic-element-1" data-name="<?php echo $graphic_element_1; ?>" data-rotate="<?php echo $graphic1_rotate; ?>" data-flipx="<?php echo $graphic1_flip_horizontal; ?>" data-flipy="<?php echo $graphic1_flip_vertical; ?>"></div>
                  <?php } ?>
                </div>
              <?php } ?>
            <?php }
          } else { ?>
            <div class="block-journal-post__media animation-rise-fade-in js-rise-fade-in">
              <a href="<?php echo esc_url(get_the_permalink($post)); ?>" data-category="<?php echo get_the_category($post)[0]->slug; ?>">
                <?php if ($video) { ?>
                  <div class="embed-container vimeo-player-custom-controls <?php echo $video_play == "autoplay" ? " video-autoplay" : '' ?>">
                    <?php if ($video_play != 'autoplay') { ?>
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
            <div class="block-journal-post__text">
              <div class="block-journal-post__heading animation-rise-fade-in js-rise-fade-in">
                <?php if ($post_cats) : ?>
                  <span class="fs-h6 post-card__categories"><?php echo post_categories($post_cats); ?></span>
                <?php endif; ?>
                <h3 class="fs-h3"><?php echo get_the_title($post); ?></h3>
              </div>
              <div class="block-journal-post__copy animation-rise-fade-in js-rise-fade-in">
                <?php if (get_the_excerpt($post)) { ?>
                  <p class="fs-p3"><?php echo get_the_excerpt($post); ?></p>
                <?php } ?>
                <a href="<?php echo esc_url(get_the_permalink($post)); ?>" class="link-arrow-1 arrow-right fs-b1">READ MORE <?php get_template_part('inc/template-parts/arrow-1'); ?>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>