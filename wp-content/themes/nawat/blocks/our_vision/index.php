<?php
$id = '';
$className = 'our_vision';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_vision/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$title = get_field('title');
$paragraph = get_field('paragraph');
$description = get_field('description');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <svg class="circle-shape" width="808" height="357" viewBox="0 0 808 357" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.15" d="M628.646 286.743C650.338 272.073 670.587 255.414 689.041 236.921C757.849 168.076 802.215 103.572 807.919 0L703 0.000177383C702.047 3.68176 701.684 3.38636 700.5 7.00018C682.046 63.2209 638.516 78.8707 586.899 102.904C535.751 126.703 479.101 138.993 423.426 143.324C370.132 147.459 313.053 145.781 272.906 105.05C247.173 78.9755 234.826 34.573 231.451 0.000177383H0.111328C15.9522 81.1276 55.8468 180.691 112.047 236.921C130.501 255.414 150.711 272.112 172.442 286.743C175.134 288.577 177.865 290.371 180.636 292.166C186.137 295.716 191.755 299.111 197.451 302.388C198.895 303.207 200.338 304.027 201.782 304.807C204.63 306.445 207.517 308.006 210.443 309.528C211.887 310.308 213.33 311.049 214.813 311.791C270.526 340.35 333.692 356.424 400.563 356.424C467.435 356.424 530.601 340.35 586.275 311.791C587.688 311.084 589.03 310.378 590.436 309.638L590.645 309.528C593.571 307.967 596.419 306.445 599.306 304.807L599.311 304.804C600.753 304.025 602.195 303.245 603.637 302.388C609.333 299.15 614.951 295.716 620.452 292.166C623.222 290.371 625.953 288.577 628.646 286.743Z" fill="#D8BCA7"/>
    </svg>

    <div class="container">
        <h2 class="main-title with-line center-line animation-fade-me-up"><?= esc_html($title) ?></h2>
        <div class="paragraph green bold description size-22"><?=($paragraph) ?></div>
        <div class="paragraph green size-22"><?=($description) ?></div>
        <div class="features-wrapper">
            <?php
            $count = 1;

            while (have_rows('features')): the_row();
                $icon = get_sub_field('icon');
                $feature_text = get_sub_field('feature_text');
                $feature_number = get_sub_field('feature_number');
                ?>
                <div class="feature">
                    <div class="feature-icon">
                        <img src="<?= esc_url($icon['url']) ?>" alt="<?= esc_attr($icon) ?>">
                    </div>
                    <p class="paragraph"><?= esc_html($feature_text) ?></p>
                    <span class="feature-number">0<?= $count ?></span>
                </div>
                <?php $count++; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>

