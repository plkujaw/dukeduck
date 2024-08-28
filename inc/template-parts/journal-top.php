<?php
$cats = get_categories();
?>

<div class="journal__top">
  <section class="journal__heading animation-rise-fade-in js-rise-fade-in">
    <h1 class="fs-h1">
      <?php if (is_tag()) {
        echo single_tag_title();
      } else {
        echo 'Journal';
      }
      ?>
    </h1>
    <?php display_cat_description();
    ?>
  </section>
  <?php if (!is_tag()) { ?>
    <section class="journal__categories animation-rise-fade-in js-rise-fade-in">
      <button class="btn visible-mobile js-filters-btn">FILTERS<svg width="15" height="19" viewBox="0 0 15 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M15 12.0568L14.1173 11.113L8.14582 16.6339L8.14582 -2.99606e-07L6.84768 -3.56349e-07L6.84768 16.6339L0.882734 11.113L-5.2702e-07 12.0568L7.49675 19L15 12.0568Z" fill="#071134" />
        </svg>
      </button>
      <div class="categories-wrapper js-categories-list"><?php cats_list($cats); ?></div>
    </section>
  <?php } ?>
</div>