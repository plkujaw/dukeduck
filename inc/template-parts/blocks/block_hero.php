  <?php
  /**
   * Block Name: Hero
   *
   * This is the template that displays the Hero block.
   */

  $title = get_field('hero_title');
  $slides = get_field('hero_slides');




  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block hero block-hero animation-rise-fade-in js-rise-fade-in">
      <div class="container">
        <h1 class="fs-h1"><?php echo $title; ?></h1>
        <div class="swiper hero__slider">
          <div class="swiper-wrapper">
            <?php foreach ($slides as $slide) {
              $media_type = $slide['hero_slide_media_type'];
              $graphic_element_transformation = $slide['graphic_element_transformation'];
              $flip_vertical = $graphic_element_transformation['flip_vertical'];
              $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
              $rotate = $graphic_element_transformation['rotate'];

            ?>
              <div class="swiper-slide hero__slide">
                <div class="hero__subtitle">
                  <h2 class="fs-h2"><?php echo ($slide['hero_slide_subtitle']); ?></h2>
                  <?php if ($slide['hero_slide_graphic_element']) { ?>
                    <div class="graphic-element graphic-element--animate hero__graphic" data-name="<?php echo $slide['hero_slide_graphic_element']; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>""></div>
                  <?php } ?>
                </div>
                <?php if ($media_type === 'image') {
                  $image = $slide['hero_slide_image'];
                ?>
                  <div class=" hero__media">
                      <picture class="hero__img">
                        <a href="<?php echo esc_url(($slide['hero_slide_link']['url'])); ?>">
                          <?php echo wp_get_attachment_image($image, 'hero'); ?>
                        </a>
                      </picture>
                    </div>
                  <?php } else {
                  $video = $slide['hero_slide_video_embed'];
                  ?>
                    <div class="hero__media">
                      <div class="hero__video vimeo-player-custom-controls video-autoplay embed-container">
                        <a href="<?php echo esc_url(($slide['hero_slide_link']['url'])); ?>">
                          <?php echo get_plain_video($video); ?>
                        </a>
                      </div>
                    </div>
                  <?php } ?>
                  <?php if ($slide['hero_slide_link']) { ?>
                    <a href="<?php echo esc_url(($slide['hero_slide_link']['url'])); ?>" class="fs-h6 " target="<?php echo $slide['hero_slide_link']['target'] ?>"><?php echo $slide['hero_slide_link']['title'] ?><svg width=" 13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6275 12.1874L1.27312 0.845703L0 2.12024L10.1449 12.2538L0.507648 21.8798L1.78074 23.1544L12.6276 12.3202L12.5612 12.2537L12.6275 12.1874Z" fill="#01928E" />
                      </svg>
                    </a>
                  <?php } ?>

                  <?php if ($slide['hero_slide_caption']) { ?>
                    <p class="fs-p2"><?php echo ($slide['hero_slide_caption']); ?>
                    </p>
                  <?php } ?>
                </div>
              <?php } ?>
              </div>
              <span class="swiper-pagination hero__pagination"></span>
          </div>
        </div>
    </section>
  <?php } ?>