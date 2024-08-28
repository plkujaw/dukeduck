<?php

/**
 * The template for displaying a Case Study
 *
 *
 */

get_header();

$next_project = get_field('case_study_next_project', get_the_id());


the_content();
if ($next_project) {
?>

  <section class="case-study__next-project">
    <div class="container">
      <div class="next-project__inner animation-rise-fade-in js-rise-fade-in">
        <div class="next-project__thumbnail"><?php echo get_the_post_thumbnail($next_project->ID, 'entry-small'); ?></div>
        <div class="next-project__meta">
          <a href="<?php echo esc_url(get_the_permalink($next_project)); ?>" class="link-arrow-1 arrow-right fs-b1">NEXT PROJECT<svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.6717 0.5L18.1317 1.91238L27.1395 11.4667H0V13.5437H27.1395L18.1317 23.0876L19.6717 24.5L31 12.5052L19.6717 0.5Z" fill="#01928E"></path>
            </svg></a>
          <p class="fs-h3"><?php echo $next_project->post_title; ?></p>
        </div>
      </div>
    </div>
  </section>
<?php
}
get_footer();
