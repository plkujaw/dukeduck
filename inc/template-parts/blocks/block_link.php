  <?php
  /**
   * Block Name: Link
   *
   * This is the template that displays the Link block.
   */

  $link = get_field('link_link');
  $background_colour = get_field('link_background_color');

  $options = '';

  if ($background_colour == 'grey') {
    $options .= ' bg-grey';
  }

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block block-link<?php echo $options; ?>">
      <div class="container animation-rise-fade-in js-rise-fade-in">
        <a href="<?php echo esc_url($link['url']); ?>" class="fs-b2" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32 15.7226H16.7696V0.5H15.2226V15.7226H0V17.2696H15.2226V32.5H16.7696V17.2696H32V15.7226Z" fill="#01928E" />
          </svg>
        </a>
      </div>
    </section>
  <?php } ?>