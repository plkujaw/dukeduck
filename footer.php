<?php

/**
 * The template for displaying the footer
 *
 *
 */

$col_1 = get_field('footer_col_1', 'option');
$col_1_links = get_field('footer_col_1', 'option')['footer_col_1_links'];
$col_2 = get_field('footer_col_2', 'option');
$col_2_links = get_field('footer_col_2', 'option')['footer_col_2_links'];
$social_accounts = get_field('social_accounts', 'option');

?>
</main>
<footer class="footer">
  <div class="container">
    <div class="footer__inner">
      <div class="footer__social">
        <ul>
          <?php foreach ($social_accounts as $account) {
          ?>
            <li>
              <a href="<?php echo esc_url($account['account_link']) ?>" target="_blank"><img src="<?php echo esc_url($account['account_icon']) ?>" class="footer-social-link"></a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class=" footer__links">
        <div class="footer__link-wrapper">
          <p class="fs-p1"><?php echo $col_1['footer_col_1_title']; ?></p>
          <div class="footer-col-links">
            <?php foreach ($col_1_links as $link) { ?>
              <a href="<?php echo esc_url(esc_url($link['link']['url'])) ?>" class="fs-b1" target="<?php echo ($link['link']['target']); ?>"><?php echo ($link['link']['title']); ?></a>
            <?php } ?>
          </div>
        </div>
        <div class="footer__link-wrapper">
          <p class="fs-p1"><?php echo $col_2['footer_col_2_title']; ?></p>
          <div class="footer-col-links">
            <?php foreach ($col_2_links as $link) { ?>
              <a href="<?php echo esc_url(esc_url($link['link']['url'])) ?>" class="fs-b1" target="<?php echo ($link['link']['target']); ?>"><?php echo ($link['link']['title']); ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__credits">
      <p class="fs-p4">© <?php echo get_the_time('Y') . '&nbsp' . get_bloginfo('name') . '.&nbsp' . str_replace(array('<p>', '</p>'), '', get_field('footer_copyright', 'option')); ?></p>
      <a href="<?php echo site_url(); ?>" class="footer__logo">
        <?php get_template_part('inc/template-parts/logo-alt'); ?>
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</div>
<!-- #site -->
</body>

</html>