<?php

/**
 * Custom posts for use with this theme
 *
 *
 */
function register_case_study_post_type()
{

  $labels = array(
    'name'                  => 'Case Studies',
    'singular_name'         => 'Case Study',
    'menu_name'             => 'Case Studies',
    'name_admin_bar'        => 'Case Studies',
    'archives'              => 'Case Study Archives',
    'attributes'            => 'Case Study Attributes',
    'parent_item_colon'     => 'Parent Case Study',
    'all_items'             => 'All Case Studies',
    'add_new_item'          => 'Add Case Study',
    'add_new'               => 'Add Case Study',
    'new_item'              => 'New Case Study',
    'edit_item'             => 'Edit Case Study',
    'update_item'           => 'Update Case Study',
    'view_item'             => 'View Case Study',
    'view_items'            => 'View Case Studies',
    'search_items'          => 'Search Case Study',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Case Study',
    'uploaded_to_this_item' => 'Uploaded to this Case Study',
    'items_list'            => 'Case Studies list',
    'items_list_navigation' => 'Case Studies list navigation',
    'filter_items_list'     => 'Case Studies list',
  );
  $args = array(
    'label'                 => 'Case Study',
    'description'           => 'Case Study',
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'          => true,
    'menu_position'         => 5,
    'menu_icon'             => 'dashicons-portfolio',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'rewrite'               => array('slug' => 'case-study'),
  );
  register_post_type('case_study', $args);
}

function register_proposal_post_type()
{

  $labels = array(
    'name'                  => 'Proposals',
    'singular_name'         => 'Proposal',
    'menu_name'             => 'Proposals',
    'name_admin_bar'        => 'Proposals',
    'archives'              => 'Proposal Archives',
    'attributes'            => 'Proposal Attributes',
    'parent_item_colon'     => 'Parent Proposal',
    'all_items'             => 'All Proposals',
    'add_new_item'          => 'Add Proposal',
    'add_new'               => 'Add Proposal',
    'new_item'              => 'New Proposal',
    'edit_item'             => 'Edit Proposal',
    'update_item'           => 'Update Proposal',
    'view_item'             => 'View Proposal',
    'view_items'            => 'View Proposals',
    'search_items'          => 'Search Proposal',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Proposal',
    'uploaded_to_this_item' => 'Uploaded to this Proposal',
    'items_list'            => 'Proposals list',
    'items_list_navigation' => 'Proposals list navigation',
    'filter_items_list'     => 'Proposals list',
  );
  $args = array(
    'label'                 => 'Proposal',
    'description'           => 'Proposal',
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'          => true,
    'menu_position'         => 16,
    'menu_icon'             => 'dashicons-clipboard',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'rewrite'               => array('slug' => 'proposal'),

  );
  register_post_type('proposal', $args);
}

function register_landing_page_post_type()
{

  $labels = array(
    'name'                  => 'Landing Pages',
    'singular_name'         => 'Landing Page',
    'menu_name'             => 'Landing Pages',
    'name_admin_bar'        => 'Landing Pages',
    'archives'              => 'Landing Page Archives',
    'attributes'            => 'Landing Page Attributes',
    'parent_item_colon'     => 'Parent Landing Page',
    'all_items'             => 'All Landing Pages',
    'add_new_item'          => 'Add Landing Page',
    'add_new'               => 'Add Landing Page',
    'new_item'              => 'New Landing Page',
    'edit_item'             => 'Edit Landing Page',
    'update_item'           => 'Update Landing Page',
    'view_item'             => 'View Landing Page',
    'view_items'            => 'View Landing Pages',
    'search_items'          => 'Search Landing Page',
    'not_found'             => 'Not found',
    'not_found_in_trash'    => 'Not found in Trash',
    'featured_image'        => 'Featured Image',
    'set_featured_image'    => 'Set featured image',
    'remove_featured_image' => 'Remove featured image',
    'use_featured_image'    => 'Use as featured image',
    'insert_into_item'      => 'Insert into Landing Page',
    'uploaded_to_this_item' => 'Uploaded to this Landing Page',
    'items_list'            => 'Landing Pages list',
    'items_list_navigation' => 'Landing Pages list navigation',
    'filter_items_list'     => 'Landing Pages list',
  );
  $args = array(
    'label'                 => 'Landing Page',
    'description'           => 'Landing Page',
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'excerpt', 'thumbnail'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'          => true,
    'menu_position'         => 17,
    'menu_icon'             => 'dashicons-media-document',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'rewrite'               => array('slug' => 'landing-page'),

  );
  register_post_type('landing_page', $args);
}
add_action('init', 'register_case_study_post_type', 0);
add_action('init', 'register_proposal_post_type', 0);
add_action('init', 'register_landing_page_post_type', 0);
