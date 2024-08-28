  <?php
  /**
   * Block Name: Testimonials
   *
   * This is the template that displays the Testimonials block.
   */

  $testimonials = get_field('block_testimonials');
  $carousel = count($testimonials) > 1;

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-testimonials <?php echo $spacing; ?>">
      <div class="container">
        <div class="block-testimonials__wrapper animation-rise-fade-in js-rise-fade-in">
          <?php if ($carousel) {
          ?>
            <div class="block-testimonials__navigation">
              <button class="testimonials-prev arrow-left"><svg width="44" height="33" viewBox="0 0 44 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.0789 33L18.2647 31.058L5.47941 17.9208L44 17.9208L44 15.0649L5.47941 15.0649L18.2647 1.94202L16.0789 2.44094e-06L-1.4431e-06 16.4929L16.0789 33Z" fill="#01928E" />
                </svg></button>
              <button class="testimonials-next arrow-right"><svg width="44" height="33" viewBox="0 0 44 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M27.9211 0L25.7353 1.94202L38.5206 15.0792L0 15.0792L0 17.9351L38.5206 17.9351L25.7353 31.058L27.9211 33L44 16.5071L27.9211 0Z" fill="#01928E" />
                </svg></button>
            </div>
          <?php echo "<div class='swiper'>";
          }
          ?>
          <div class="block-testimonials__inner<?php echo $carousel ? ' swiper-wrapper' : ''; ?>">
            <?php foreach ($testimonials as $testimonial) {
              $title = $testimonial['testimonial_title'];
              $copy = $testimonial['testimonial_copy'];
              $caption = $testimonial['testimonial_caption'];
            ?>
              <div class="block-testimonials__main<?php echo $carousel ? ' swiper-slide' : ''; ?>">
                <?php echo $title ? "<h3 class='testimonial-title fs-h3'>" . $title . "</h3>" : ''; ?>
                <blockquote>
                  <p class="testimonial-copy fs-p1"><?php echo $copy; ?></p>
                </blockquote>
                <?php echo $caption ? "<p class='testimonial-caption fs-h6'>" . $caption . "</p>" : ''; ?>
              </div>
            <?php } ?>
          </div>
          <?php if ($carousel) echo "</div>"; ?>
        </div>
      </div>
    </section>
  <?php } ?>