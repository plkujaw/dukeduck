<?php

/*
Template name: Contact Page
*/

get_header();

$title = get_field('contact_title');
$subtitle = get_field('contact_subtitle');
$contact_graphic_element = get_field('contact_graphic_element');

$contact_graphic_element_transformation = get_field('contact_graphic_element_transformation');

$contact_flip_vertical = $contact_graphic_element_transformation['flip_vertical'];
$contact_flip_horizontal = $contact_graphic_element_transformation['flip_horizontal'];
$contact_rotate = $contact_graphic_element_transformation['rotate'];

$newsletter_title = get_field('block_newsletter_title', 'option');
$newsletter_subtitle = get_field('block_newsletter_subtitle', 'option');
$newsletter_graphic_element = get_field('block_newsletter_graphic_element', 'option');

$newsletter_graphic_element_transformation = get_field('block_newsletter_graphic_element_transformation', 'option');

$newsletter_flip_vertical = $newsletter_graphic_element_transformation['flip_vertical'];
$newsletter_flip_horizontal = $newsletter_graphic_element_transformation['flip_horizontal'];
$newsletter_rotate = $newsletter_graphic_element_transformation['rotate'];

$contact_col_1 = get_field('contact_links')['contact_column_1'];
$contact_col_1_links = $contact_col_1['links'];
$contact_col_2 = get_field('contact_links')['contact_column_2'];
$contact_col_2_links = $contact_col_2['links'];
$contact_col_3 = get_field('contact_links')['contact_column_3'];
$contact_col_3_links = $contact_col_3['links'];

$social_title = get_field('contact_social_title');
$social_accounts = get_field('social_accounts', 'option');
$social_graphic_element = get_field('contact_social_graphic_element');

$social_graphic_element_transformation = get_field('social_graphic_element_transformation');

$social_flip_vertical = $social_graphic_element_transformation['flip_vertical'];
$social_flip_horizontal = $social_graphic_element_transformation['flip_horizontal'];
$social_rotate = $social_graphic_element_transformation['rotate'];

?>

<section class="contact-page__top">
  <div class="container">
    <h1 class='fs-h1'><?php echo $title; ?></h1>
    <h2 class='fs-h2'><?php echo $subtitle; ?></h2>
    <?php if ($contact_graphic_element) { ?>
      <div class="graphic-element graphic-element--animate animation-autoplay" data-name="<?php echo $contact_graphic_element; ?>" data-rotate="<?php echo $contact_rotate; ?>" data-flipx="<?php echo $contact_flip_horizontal; ?>" data-flipy="<?php echo $contact_flip_vertical; ?>">
      </div>
    <?php } ?>
  </div>
</section>

<section class="contact-page__main">
  <div class="container">
    <div class="contact-page__links">
      <div class="contact-page__link-wrapper">
        <h4 class="fs-h3"><?php echo $contact_col_1['title']; ?></h4>
        <?php foreach ($contact_col_1_links as $link) {
        ?>
          <a href="<?php echo esc_url(esc_url($link['link']['url'])) ?>" class="fs-b1" target="<?php echo ($link['link']['target']); ?>"><?php echo ($link['link']['title']); ?></a>
        <?php
        } ?>

      </div>
      <div class="contact-page__link-wrapper">
        <h4 class="fs-h3"><?php echo $contact_col_2['title']; ?></h4>
        <?php foreach ($contact_col_2_links as $link) {
        ?>
          <a href="<?php echo esc_url(esc_url($link['link']['url'])) ?>" class="fs-b1" target="<?php echo ($link['link']['target']); ?>"><?php echo ($link['link']['title']); ?></a>
        <?php
        } ?>
      </div>
      <div class="contact-page__link-wrapper">
        <h4 class="fs-h3"><?php echo $contact_col_3['title']; ?></h4>
        <?php foreach ($contact_col_3_links as $link) {
        ?>
          <a href="<?php echo esc_url(esc_url($link['link']['url'])) ?>" class="fs-b1" target="<?php echo ($link['link']['target']); ?>"><?php echo ($link['link']['title']); ?></a>
        <?php
        } ?>
      </div>
    </div>
  </div>
</section>

<section class="contact-page__social mt-3 mb-3">
  <div class="container">
    <h2 class="fs-h5"><?php echo $social_title; ?></h2>
    <!-- <?php if ($social_graphic_element) { ?>
      <div class="contact-page__social-graphic graphic-element graphic-element--animate" data-name="<?php echo $social_graphic_element; ?>" data-rotate="<?php echo $social_rotate; ?>" data-flipx="<?php echo $social_flip_horizontal; ?>" data-flipy="<?php echo $social_flip_vertical; ?>"></div>
    <?php } ?> -->
    <ul class="contact-page__social-icons">
      <?php foreach ($social_accounts as $account) {
      ?>
        <li>
          <a href="<?php echo esc_url($account['account_link']); ?>" target="_blank"><img class="contact-social-link" src="<?php echo esc_url($account['account_icon']) ?>"></a>
        </li>
      <?php } ?>
    </ul>
  </div>
</section>

<section class="block block-newsletter animation-rise-fade-in js-rise-fade-in mt-3 mb-3">
  <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
  <div class="container">
    <div class="newsletter__inner">
      <div class="newsletter__heading">
        <div class="newsletter__copy">
          <h2 class="fs-h3"><?php echo $newsletter_title; ?></h2>
          <p class="fs-p1"><?php echo $newsletter_subtitle; ?></p>
        </div>
        <div class="newsletter__graphic-element graphic-element graphic-element--animate" data-name="<?php echo $newsletter_graphic_element; ?>" data-rotate="<?php echo $newsletter_rotate; ?>" data-flipx="<?php echo $newsletter_flip_horizontal; ?>" data-flipy="<?php echo $newsletter_flip_vertical; ?>"></div>
      </div>
      <div class="newsletter__form">
        <script>
          hbspt.forms.create({
            region: "na1",
            portalId: "9409389",
            formId: "57ef4d90-c8b5-414b-b318-c9f4b1094f16"
          });
        </script>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>