  <?php
  /**
   * Block Name: Audio
   *
   * This is the template that displays the Audio block.
   */

  $graphic_element = get_field('block_audio_graphic_element');
  $graphic_element_transformation = get_field('graphic_element_transformation');
  
  $flip_vertical = $graphic_element_transformation['flip_vertical'];
  $flip_horizontal = $graphic_element_transformation['flip_horizontal'];
  $rotate = $graphic_element_transformation['rotate'];

  $audio_items = get_field('block_audio_item');

  $spacing_top = get_field('block_spacing')['margin_top'];
  $spacing_bottom = get_field('block_spacing')['margin_bottom'];

  $spacing = $spacing_top . ' ' . $spacing_bottom;

  // Block preview
  if (!empty($block['data']['_is_preview'])) {
    block_preview_image($block['name']);
  } else { ?>
    <section class="block block-audio <?php echo $spacing; ?>">
      <div class="container">
        <div class="block-audio__wrapper">
          <?php if ($graphic_element) { ?>
            <div class="block-audio__graphic graphic-element graphic-element--animate <?php echo $flip_horizontal . ' ' . $flip_vertical ?>" data-name="<?php echo $graphic_element; ?>" data-rotate="<?php echo $rotate; ?>" data-flipx="<?php echo $flip_horizontal; ?>" data-flipy="<?php echo $flip_vertical; ?>">
            </div>
          <?php } ?>
          <div class="block-audio__list">
            <?php foreach ($audio_items as $item) {
              $cover = $item['audio_cover_image'];
              $audio_file = $item['audio_file'];
            ?>
              <div class="block-audio__player audio-player animation-rise-fade-in js-rise-fade-in">
                <audio src="<?php echo $audio_file; ?>"></audio>
                <div class="audio-player__cover">
                  <?php echo wp_get_attachment_image($cover); ?>
                </div>
                <div class="audio-player__playback js-playback" data-playing="false"><svg width="27" height="31" viewBox="0 0 27 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="audio-play" d="M0 31L27 15.5039L0 0V31Z" fill="white" />
                    <rect class="audio-pause" x="0" y="0" width="10" height="31" fill="white" />
                    <rect class="audio-pause" x="17" y="0" width="10" height="31" fill="white" />
                  </svg>
                </div>
                <div class="audio-player__progress">
                  <div class="progress-bar js-progress-bar">
                    <div class="progress-bar__progress-line js-progress-line"></div>
                  </div>
                  <div class="progress-time js-playback-time"><time>00:00</time></div>
                </div>
                <div class="audio-player__volume js-mute" data-muted='false'>
                  <svg width="24" height="21" viewBox="0 0 24 21" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M12.0031 10.3094C12.0031 13.3995 12.0109 16.4896 11.9876 19.5796C11.9876 19.898 11.7857 20.2163 11.677 20.5346C11.3742 20.3793 11.0172 20.2784 10.7842 20.0532C9.36342 18.6712 7.96586 17.266 6.5761 15.8607C6.1879 15.4725 5.76864 15.2784 5.2174 15.2861C4.03727 15.3094 2.86486 15.2939 1.68473 15.2861C0.597769 15.2861 0 14.6883 0 13.6091C0 11.3886 0 9.16809 0 6.95535C0 5.87615 0.597769 5.27831 1.68473 5.27831C2.88039 5.27831 4.07605 5.26279 5.2717 5.27831C5.78413 5.27831 6.18787 5.1075 6.54502 4.7426C7.92701 3.34507 9.31676 1.96308 10.7065 0.57332C10.8385 0.441332 10.9705 0.30158 11.118 0.185119C11.5761 -0.164262 11.9333 -0.00898883 11.9954 0.565549C12.0187 0.751885 12.0109 0.938223 12.0109 1.12456C12.0109 4.18358 12.0109 7.23484 12.0109 10.2939L12.0031 10.3094Z" fill="#F2F1F0" />


                    <path class="audio-unmuted" d="M23.2284 10.3018C23.2284 14.3236 20.5576 17.9572 16.7222 19.1761C16.4038 19.277 16.233 19.1761 16.1243 18.8811C15.7982 17.9882 15.7594 17.9804 16.6445 17.6544C19.7424 16.4975 21.7843 13.5472 21.7765 10.2785C21.7765 7.00989 19.7191 4.0751 16.6212 2.91049C15.7827 2.59993 15.7827 2.58439 16.1165 1.70706C16.2408 1.38873 16.4194 1.30332 16.7455 1.41202C20.612 2.69308 23.2284 6.27231 23.2284 10.3018Z" fill="#F2F1F0" />
                    <path class="audio-unmuted" d="M18.113 10.3397C18.0742 8.74804 17.3133 7.62228 16.0555 6.79153C15.8925 6.68283 15.7139 6.59743 15.5353 6.50426C15.4732 6.46544 15.3955 6.44215 15.3334 6.40333C14.8676 6.06947 15.2714 5.77443 15.3878 5.47163C15.4887 5.19989 15.644 4.95145 15.9934 5.1145C19.5726 6.74494 20.644 10.7667 18.3769 13.6394C17.7481 14.4313 16.9639 15.0214 16.0477 15.4562C15.7838 15.5804 15.5896 15.5416 15.4577 15.2776C15.0306 14.4236 14.8987 14.4313 15.8071 13.9344C17.2124 13.158 18.0431 11.9701 18.113 10.363V10.3397Z" fill="#F2F1F0" />
                    <rect class="audio-muted" x="13" y="6.70703" width="1.5" height="11.3406" rx="0.2" transform="rotate(-45 13 6.70703)" fill="#F2F1F0" />
                    <rect class="audio-muted" x="14.0605" y="15.0801" width="1.5" height="11.3406" rx="0.2" transform="rotate(-135 14.0605 15.0801)" fill="#F2F1F0" />
                  </svg>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>