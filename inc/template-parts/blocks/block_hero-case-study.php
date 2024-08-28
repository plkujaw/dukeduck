  <?php
  /**
   * Block Name: Hero Case Study
   *
   * This is the template that displays the Hero Case Study block.
   */

  $id = get_the_ID();
  $client = get_field('case_study_client', $id);
  $featured_image = get_the_post_thumbnail($id, 'hero');
  $featured_video = get_field('case_study_featured_video', $id);
  $description = get_field('case_study_description',  $id);
  $case_study_title = get_the_title($id);

  $title_acf = get_field('hero_case_study_title');
  $subtitle_acf = get_field('hero_case_study_subtitle');
  $copy_acf = get_field('hero_case_study_copy');
  $image_acf = wp_get_attachment_image(get_field('hero_case_study_image'), 'hero');
  $video_acf = get_field('hero_case_study_video');

  $read_more = get_field('hero_case_study_read_more_text');

  $use_media = get_field('hero_case_study_media');
  $featured_media = get_field('hero_case_study_featured_media');
  $custom_media = get_field('hero_case_study_custom_media');

  $title = $title_acf ? $title_acf : $client;
  $subtitle = $subtitle_acf ? $subtitle_acf : $case_study_title;
  $copy = $copy_acf ? $copy_acf : $description;

  if ($use_media == 'featured' && $featured_media == 'image') {
    $image = $featured_image;
  } elseif ($use_media == 'custom' && $custom_media == 'image') {
    $image = $image_acf;
  }

  if ($use_media == 'featured' && $featured_media == 'video') {
    $video = $featured_video;
  } elseif ($use_media == 'custom' && $custom_media == 'video') {
    $video = $video_acf;
  }

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>


    <section class="block hero-case_study block-hero-case_study">
      <div class="container">
        <div class="block-hero-case_study__media animation-rise-fade-in js-rise-fade-in">
          <?php if ($video) { ?>
            <div class="block-hero-case_study__video">
              <div class="embed-container">
                <?php echo $video; ?>
              </div>
            </div>
          <?php }
          if ($image) { ?>
            <div class="block-hero-case_study__img">
              <picture>
                <?php echo $image; ?>
              </picture>
            </div>
          <?php } ?>
        </div>
        <div class="block-hero-case_study__text animation-rise-fade-in js-rise-fade-in">
          <div class="block-hero-case_study__text-col-1 animation-rise-fade-in js-rise-fade-in">
            <h2 class="fs-h6"><?php echo $title; ?></h2>
          </div>
          <div class="block-hero-case_study__text-col-2 animation-rise-fade-in js-rise-fade-in">
            <h1 class="fs-h3"><?php echo $subtitle; ?></h1>
            <p class="fs-p2"><?php echo $copy; ?></p>
            <?php if ($read_more) { ?>
              <div class="block-hero-case_study__read-more">
                <p class="fs-p2"><?php echo $read_more; ?></p>
                <button class="btn fs-p2 read-more-btn" type="button">Read More +</button>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>