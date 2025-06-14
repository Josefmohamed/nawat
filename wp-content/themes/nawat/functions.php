<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package map
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @return void
 * @since 1.0.0
 *
 */

function map_styles()
{
  wp_enqueue_style(
      'map-style',
      get_stylesheet_uri(),
      [],
      wp_get_theme()->get('Version')
  );
}

add_action('wp_enqueue_scripts', 'map_styles');

function enqueue_jquery()
{
  if (!is_admin()) {
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'enqueue_jquery');

function mapCustomStyles()
{
  wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/assets/index.css', '', '1.0', 'all');
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/index.js', '', null, true);
}

add_action('wp_enqueue_scripts', 'mapCustomStyles');

add_theme_support('editor-styles');

require_once "helpers/helpers.php";


//region register blocks
include "blocks/blocks-related-functions.php";
//endregion register blocks


add_theme_support('post-thumbnails');


function my_custom_admin_editor_inline_styles()
{ ?>
  <style>
    body .editor-styles-wrapper {
      padding: 0 4vw;
    }
    
    .acf-block-component.acf-block-body {
      margin-bottom: 80px;
    }
  </style>
<?php }

add_action('admin_head', 'my_custom_admin_editor_inline_styles');

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
      'page_title' => 'Site Settings',
      'menu_title' => 'Site Settings',
      'menu_slug' => 'site-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}

// Allow SVG uploads
function add_svg_to_upload_mimes($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes');

// Sanitize SVG uploads
function sanitize_svg($file)
{
  $wp_filetype = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);
  if ($wp_filetype['ext'] !== 'svg') {
    return $file;
  }
  $svg = simplexml_load_file($file['tmp_name']);
  if (!$svg) {
    $file['error'] = __('Sorry, this file could not be sanitized and is therefore not allowed.', 'my-theme');
    return $file;
  }
  // Sanitize SVG content here if needed
  return $file;
}

add_filter('wp_handle_upload_prefilter', 'sanitize_svg');

// region gravity form hooks
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form)
{
    $current_lang = get_locale(); // الحصول على اللغة الحالية

    if ($current_lang === 'ar') { // إذا كانت اللغة العربية
        return '<button class="cta-button large bg-orange cta-form" id="gform_submit_button_' . $form['id'] . '" aria-label="Submit">
            إرسال
        </button>';
    } else { // إذا كانت اللغة الإنجليزية
        return '<button class="cta-button large bg-orange cta-form" id="gform_submit_button_' . $form['id'] . '" aria-label="Submit">
            Submit
        </button>';
    }
}
// endregion


// Hook into the 'init' action
add_action('init', 'register_project_cpt', 0);

function register_project_cpt()
{
  $labels = array(
      'name' => _x('Projects', 'Post Type General Name', 'nawat'),
      'singular_name' => _x('Project', 'Post Type Singular Name', 'nawat'),
      'menu_name' => __('Projects', 'nawat'),
      'name_admin_bar' => __('Project', 'nawat'),
      'archives' => __('Project Archives', 'nawat'),
      'attributes' => __('Project Attributes', 'nawat'),
      'parent_item_colon' => __('Parent Project:', 'nawat'),
      'all_items' => __('All Projects', 'nawat'),
      'add_new_item' => __('Add New Project', 'nawat'),
      'add_new' => __('Add New', 'nawat'),
      'new_item' => __('New Project', 'nawat'),
      'edit_item' => __('Edit Project', 'nawat'),
      'update_item' => __('Update Project', 'nawat'),
      'view_item' => __('View Project', 'nawat'),
      'view_items' => __('View Projects', 'nawat'),
      'search_items' => __('Search Projects', 'nawat'),
      'not_found' => __('Not found', 'nawat'),
      'not_found_in_trash' => __('Not found in Trash', 'nawat'),
      'featured_image' => __('Featured Image', 'nawat'),
      'set_featured_image' => __('Set featured image', 'nawat'),
      'remove_featured_image' => __('Remove featured image', 'nawat'),
      'use_featured_image' => __('Use as featured image', 'nawat'),
      'insert_into_item' => __('Insert into project', 'nawat'),
      'uploaded_to_this_item' => __('Uploaded to this project', 'nawat'),
      'items_list' => __('Projects list', 'nawat'),
      'items_list_navigation' => __('Projects list navigation', 'nawat'),
      'filter_items_list' => __('Filter projects list', 'nawat'),
  );
  
  $args = array(
      'label' => __('Project', 'nawat'),
      'description' => __('Custom Post Type for Real Estate Projects', 'nawat'),
      'labels' => $labels,
      'supports' => array('title', 'editor', 'thumbnail'),
      'taxonomies' => array('category', 'post_tag'),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => false,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-building',
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'can_export' => true,
      'has_archive' => false,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'rewrite' => array('slug' => 'projects'),
  );
  
  register_post_type('project', $args);
}
