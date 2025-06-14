<!doctype html>
<html <?php language_attributes(); ?> class="can-scroll">
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600&display=swap" rel="stylesheet">
  <!-- Third party code ACF-->
  <?php
  
  $code_in_head_tag = get_field('code_in_head_tag', 'options');
  $code_before_body_tag_after_head_tag = get_field('code_before_body_tag_after_head_tag', 'options');
  $code_after_body_tag = get_field('code_after_body_tag', 'options');
  ?>
  <?php wp_head(); ?>
  <?= $code_in_head_tag ?>
  <?php
  $custom_body_class = isset($args['body_class']) ? $args['body_class'] : '';
  ?>
</head>
<?= $code_before_body_tag_after_head_tag ?>
<body <?php body_class($custom_body_class); ?>>
<?= $code_after_body_tag ?>
<!-- header ACF -->
<?php
$header_logo = get_field('header_logo', 'options');


?>
<header class="nawat-header">
  <div class="container header-wrapper">
      <?php if ($header_logo): ?>
          <a href="<?= site_url() ?>" class="main-logo" role="img" aria-label="Site logo">
              <?php
              $logo_url = $header_logo['url'];
              $logo_alt = esc_attr($header_logo['alt'] ?: get_bloginfo('name'));
              $ext = pathinfo($logo_url, PATHINFO_EXTENSION);

              if ($ext === 'svg') {
                  // Attempt to inline the SVG content
                  $svg_path = ABSPATH . str_replace(site_url('/'), '', $logo_url);
                  if (file_exists($svg_path)) {
                      echo file_get_contents($svg_path);
                  } else {
                      // Fallback if SVG can't be read
                      echo '<img src="' . esc_url($logo_url) . '" alt="' . $logo_alt . '">';
                  }
              } else {
                  echo '<img src="' . esc_url($logo_url) . '" alt="' . $logo_alt . '">';
              }
              ?>
          </a>
      <?php endif; ?>

    
    <!-- burger menu and cross-->
    <button aria-label="Open Menu Links" class="burger-menu">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </button>
    <!--     links  -->
    <nav class="navbar">
      <div class="navbar-wrapper">
        <?php if (have_rows('menu_links', 'options')) { ?>
          <ul class="primary-menu">

            <?php while (have_rows('menu_links', 'options')) {
              the_row();
              $menu_link = get_sub_field('link');
              ?>
              <li class="menu-item">
                <a href="<?= $menu_link['url'] ?>" target="<?= $menu_link['target'] ?>"
                   class="header-link cta-link">
                  <?= $menu_link['title'] ?>
                </a>
              </li>
            <?php } ?>
          </ul>
        <?php } ?>
      </div>
    </nav>

      <div class="site-lang-switcher menu-item ">
          <?php
          if (function_exists('pll_the_languages')) {
              $languages = pll_the_languages(array('raw' => 1, 'hide_current' => 1));
              foreach ($languages as $lang) {
                  if ($lang['slug'] == 'ar') {
                      echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="تغيير اللغة إلى العربية">AR</a>';
                  } elseif ($lang['slug'] == 'en') {
                      echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="Switch language to English">EN</a>';
                  }
              }
          }
          ?>
      </div>

  </div>
</header>
