<?php

get_header();

$categories = get_the_category();
$hero_image = get_field('post_hero_image');
$graphic_element = get_field('post_graphic_element');

$graphic_element_transformation = get_field('post_graphic_element_transformation');

$flip_vertical = $graphic_element_transformation['flip_vertical'];
$flip_horizontal = $graphic_element_transformation['flip_horizontal'];
$rotate = $graphic_element_transformation['rotate'];

$aside_copy = get_field('post_aside_copy');
$tags = get_the_tag_list();

$related = new WP_Query(
  array(
    'category__in'   => wp_get_post_categories($post->ID),
    'posts_per_page' => 5,
    'post__not_in'   => array($post->ID)
  )
);
?>

<section class="post">
  <div class="container">
    <div class="post__top animation-rise-fade-in js-rise-fade-in">
      <a href="<?php echo site_url('/journal/'); ?>" class="fs-b1 arrow-left"><svg width="31" height="24" viewBox="0 0 31 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11.3283 24L12.8683 22.5876L3.8605 13.0333L31 13.0333L31 10.9563L3.8605 10.9563L12.8683 1.41238L11.3283 3.6271e-06L-2.95688e-06 11.9948L11.3283 24Z" fill="#01928E" />
        </svg>BACK</a>
      <div class="post__heading">
        <h3 class='fs-p1'>
          <?php foreach ($categories as $category) echo "<a href='" . get_category_link($category->term_id) . "'><span class='post-category'>$category->name</span></a>";
          ?>
        </h3>
        <h1 class="fs-h5"><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="post__banner animation-rise-fade-in js-rise-fade-in">
      <?php echo wp_get_attachment_image($hero_image, 'hero'); ?>
    </div>
    <div class="container post-wrapper">
      <div class="post__content-wrapper">
        <div class="post__content-col-1 animation-rise-fade-in js-rise-fade-in">
          <div class="content-col-1__wrapper">
            <article class="post__aside">
              <div class="post__aside-copy">
                <?php echo $aside_copy; ?>
              </div>
              <div class="post-tags">
                <?php echo $tags; ?>
              </div>
            </article>
          </div>
        </div>
        <div class="post__content-col-2 animation-rise-fade-in js-rise-fade-in">
          <?php the_content(); ?>
        </div>
        <?php if ($graphic_element) { ?>
          <div class="post__content-col-3">
            <div class="graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>"></div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>

<?php if ($related->have_posts()) {
?>
  <section class="related-content">
    <div class="container">
      <div class="related-content__inner">
        <div class="swiper content-slider">
          <div class="content-slider__heading animation-rise-fade-in js-rise-fade-in">
            <h2 class="fs-h5">Related Articles</h2>
            <div class="content-slider-scrollbar"></div>
          </div>
          <div class="swiper-wrapper mousewheel">
            <?php
            while ($related->have_posts()) {
              $related->the_post();
            ?>
              <a href="<?php the_permalink(); ?>" class="swiper-slide content-slider__post" target="_blank">
                <picture class="content-slider__img animation-rise-fade-in js-rise-fade-in">
                  <?php the_post_thumbnail('entry'); ?>
                </picture>
                <h4 class="fs-h6"><?php the_title(); ?></h4>
                <p class="fs-p3"><?php echo get_the_excerpt(); ?></p>
              </a>
          <?php
            }
            wp_reset_postdata();
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  get_footer(); ?>