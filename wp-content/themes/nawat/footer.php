<?php wp_footer(); ?>
<?php
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$footer_logo = get_field('footer_logo', 'options');
$copy_rights = get_field('copy_rights', 'options');

$contacts = get_field('contacts', 'options');
$email = (is_array($contacts) && isset($contacts['email'])) ? $contacts['email'] : '';
$phone = (is_array($contacts) && isset($contacts['phone'])) ? $contacts['phone'] : '';
$location = (is_array($contacts) && isset($contacts['location'])) ? $contacts['location'] : '';

$social_links = get_field('social_links', 'options');
$facebook = (is_array($social_links) && isset($social_links['facebook'])) ? $social_links['facebook'] : '';
$instagram = (is_array($social_links) && isset($social_links['instagram'])) ? $social_links['instagram'] : '';
$x = (is_array($social_links) && isset($social_links['x'])) ? $social_links['x'] : '';
$linked_in = (is_array($social_links) && isset($social_links['linked_in'])) ? $social_links['linked_in'] : '';

?>
<footer>
    <div class="container">
        <div class="logo-wrapper">
            <div class="logo">
                <?php if ($footer_logo): ?>
                    <a class="footer-logo" href="<?= site_url() ?>" aria-label="Go to homepage">
                        <?php
                        $logo_url = $footer_logo['url'];
                        $logo_alt = esc_attr($footer_logo['alt'] ?: get_bloginfo('name'));
                        $ext = pathinfo($logo_url, PATHINFO_EXTENSION);

                        if ($ext === 'svg') {
                            $svg_path = ABSPATH . str_replace(site_url('/'), '', $logo_url);
                            if (file_exists($svg_path)) {
                                echo file_get_contents($svg_path);
                            } else {
                                echo '<img src="' . esc_url($logo_url) . '" alt="' . $logo_alt . '">';
                            }
                        } else {
                            echo '<picture><img src="' . esc_url($logo_url) . '" alt="' . $logo_alt . '"></picture>';
                        }
                        ?>
                    </a>
                <?php endif; ?>

            </div>
            <div class="copy-rights"><?= $copy_rights ?></div>
        </div>

        <div class="pages-wrapper">
            <?php while (have_rows('page_links', 'options')):
                the_row();
                $link = get_sub_field('link');
                ?>
                <?php if (!empty($link) && is_array($link)): ?>
                <a class="button-large page-link cta-link uppercase-text" href="<?= $link['url'] ?>"
                   target="<?= $link['target'] ?>">
                    <?= $link['title'] ?>
                </a>
            <?php endif; ?>
            <?php endwhile; ?>

        </div>

        <?php if (have_rows('social_media', 'options')): ?>
            <ul class="social-links">
                <?php while (have_rows('social_media', 'options')): the_row();
                    $icon = get_sub_field('icon'); // Image URL
                    $url = get_sub_field('url');
                    ?>
                    <li class="social-link">
                        <a href="<?= $url ?>" target="_blank" class="social-link" aria-label=" (opens in a new tab)">
                            <?php if (!empty($icon) && is_array($icon)) { ?>
                                <picture class="icon-wrapper cover-image">
                                    <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                </picture>
                            <?php } ?>
                        </a>

                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </div>
    <svg class="lines-shape" width="43" height="118" viewBox="0 0 43 118" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M-5.13609e-06 118L15 118L15 6.55672e-07L2.51581e-05 0L-5.13609e-06 118Z" fill="#68848A"/>
        <path d="M28 118L43 118L43 52L28 52L28 118Z" fill="#EAEAEA"/>
    </svg>

</footer>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
