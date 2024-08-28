  <?php
  /**
   * Block Name: Media
   *
   * This is the template that displays the Media block.
   */

  $media_layout = get_field('block_media_layout');

  $graphic_element = get_field('block_media_graphic_element');
  $graphic_element_transformation = get_field('block_media_graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $single_media_position = get_field('block_media_single_position');
  $single_media_align = $single_media_position['block_media_single_align'];
  $single_media_offset = $single_media_position['block_media_single_offset'];
  $single_media_type = get_field('block_media_single_type');
  $single_image = get_field('block_media_single_image');

  $single_image_caption = wp_get_attachment_caption($single_image);

  $single_video = get_field('block_media_single_video');
  $single_video_playback = get_field('block_media_single_video_playback');

  $grid_items = get_field('block_media_repater');
  $grid_reverse = get_field('block_media_grid_reverse');
  $grid_even = get_field('block_media_grid_even');

  $carousel_media_type = get_field('block_media_carousel_media_type');
  $carousel_images = get_field('block_media_carousel_images');
  $carousel_videos = get_field('block_media_carousel_videos');

  $carousel_align = get_field('block_media_carousel_align');

  $options = '';

  switch ($media_layout) {
    case 'grid':
      $options .= ' block-media--grid';
      break;

    case 'carousel':
      $options .= ' block-media--carousel';
      break;

    default:
      $options .= ' block-media--single';
      break;
  }

  switch ($single_media_align) {
    case 'align-left':
      $options .= ' align-left';
      break;
    case 'align-right':
      $options .= ' align-right';
      break;
  }

  $single_media_offset ? $options .= ' align-offset' : '';

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else {  ?>

    <section class="block block-media<?php echo $options . ' ' . $spacing; ?>">
      <div class="container">
        <?php if ($media_layout == 'single') { ?>
          <div class="block-media__single-media-wrapper animation-rise-fade-in js-rise-fade-in">
            <?php if ($single_media_type == 'image') { ?>
              <figure>
                <?php echo wp_get_attachment_image($single_image, 'hero'); ?>
              </figure>
              <?php if ($single_image_caption) { ?>
                <figcaption><?php echo $single_image_caption; ?></figcaption>
              <?php } ?>
            <?php } else if ($single_media_type == 'video') { ?>
              <?php if ($single_video_playback == 'player') { ?>
                <div class="video-wrapper">
                  <div class="embed-container vimeo-player">
                    <?php echo $single_video; ?>
                  </div>
                </div>
              <?php } else { ?>
                <div class="video-wrapper">
                  <div class="embed-container vimeo-player-custom-controls video-autoplay">
                    <?php echo get_plain_video($single_video); ?>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
            <?php if ($graphic_element) { ?>
              <div class="graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>"></div>
            <?php } ?>
          </div>

        <?php } else if ($media_layout == 'grid') {
        ?>
          <div class="block-media__grid-wrapper<?php
                                                echo $grid_reverse ? ' block-media__grid-wrapper--reverse' : '';
                                                echo $grid_even ? ' block-media__grid-wrapper--even' : '' ?>">
            <?php foreach ($grid_items as $item) {
              $media_type = $item['media_type'];
              $image = $item['image'];
              $image_caption = wp_get_attachment_caption($image);
              $video = $item['video'];
              $media_position = $item['media_position'];
              $align = $media_position['align'];
              $offset = $media_position['offset'];
              $video_ratio = $item['video_aspect_ratio'];
              $video_playback = $item['video_playback'];
            ?>
              <div class="block-media__grid-inner animation-rise-fade-in js-rise-fade-in<?php echo $align ? " align-$align" : '';
                                                                                        echo $offset ? ' align-bottom--offset' : '' ?>">
                <?php if ($media_type == 'image') {
                ?>

                  <figure>
                    <?php echo wp_get_attachment_image($image, 'entry'); ?>
                    <?php if ($image_caption) { ?>
                      <figcaption><?php echo $image_caption; ?></figcaption>
                    <?php } ?>
                  </figure>

                <?php } else if ($media_type == 'video') {
                ?>
                  <?php if ($video_playback == 'player') { ?>
                    <div class="embed-container vimeo-player <?php echo $video_ratio; ?>">
                      <?php echo $video; ?>
                    </div>
                  <?php } else { ?>
                    <div class="embed-container vimeo-player-custom-controls video-autoplay <?php echo $video_ratio; ?>">
                      <?php echo get_plain_video($video); ?>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            <?php } ?>

          </div>
        <?php
        } else if ($media_layout == 'carousel') { ?>
          <div class="block-media__carousel-wrapper swiper <?php echo $carousel_align ?> animation-rise-fade-in js-rise-fade-in">
            <div class="block-media__carousel-inner swiper-wrapper">
              <?php if ($carousel_media_type == 'image') { ?>
                <?php foreach ($carousel_images as $image) { ?>
                  <picture class="swiper-slide">
                    <?php echo wp_get_attachment_image($image, 'hero'); ?>
                  </picture>
                <?php } ?>
              <?php } else { ?>
                <?php foreach ($carousel_videos as $video) { ?>
                  <div class="swiper-slide">
                    <div class="embed-container vimeo-player">
                      <?php echo $video['video']; ?>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            </div>
            <?php if (
              !wp_is_mobile()
              && $carousel_media_type != 'video'
            ) { ?>
              <div class="swiper-navigation block-media__navigation">
                <button class="block-media-button-prev">
                </button>
                <button class="block-media-button-next">
                </button>
              </div>
            <?php } ?>
            <div class="swiper-pagination block-media__pagination"></div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php } ?>