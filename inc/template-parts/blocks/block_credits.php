  <?php
  /**
   * Block Name: Credits
   *
   * This is the template that displays the Credits block.
   */
  $title = get_field('block_credits_title');
  $credits = get_field('block_credits_items');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <div class="block block-credits <?php echo $spacing; ?>">
      <div class="container">
        <div class="block-credits__wrapper">
          <h2 class="fs-h3 animation-rise-fade-in js-rise-fade-in"><?php echo $title; ?></h2>
          <div class="block-credits__inner">
            <?php foreach ($credits as $credit_item) {
              $credit = $credit_item['credit'];
              $recipient = $credit_item['credit_recipient'];
              echo "<p class='fs-p4 animation-rise-fade-in js-rise-fade-in'><strong>$credit</strong> $recipient</p>";
            }
            ?>
            <?php if (count($credits) > 6) { ?>
              <button class="fs-b1 block-credits__show-more js-credits-show-more animation-rise-fade-in js-rise-fade-in" type="button">SEE ALL CREDITS<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19 9.03843H9.95697V0H9.03843V9.03843H0V9.95697H9.03843V19H9.95697V9.95697H19V9.03843Z" fill="#01928E" />
                </svg>
              </button>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>