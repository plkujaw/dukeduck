<?php

/*
Template name: Privacy Policy Page
*/

get_header();
$sections = get_field('privacy_policy_sections');
$graphic_element = get_field('privacy_policy_graphic_element')
?>

<div class="container">
  <div class="main-wrapper">
    <div class="sections-wrapper">
      <?php
      $count = 0;
      foreach ($sections as $section) { ?>
        <section class="content-section">
          <h3 class="fs-h3 section-title js-section-title" data-id="<?php echo $count; ?>"><?php echo $section['section_title'] ?><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.3515 9.73594V0H9.73608V9.73594L0 9.73594V11.3513L9.73608 11.3513V21H11.3515V11.3513H21V9.73593L11.3515 9.73594Z" fill="#5E5E5E" />
            </svg>
          </h3>
          <article class="fs-p3 section-copy js-section-copy visible-mobile wysiwyg">
            <?php echo $section['section_copy'] ?>
          </article>
        </section>
      <?php
        $count += 1;
      } ?>
      <div class="section-graphic-element">
        <?php echo wp_get_attachment_image($graphic_element, 'entry-small') ?>
      </div>
    </div>
    <div class="section-copy-wrapper hidden-mobile">
      <?php
      $count = 0;
      foreach ($sections as $section) { ?>
        <article class="section-copy js-section-copy-desktop" data-id="<?php echo $count; ?>">
          <h2 class="fs-h5 section-title">
            <?php echo $section['section_title'] ?>
          </h2>
          <div class="section-text fs-p3 wysiwyg">
            <?php echo $section['section_copy'] ?>
          </div>
        </article>
      <?php $count += 1;
      }
      ?>
    </div>
  </div>
</div>
<?php get_footer();
