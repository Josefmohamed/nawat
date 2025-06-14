<?php
$id = '';
$className = 'hero_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/hero_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php

$background = get_field('background');
$main_title = get_field('main_title');
$paragraph = get_field('paragraph');
$explore = get_field('explore');
$join_community = get_field('join_community');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <?php if ($background): ?>
        <picture class="background">
            <img src="<?= esc_url($background['url']) ?>"
                 alt="<?= esc_attr($background['alt'] ?: 'Background image') ?>">
        </picture>
    <?php endif; ?>

    <div class="content-wrapper">

        <?php if ($main_title): ?>
            <h1 class="title animation-fade-me-up"><?= $main_title ?></h1>
            <p class="paragraph animation-fade-me-up">
                <?php echo esc_html($paragraph); ?>
            </p>

            <div class="links-wrapper">
                <?php if ($explore): ?>
                    <a class="explore animation-fade-me-up" href="<?php echo esc_url($explore['url']); ?>" target="<?php echo esc_attr($explore['target'] ?: '_self'); ?>">
                        <?php echo esc_html($explore['title']); ?> <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.89715 1.65427C4.89715 1.01678 5.41394 0.5 6.05142 0.5H15.8457C16.4832 0.5 17 1.01678 17 1.65427V11.4486C17 12.0861 16.4832 12.6028 15.8457 12.6028C15.2082 12.6028 14.6915 12.0861 14.6915 11.4486V4.44092L1.97046 17.1619C1.51969 17.6127 0.788848 17.6127 0.338078 17.1619C-0.112693 16.7112 -0.112693 15.9803 0.338078 15.5295L13.0591 2.80854H6.05142C5.41394 2.80854 4.89715 2.29176 4.89715 1.65427Z" fill="#0C343D"/>
                        </svg>

                    </a>
                <?php endif; ?>

                <?php if ($join_community): ?>
                    <a class="join-community animation-fade-me-up" href="<?php echo esc_url($join_community['url']); ?>" target="<?php echo esc_attr($join_community['target'] ?: '_self'); ?>">
                        <?php echo esc_html($join_community['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</section>

