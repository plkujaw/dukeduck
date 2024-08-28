<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and start of the <body> section
 *
 */
$social_accounts = get_field('social_accounts', 'option');
foreach ($social_accounts as $account) {
  if ($account['account_name'] === 'Instagram') {
    $instagram_url = $account['account_link'];
  }
}
$is_mobile = wp_is_mobile() ? ' is-mobile' : '';
$body_class .= $is_mobile;
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class($body_class); ?>>
    <?php wp_body_open(); ?>
    <?php get_template_part('inc/template-parts/mobile-menu'); ?>
    <div id="site">
      <header class="header">
        <div class="container">
          <div class="header__row">
            <div class="header__logo dark">
              <a href="<?php echo site_url(); ?>">
                <?php get_template_part('inc/template-parts/logo'); ?>
              </a>
            </div>
            <div class="header__menu">
              <button class="burger js-mobile-menu-trigger" type="button" aria-expanded="false">
                <span class="screen-reader-text">Open menu</span>
                <span class="burger__line burger__line--1"></span>
                <span class="burger__line burger__line--2"></span>
                <span class="burger__line burger__line--3"></span>
              </button>
            </div>
            <nav class="header__nav">
              <?php wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class' => 'main-nav',
                'menu_container' => '',
                'container' => '',
                'link_after' => "<span class='menu-item-underline'><svg width='98' height='10' viewBox='0 0 98 10' fill='none' preserveAspectRatio='none' xmlns='http://www.w3.org/2000/svg'><path d='M2 7.92C2 7.92 22.6 4.64 31.4 3.81C40.2 2.98 45.68 2.57 50.83 2.91C55.98 3.25 89.52 1 89.52 1C89.52 1 77.21 3.86 64.12 5.26C57.89 5.92 49.03 5.71 45.82 5.72C35.86 5.75 4.13 4.6 7.83 4.29C9.54 4.14 33.34 3.19 55.66 2.95C76.59 2.72 96.48 4.47 96.48 4.47' stroke='#3CB8B9' stroke-width='2' stroke-linecap='square' stroke-linejoin='round'/></svg></span>"
              )); ?>
              <a href="<?php echo esc_url($instagram_url); ?>" class="menu-social" target="_blank">
                <?php get_template_part('inc/template-parts/icon-insta'); ?>
              </a>
            </nav>
          </div>
        </div>
      </header>
      <main>