<?php

function block_preview_image($block_name)
{
  // convert name ("acf/block-name") into path friendly slug ("block-name")
  $block = str_replace('acf/', '', $block_name);
  $preview_image_url = get_stylesheet_directory_uri() . "/assets/img/blocks-preview/$block.jpeg";

  echo "<figure><img src='$preview_image_url' style='width: 100%; height: auto;'></figure>";
}

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{

  // check function exists
  if (function_exists('acf_register_block_type')) {

    // register a block

    acf_register_block_type(array(
      'name'        => 'audio',
      'title'        => __('Audio'),
      'description'    => __('Audio Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'format-audio',
      'keywords'      => array('audio'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'budget-options',
      'title'        => __('Budget Options'),
      'description'    => __('Budget Options'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'money-alt',
      'keywords'      => array('budget', 'proposal'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'case-study',
      'title'        => __('Case Study Block'),
      'description'    => __('Case Study Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'media-document',
      'keywords'      => array('case study', 'project'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'landing_page')
    ));


    acf_register_block_type(array(
      'name'        => 'case-study-minimal',
      'title'        => __('Case Study Block - Minimal Layout'),
      'description'    => __('Case Study block with minimal layout'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'media-document',
      'keywords'      => array('case study', 'project'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'case-study-featured',
      'title'        => __('Featured Case Study Block'),
      'description'    => __('Featured Case Study Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'media-document',
      'keywords'      => array('case study', 'project', 'featured'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'content-grid',
      'title'        => __('Images Grid'),
      'description'    => __('Images Grid'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'grid-view',
      'keywords'      => array('grid', 'content', 'logo', 'partners', 'clients'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'credits',
      'title'        => __('Credits'),
      'description'    => __('Credits Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'groups',
      'keywords'      => array('credits'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study'),
    ));

    acf_register_block_type(array(
      'name'        => 'hero',
      'title'        => __('Hero Carousel'),
      'description'    => __('Hero Title + Carousel'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'slides',
      'keywords'      => array('hero', 'banner'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'hero-alt',
      'title'        => __('Hero Alt'),
      'description'    => __('Hero Image + Text'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'align-full-width',
      'keywords'      => array('hero', 'banner'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'hero-case-study',
      'title'        => __('Hero Case Study'),
      'description'    => __('Hero Case Study'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'align-full-width',
      'keywords'      => array('hero', 'banner', 'project', 'case study'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'instagram-feed',
      'title'        => __('Instagram Feed'),
      'description'    => __('Carousel with Instagram posts feed'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'instagram',
      'keywords'      => array('instagram', 'feed', 'posts', 'carousel'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page')
    ));

    acf_register_block_type(array(
      'name'        => 'intro',
      'title'        => __('Intro'),
      'description'    => __('Intro block with title, subtitle and copy'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'text',
      'keywords'      => array('intro', 'title', 'subtitle'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'intro-alt',
      'title'        => __('Intro Alt'),
      'description'    => __('Intro block with two column layout, title, subtitle and copy'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'text',
      'keywords'      => array('intro', 'title', 'subtitle'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'journal-post',
      'title'        => __('Journal Post Block'),
      'description'    => __('Journal Post Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'media-document',
      'keywords'      => array('blog', 'post', 'journal'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page')
    ));


    acf_register_block_type(array(
      'name'        => 'link',
      'title'        => __('Link'),
      'description'    => __('Simple link block with an icon'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'admin-links',
      'keywords'      => array('link'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'link-alt',
      'title'        => __('Link Alt'),
      'description'    => __('Link block with title, copy, button and graphic element'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'admin-links',
      'keywords'      => array('link'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'link-extended',
      'title'        => __('Link - Extended'),
      'description'    => __('Extended link block with title, image and copy'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'admin-links',
      'keywords'      => array('link'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page')
    ));

    acf_register_block_type(array(
      'name'        => 'masonry',
      'title'        => __('Masonry'),
      'description'    => __('Masonry Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'layout',
      'keywords'      => array('media', 'image', 'masonry', 'picture', 'collage'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'post', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'media',
      'title'        => __('Media'),
      'description'    => __('Media (image, video, carousel)'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'camera-alt',
      'keywords'      => array('media', 'image', 'video', 'picture'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'post', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'newsletter',
      'title'        => __('Newsletter'),
      'description'    => __('Newsletter Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'email-alt',
      'keywords'      => array('newsletter', 'signup', 'form', 'picture'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'page-title',
      'title'        => __('Page Title'),
      'description'    => __('Page Title'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'heading',
      'keywords'      => array('title', 'header', 'heading'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'post-text',
      'title'        => __('Post Text'),
      'description'    => __('Post Text Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'text',
      'keywords'      => array('text', 'copy', 'post', 'journal'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('post', 'proposal', 'landing-page'),
    ));

    acf_register_block_type(array(
      'name'        => 'team-members',
      'title'        => __('Team Members'),
      'description'    => __('Team Members Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'text',
      'keywords'      => array('team', 'members', 'people'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('page'),
    ));

    acf_register_block_type(array(
      'name'        => 'testimonials',
      'title'        => __('Testimonials'),
      'description'    => __('Testimonials/Quote Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'format-quote',
      'keywords'      => array('testimonial', 'quote'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'post', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'text',
      'title'        => __('Text'),
      'description'    => __('Text Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'text',
      'keywords'      => array('text', 'copy'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'proposal', 'landing_page'),
    ));

    acf_register_block_type(array(
      'name'        => 'video-series',
      'title'        => __('Video Series'),
      'description'    => __('Video Series Block'),
      'render_callback'  => 'block_render_callback',
      'category'      => 'content',
      'icon'        => 'playlist-video',
      'keywords'      => array('series', 'video'),
      'mode' => 'edit',
      'supports' => array(
        'align' => false,
        'mode' => false,
        'multiple' => false
      ),
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
      // 'post_types' => array('case_study', 'proposal', 'landing_page'),
    ));
  }
}

function block_render_callback($block)
{

  // convert name ("acf/block-name") into path friendly slug ("block-name")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/blocks" folder
  if (file_exists(get_theme_file_path("/inc/template-parts/blocks/block_{$slug}.php"))) {
    include(get_theme_file_path("/inc/template-parts/blocks/block_{$slug}.php"));
  }
}

// disable default WordPress blocks and enable only custom blocks

add_filter('allowed_block_types', 'theme_blocks');

function theme_blocks($allowed_blocks)
{

  return array(
    'acf/audio',
    'acf/budget-options',
    'acf/case-study',
    'acf/case-study-minimal',
    'acf/case-study-featured',
    'acf/content-grid',
    'acf/credits',
    'acf/hero',
    'acf/hero-case-study',
    'acf/hero-alt',
    'acf/instagram-feed',
    'acf/intro',
    'acf/intro-alt',
    'acf/journal-post',
    'acf/link',
    'acf/link-alt',
    'acf/link-extended',
    'acf/masonry',
    'acf/media',
    'acf/newsletter',
    'acf/page-title',
    'acf/post-text',
    'acf/team-members',
    'acf/testimonials',
    'acf/text',
    'acf/video-series',
  );
}
