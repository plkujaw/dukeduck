  <?php
  /**
   * Block Name: Team Members
   *
   * This is the template that displays the Team Members block.
   */


  $title = get_field('block_team_members_title');
  $graphic_element = get_field('block_team_members_graphic_element');

  $graphic_element_transformation = get_field('graphic_element_transformation');

  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $team_members = get_field('block_team_members_items');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;
  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>

    <section class="block team-members block-team-members bg-grey<?php echo ' ' . $spacing; ?>">
      <div class="container">
        <div class="team-members__heading animation-rise-fade-in js-rise-fade-in">
          <h2 class="fs-h5"><?php echo $title; ?>
            <span class="info"><em>Tap on each photo to flip the card!</em></span>
            <?php if ($graphic_element) { ?>
              <span class="graphic-element graphic-element--animate" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>"></span>
            <?php } ?>
          </h2>

        </div>
        <div class="team-members__wrapper">
          <?php foreach ($team_members as $member) {
            $photo = $member['team_member_photo'];
            $name = $member['team_member_name'];
            $more_info = $member['team_member_more_info'];
            $panel_animation = $member['team_member_panel_animation'];
          ?>
            <div class="team-member animation-rise-fade-in js-rise-fade-in">
              <div class="card-front">
                <div class="team-member__inner">
                  <div class="team-member__info">
                    <?php foreach ($more_info as $item) {
                      $info = $item['team_member_more_info_item'];
                      echo "<span class='fs-p4 info-entry'>$info</span>";
                    } ?>
                  </div>
                  <div class="team-member__picture">
                    <div class="image-frame" data-name="<?php echo $panel_animation ?>">
                    </div>
                    <?php echo wp_get_attachment_image($photo, 'entry-small') ?>
                  </div>
                  <div class="team-member__name">
                    <h4 class="fs-h6"><?php echo $name; ?></h4>
                  </div>
                </div>
              </div>
              <div class="card-back">
                <div class="team-member__inner">
                  <div class="team-member__info">
                    <?php foreach ($more_info as $item) {
                      $info = $item['team_member_more_info_item'];
                      echo "<span class='fs-p4 info-entry'>$info</span>";
                    } ?>
                  </div>
                  <div class="team-member__picture">
                    <div class="image-frame" data-name="<?php echo $panel_animation ?>">
                    </div>
                    <?php echo wp_get_attachment_image($photo, 'entry-small') ?>
                  </div>
                  <div class="team-member__name">
                    <h4 class="fs-h6"><?php echo $name; ?></h4>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>