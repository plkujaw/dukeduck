<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme
 * @since Theme 1.0
 */

/**
 * Clickjacking protection
 *
 * Add header to stop site loading in an iFrame.
 **/
function theme_headers()
{
  header('X-Frame-Options: SAMEORIGIN');
  header('X-UA-Compatible: IE=edge,chrome=1');
  header('Content-Security-Policy: frame-ancestors \'self\'  ;');
}
add_action('send_headers', 'theme_headers', 10);


/*  Script for no-js / js class
/* ------------------------------------ */
function html_js_class()
{
  echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>' . "\n";
}
add_action('wp_head', 'html_js_class', 1);


// Add brand colours to Colour-Picker Pallettes in admin area
function klf_acf_input_admin_footer()
{ ?>
  <script type="text/javascript">
    (function() {
      acf.add_filter('color_picker_args', function(args, $field) {
        // add the hexadecimal codes here for the colors you want to appear as swatches
        args.palettes = ['#071134', '#01928e', '#5e5e5e']
        // return colors
        return args;
      });
    })();
  </script>
<?php }

add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

// Disable Notification Emails for Plugin Updates
add_filter('auto_plugin_update_send_email', '__return_false');


// adds fs-nav class to menu links
function add_specific_menu_location_atts($atts, $item, $args)
{
  // check if the item is in the primary menu
  if ($args->theme_location == 'primary-menu') {
    // add the desired attributes:
    $atts['class'] = 'fs-nav fs-nav--mobile';
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3);


function get_plain_video($iframe)
{
  // Use preg_match to find iframe src.
  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  // Add extra parameters to src and replace HTML.
  $params = array(
    'controls'  => 0,
    'title' => 0,
    'muted' => 1,
    'loop' => 1,
  );

  $new_src = add_query_arg($params, $src);
  return $iframe = str_replace($src, $new_src, $iframe);

  // Add extra attributes to iframe HTML.
  // $attributes = 'frameborder="0"';
  // $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
}

function get_unmuted_video($iframe)
{
  // Use preg_match to find iframe src.
  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  // Add extra parameters to src and replace HTML.
  $params = array(
    'controls'  => 0,
    'title' => 0,
    'muted' => 0,
    'loop' => 1,
  );

  $new_src = add_query_arg($params, $src);
  return $iframe = str_replace($src, $new_src, $iframe);

  // Add extra attributes to iframe HTML.
  // $attributes = 'frameborder="0"';
  // $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
}


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

  if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(array(
      'page_title'  => __('Featured Case Study'),
      'menu_title'  => __('Featured Case Study'),
      'parent_slug' => 'edit.php?post_type=case_study',
      'position' => 1
    ));
  }
}


function content_block_category($categories, $post)
{
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'content',
        'title' => 'Content',
      ),
    )
  );
}
add_filter('block_categories', 'content_block_category', 10, 2);

//ADDING AN ACTIVE CLASS TO THE CUSTOM POST-TYPE MENU ITEM WHEN VISITING ITS SINGLE POST PAGES
function custom_active_item_classes($classes = array(), $menu_item = false)
{
  global $post;
  $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'current-menu-item active' : '';

  if (((is_single() && 'case_study' == get_post_type()) || is_post_type_archive('case_study')) && 'Work' == $menu_item->title && !in_array('current-menu-item', $classes)) {
    $classes[] .= 'current-menu-item active'; // setting current menu item      
  }


  if (((is_category() || is_tag()) || (is_single() && 'post' == get_post_type())) && 'Journal' == $menu_item->title && !in_array('current-menu-item', $classes)) {
    $classes[] .= 'current-menu-item active'; // setting current menu item      
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'custom_active_item_classes', 10, 2);


// remove block editor for contact page template
function remove_editor()
{
  if (isset($_GET['post'])) {
    $id = $_GET['post'];
    $template = get_post_meta($id, '_wp_page_template', true);
    switch ($template) {
      case 'page-contact.php':
      case 'page-privacy_policy.php':
        // the below removes 'editor' support for 'pages'
        // if you want to remove for posts or custom post types as well
        // add this line for posts:
        // remove_post_type_support('post', 'editor');
        // add this line for custom post types and replace 
        // custom-post-type-name with the name of post type:
        // remove_post_type_support('custom-post-type-name', 'editor');
        remove_post_type_support('page', 'editor');
        break;
      default:
        // Don't remove any other template.
        break;
    }
  }
}
add_action('init', 'remove_editor');

// journal header categories links
function cats_list($categories)
{
  echo "<a href='" . site_url('/journal/') . "' class='fs-b1 category-link'>All</a> ";
  foreach ($categories as $category) {
    echo "<a href='" . get_category_link($category) . "' class='fs-b1 category-link'>" . $category->name . "</a>" . ' ';
  }
}


// post categories
function post_categories($cats)
{
  $cats_array = array();

  if (!empty($cats)) {
    $cats_array[] = '<a href="' . get_category_link($cats[0]->term_id) . '" class="post-card__cat">' . $cats[0]->name . '</a>';
  }

  return $cats_output = (!empty($cats_array)) ? ' ' . join(', ', $cats_array) : '';
}


function redirect_visual_post_to_visual_archive()
{
  if ((!is_category('visuals') && in_category('visuals'))) {
    $category_id = get_cat_ID('Visuals');
    wp_safe_redirect(get_category_link($category_id), 301);
    die;
  }
}
add_action('template_redirect', 'redirect_visual_post_to_visual_archive');

function redirect_case_study_archive_to_work_page()
{
  if (is_post_type_archive('case_study')) {
    wp_safe_redirect(site_url('/work/'), 301);
    die;
  }
}
add_action('template_redirect', 'redirect_case_study_archive_to_work_page');


// proposal password form
function proposal_password_form()
{
  global $post;
  $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
  $title = str_replace('Protected: ', '', get_the_title());
  $o = '<div class="container"><form class="proposal-password-form" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    ' . __("To view $title, enter the password below:") . '
  <div class="proposal-password-form__input-wrapper"><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" />
    <button class="link-arrow-1 arrow-right fs-b1" type="submit" name="Submit" value="' . esc_attr__("Submit") . '" />SUBMIT<svg width="31" height="25" viewBox="0 0 31 25" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M19.6717 0.5L18.1317 1.91238L27.1395 11.4667H0V13.5437H27.1395L18.1317 23.0876L19.6717 24.5L31 12.5052L19.6717 0.5Z" fill="#01928E" />
</svg></button></div></form></div>
    ';
  return $o;
}
add_filter('the_password_form', 'proposal_password_form');


add_filter('custom_menu_order', 'custom_menu_order', 10, 1);

add_filter('menu_order', 'custom_menu_order', 10, 1);

function custom_menu_order($menu_ord)
{

  if (!$menu_ord) return true;

  return array(
    'wpengine-common',
    'index.php',
    'separator1',
    'edit.php?post_type=page',
    'edit.php?post_type=case_study',
    'edit.php',
    'upload.php',
    'edit.php?post_type=landing_page',
    'edit.php?post_type=proposal',
    'separator2',
  );
}


function set_grid_layout($columns)
{
  return "style='grid-template-columns:repeat($columns, 1fr);'";
}

function set_image_layout($horizontal, $vertical)
{
  if ($horizontal > 1) {
    $horizontal = "span-horizontal span-horizontal--$horizontal";
  }
  if ($vertical) $vertical = 'span-vertical';
  return "$horizontal $vertical";
}


function display_cat_description()
{

  if (category_description()) {
    $term = get_queried_object();
    $color = get_field('description_text_color', $term);
    the_archive_description("<div class='cat-description fs-p2' style='color: $color'>", '</div>');
  } else {
    echo "<p class='cat-description fs-p2'>Our journal is where you can find blog posts, behind-the-scenes content, and creative experiments. Take a dip in the Duck Pond to explore all this and more.</p>";
  }
}
