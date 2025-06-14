<?php
$id = '';
$className = 'general_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/general_block/screenshot.png">';
            return;
        }
    }
}
?>
<style>
    .general_block {
        background-color: #241F21;

    h1 {
        margin-block: 30px 15px;
    }

    .cta-button, .cta-link {
        margin-bottom: 10px;
    }

    }
</style>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <h1>large</h1>
        <a href="#" class="cta-button large bg-orange">button</a>
        <a href="#" class="cta-button large bg-orange">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FBFAF6"/>
            </svg>
        </a>

        <h1>medium</h1>
        <a href="#" class="cta-button medium bg-orange">button</a>
        <a href="#" class="cta-button medium bg-orange">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FBFAF6"/>
            </svg>
        </a>
        <h1>small</h1>
        <a href="#" class="cta-button small bg-orange">button</a>
        <a href="#" class="cta-button small bg-orange">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FBFAF6"/>
            </svg>
        </a>

        <h1>dark outline</h1>
        <a href="#" class="cta-button large dark-outline ">button</a>
        <a href="#" class="cta-button large  dark-outline">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FF5001"/>
            </svg>
        </a>

        <h1>light outline</h1>
        <a href="#" class="cta-button large light-outline ">button</a>
        <a href="#" class="cta-button large  light-outline">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FF5001"/>
            </svg>
        </a>

        <h1>secondary</h1>
        <a href="#" class="cta-button large secondary ">button</a>
        <a href="#" class="cta-button large secondary">
            button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FF5001"/>
            </svg>
        </a>

        <h1>cta link</h1>
        <a href="#" class="cta-link large   ">button</a>
        <a href="#" class="cta-link large  ">button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FBFAF6"/>
            </svg>
        </a>

        <h1>secondary link</h1>
        <a href="#" class="cta-link secondary medium  ">button</a>
        <a href="#" class="cta-link secondary medium  ">button
            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z"
                      fill="#FBFAF6"/>
            </svg>
        </a>

    </div>
</section>

