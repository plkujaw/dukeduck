<?php

/**
 * Block Name: Budget Options
 *
 * This is the template that displays the Budget Options block.
 * 
 */

$title = get_field('block_budget_title');
$copy = get_field('block_budget_copy');
$graphic_element = get_field('block_budget_graphic_element');
$budget_options = get_field('block_budget_options');

$spacing_top = get_field('block_spacing')['margin_top'];
$spacing_bottom = get_field('block_spacing')['margin_bottom'];

$spacing = $spacing_top . ' ' . $spacing_bottom;
// Block preview
if (!empty($block['data']['_is_preview'])) {
   block_preview_image($block['name']);
} else { ?>

  <div class="block block-budget-options <?php echo $spacing; ?>">
    <div class="container">
      <div class="block-budget-options__wrapper">
        <article class="block-budget-options__heading">
          <h3 class="fs-h3 animation-rise-fade-in js-rise-fade-in"><?php echo $title; ?></h3>
          <p class="fs-p3 animation-rise-fade-in js-rise-fade-in"><?php echo $copy; ?></p>
        </article>
        <article class="block-budget-options__options animation-rise-fade-in js-rise-fade-in">
          <?php foreach ($budget_options as $option) {
            $name = $option['budget_option_name'];
            $description = $option['budget_option_description'];
            $cost = $option['budget_option_cost']; ?>
            <div class="budget-option animation-rise-fade-in js-rise-fade-in">
              <h4 class="fs-h6 budget-option__name"><?php echo $name; ?></h4>
              <div class="fs-p2 budget-option__description">
                <?php echo $description; ?>
              </div>
              <h5 class="fs-h6 budget-option__cost"><?php echo $cost; ?></h5>
            </div>
          <?php } ?>
        </article>
      </div>
    </div>
  </div>
<?php } ?>