  <?php
  /**
   * Block Name: Instagram Feed
   *
   * This is the template that displays the Instagram Feed block.
   */

  $title = get_field('insta_feed_title', 'option');
  $posts = get_field('insta_feed_post', 'option');
  $link = get_field('insta_feed_link', 'option');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-instagram-feed <?php echo $spacing; ?>">
      <div class="container">
        <div class="swiper content-slider">
          <div class="content-slider__heading animation-rise-fade-in js-rise-fade-in">
            <h2 class="fs-h5"><?php echo $title; ?></h2>
            <div class="content-slider-scrollbar"></div>
          </div>
          <div class="swiper-wrapper mousewheel">
            <?php foreach ($posts as $post) {
              $image = $post['insta_feed_post_thumbnail'];
              $url = $post['insta_feed_post_url'];
            ?>
              <a href="<?php echo esc_url($url); ?>" class="swiper-slide content-slider__post" target="_blank">
                <picture class="content-slider__img animation-rise-fade-in js-rise-fade-in">
                  <?php echo wp_get_attachment_image($image, 'entry'); ?>
                </picture>
              </a>
            <?php } ?>
          </div>
          <div class="content-slider__bottom animation-rise-fade-in js-rise-fade-in">
            <!-- <div class="content-slider-nav">
              <button class="content-slider-button-prev arrow-left"><svg width="44" height="33" viewBox="0 0 44 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.0789 33L18.2647 31.058L5.47941 17.9208L44 17.9208L44 15.0649L5.47941 15.0649L18.2647 1.94202L16.0789 2.44094e-06L-1.4431e-06 16.4929L16.0789 33Z" fill="#071134" />
                </svg>
              </button>
              <button class="content-slider-button-next arrow-right"><svg width="44" height="33" viewBox="0 0 44 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M27.9211 0L25.7353 1.94202L38.5206 15.0792L0 15.0792L0 17.9351L38.5206 17.9351L25.7353 31.058L27.9211 33L44 16.5071L27.9211 0Z" fill="#071134" />
                </svg>
              </button>
            </div> -->
            <?php if ($link) { ?>
              <div class="content-slider-more">
                <a href="<?php echo esc_url($link['url']); ?>" class="link-arrow-1 arrow-right fs-b1" target="<?php echo esc_attr($link['target']); ?>"><?php echo $link['title']; ?> <?php get_template_part('inc/template-parts/arrow-1'); ?></a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>