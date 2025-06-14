<?php
$id = '';
$className = 'our_mission';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/leadership_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$title = get_field('title');
$information = get_field('information');
$paragraph = get_field('paragraph');
$photo = get_field('media');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <div class="content">
            <h2 class="main-title"><?= esc_html($title) ?></h2>
            <div class="paragraph bold green description"><?= ($information) ?></div>
            <div class="paragraph green description-2"><?= ($paragraph) ?></div>
            <svg class="lines-shape" width="72" height="297" viewBox="0 0 72 297" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.29623 0.697021L8.29646 297" stroke="#0C343D" stroke-width="15"/>
                <line y1="-7.5" x2="165.448" y2="-7.5" transform="matrix(4.37114e-08 1 1 -4.37114e-08 43.6086 0.697021)" stroke="#68848A" stroke-width="15"/>
                <path d="M63.9209 166.145L63.9209 297" stroke="#0C343D" stroke-width="15"/>
            </svg>

        </div>
        <?php if ($photo): ?>
            <picture class="image-wrapper">
                <img src="<?= esc_url($photo['url']) ?>" alt="<?= esc_attr($photo) ?>">
            </picture>
        <?php endif; ?>
    </div>
</section>

