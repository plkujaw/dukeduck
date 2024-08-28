  <?php
  /**
   * Block Name: Text
   *
   * This is the template that displays the Text block.
   */

  $block_align = get_field('block_text_align');
  $title = get_field('block_text_title');
  $title_graphic_element = get_field('block_text_title_graphic_element');
  $title_graphic_element_position = get_field('block_text_title_graphic_element_position');

  if ($title_graphic_element == 'circle' && $title_graphic_element_position !== 'circled') {
    $title_graphic_element_position = 'circled';
  }


  $title_graphic_element_transformation = get_field('title_graphic_element_transformation');

  $title_flip_vertical = $title_graphic_element_transformation['flip_vertical'];
  $title_flip_horizontal = $title_graphic_element_transformation['flip_horizontal'];
  $title_rotate = $title_graphic_element_transformation['rotate'];
  $title_move_x =
    $title_graphic_element_transformation['move_x'];
  $title_move_y =
    $title_graphic_element_transformation['move_y'];


  $copy = get_field('block_text_copy');
  $copy_graphic_element = get_field('block_text_copy_graphic_element');

  $copy_graphic_element_transformation = get_field('copy_graphic_element_transformation');

  $copy_flip_vertical = $copy_graphic_element_transformation['flip_vertical'];
  $copy_flip_horizontal = $copy_graphic_element_transformation['flip_horizontal'];
  $copy_rotate = $copy_graphic_element_transformation['rotate'];
  $copy_move_x =
    $copy_graphic_element_transformation['move_x'];
  $copy_move_y =
    $copy_graphic_element_transformation['move_y'];

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>
    <section class="block block-text<?php echo ' ' . $spacing; ?>">
      <div class="container<?php echo $copy_graphic_element ? ' copy-graphic' : ''; ?>">
        <div class="block-text__inner <?php echo $block_align; ?>">
          <div class="block-text__title animation-rise-fade-in js-rise-fade-in<?php echo $title_graphic_element ? ' graphic-' . $title_graphic_element_position : ''; ?>">
            <?php if ($title) { ?>
              <h2 class="fs-h3"><?php echo $title; ?>
                  <?php if ($title_graphic_element && $title_graphic_element != 'circle') { ?><span class="graphic-element graphic-element--animate" data-name="<?php echo $title_graphic_element; ?>" data-rotate="<?php echo $title_rotate; ?>" data-flipx="<?php echo $title_flip_horizontal; ?>" data-flipy="<?php echo $title_flip_vertical; ?>" data-movex="<?php echo $title_move_x; ?>" data-movey="<?php echo $title_move_y; ?>"></span>
                  <?php } elseif ($title_graphic_element && $title_graphic_element == 'circle') { ?>
                    <span class="graphic-circle js-animate-draw-scroll"><svg xmlns="http://www.w3.org/2000/svg" width="564" height="108" viewBox="0 0 564 108" fill="none" preserveAspectRatio="none">
                        <path d="M80.4198 26.94C193.28 2.87003 331.04 -11.75 467.97 15.32C496.95 21.05 526.31 29.02 550.97 46.97C556.39 50.91 562 56.19 562.53 63.33C563.38 74.61 551.73 81.34 541.93 84.41C506.38 95.56 469.27 99.31 432.35 101.89C340.51 108.31 248.29 107.81 156.32 102.35C113.35 99.8 69.9598 96.07 28.8298 81.75C15.1398 76.99 -0.910181 66.49 0.889819 50.76C2.36982 37.79 15.2598 31.01 26.5098 27.15C65.5098 13.73 102.3 9.30003 147.45 8.27003" stroke="#00C7C2" stroke-width="1.5" stroke-miterlimit="10" />
                      </svg></span>
                  <?php } ?>
              <?php } ?>
              </h2>
          </div>
          <article class="block-text__copy animation-rise-fade-in js-rise-fade-in">
            <?php echo "<div class='block-text__copy-text fs-p2'>" . $copy . "</div>"; ?>
            <?php if ($copy_graphic_element) { ?><div class="block-text__copy-graphic graphic-element graphic-element--animate" data-name="<?php echo $copy_graphic_element; ?>" data-rotate="<?php echo $copy_rotate; ?>" data-flipx="<?php echo $copy_flip_horizontal; ?>" data-flipy="<?php echo $copy_flip_vertical; ?>" data-movex="<?php echo $copy_move_x; ?>" data-movey="<?php echo $copy_move_y; ?>"></div>
            <?php } ?>
          </article>
        </div>
      </div>
    </section>
  <?php } ?>