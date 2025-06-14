<?php
$id = '';
$className = 'about_us_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/about_us_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$title = get_field('title');
$paragraph = get_field('paragraph');
$photo = get_field('image');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <svg class="shape-lines animation-fade-me-up" width="71" height="597" viewBox="0 0 71 597" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M70.9998 0L55.9998 1.13247e-06L55.9998 263.622L70.9998 263.622L70.9998 0Z" fill="#68848A"/>
            <path d="M15 263.472L1.80267e-05 263.472L3.05176e-05 428.919L15 428.919L15 263.472Z" fill="#0C343D"/>
            <path d="M43 431L28 431L28 596.448L43 596.448L43 431Z" fill="#68848A"/>
        </svg>
        <div class="content-wrapper">
            <h3 class="main-title with-line animation-fade-me-up"><?= $title ?></h3>
            <div class="paragraph size-22 animation-fade-me-up"><?= $paragraph ?></div>
        </div>
        <picture class="image-wrapper animation-fade-me-up">
            <img src="<?= esc_url($photo['url']) ?>" alt="<?= esc_attr($photo) ?>">
        </picture>
    </div>
</section>

