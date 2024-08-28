  <?php
  /**
   * Block Name: Video Series
   *
   * This is the template that displays the Video Series block.
   */
  $title = get_field('block_video_series_title');
  $graphic_element = get_field('block_video_series_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $episodes_list_title = get_field('block_video_series_episodes_list_title');
  $episodes = get_field('block_video_series_episodes');
  $first_episode = $episodes[0];

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-video-series <?php echo $spacing; ?>">
      <script type="text/javascript">
        const episodes = <?php echo json_encode($episodes); ?>;
      </script>
      <div class="container">
        <div class="block-video-series__heading ">
          <h2 class="fs-h5 animation-rise-fade-in js-rise-fade-in"><?php echo $title; ?></h2>
          <?php if ($graphic_element) { ?>
            <div class="heading-image hidden-mobile graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
            </div>
          <?php } ?>
        </div>
        <div class="block-video-series__inner">
          <div class="block-video-series__current-episode js-current-episode animation-rise-fade-in js-rise-fade-in" data-episode="1">
            <div class="embed-container js-current-episode-video">
              <?php echo $first_episode['episode_video']; ?>
            </div>
            <article class="animation-rise-fade-in js-rise-fade-in">
              <span class='fs-p2 js-current-episode-number'><?php echo "1 / " . count($episodes) ?></span>
              <h3 class="fs-h6 js-current-episode-title"><?php echo $first_episode['episode_title']; ?></h3>
              <p class="fs-p3 js-current-episode-description"><?php echo $first_episode['episode_description']; ?></p>
            </article>
          </div>
          <div class="block-video-series__episodes">
            <h3 class="fs-h6 animation-rise-fade-in js-rise-fade-in"><?php echo $episodes_list_title ? $episodes_list_title : 'More Episodes'; ?></h3>
            <?php if ($graphic_element) { ?>
              <div class="heading-image visible-mobile graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
              </div>
            <?php } ?>
            <div class="episodes-wrapper">
              <ul class="block-video-series__episode-list">
                <?php foreach ($episodes as $index => $episode) {
                  $index = $index + 1; ?>
                  <li class="episode-list__episode animation-rise-fade-in js-rise-fade-in" data-current="<?php echo $index == 1 ? 'true' : 'false' ?>" tabindex="<?php echo $index; ?>">
                    <div class="episode-list__episode-wrapper">
                      <div class="episode-list__episode-cover">
                        <svg width="92" height="93" viewBox="0 0 92 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <circle cx="46" cy="46.9079" r="46" fill="#071134" />
                          <path class="video-play" d="M75.5479 46.5527L30.2194 72.7231L30.2194 20.3823L75.5479 46.5527Z" fill="white" />
                        </svg>
                        <?php echo wp_get_attachment_image($episode['episode_cover_image'], 'entry-small') ?>
                      </div>
                      <span class="fs-p3"><?php echo $index . " / " . count($episodes) ?></span>
                      <h4 class="fs-p3"><?php echo $episode['episode_title']; ?></h4>
                    </div>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>