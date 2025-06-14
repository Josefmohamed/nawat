<?php
$id = '';
$className = 'image_and_text';
if (isset($block)) {
  $id = $block['id'];
  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }
  if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
  }
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  if (function_exists('is_admin') && is_admin()) {
    if (wp_is_json_request() || (defined('REST_REQUEST') && REST_REQUEST) || (function_exists('get_current_screen') && get_current_screen()->is_block_editor())) {
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/image_and_text/screenshot.png">';
      return;
    }
  }
}

$paragraph = get_field('paragraph');
$photo = get_field('media');

?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <div class="content">
            <div class="paragraph"><?= ($paragraph) ?></div>
            <svg class="lines-shape" width="43" height="218" viewBox="0 0 43 218" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M-7.23193e-06 165.447L15 165.447L15 6.55671e-07L0 0L-7.23193e-06 165.447Z" fill="#68848A"/>
                <path d="M28 217.447L43 217.447L43 52L28 52L28 217.447Z" fill="#EAEAEA"/>
            </svg>
        </div>
        <?php if ($photo): ?>
            <picture class="image-wrapper">
                <img src="<?= esc_url($photo['url']) ?>" alt="<?= esc_attr($photo) ?>">
            </picture>
        <?php endif; ?>
    </div>
</section>

