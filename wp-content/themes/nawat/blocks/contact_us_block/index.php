<?php
$id = '';
$className = 'contact_us_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/contact_us_block/screenshot.png">';
            return;
        }
    }
}
?>

<?php
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$location = get_field('location');
$phone_number = get_field('phone_number');
$email_link = get_field('email_link');
$available_time = get_field('available_time');

?>


<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <div class="info">
            <h1 class="main-title with-line animation-fade-me-up">
                <?= esc_html($heading) ?>
            </h1>

            <div class="paragraph description size-22 animation-fade-me-up">
                <?= ($paragraph) ?>
            </div>


            <div class="links-wrapper">
                <?php if ($location): ?>
                    <div class="form-link paragraph size-22 animation-fade-me-up">
                        <svg width="17" height="24" viewBox="0 0 17 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 0C3.8057 0 0 3.77791 0 8.43829C0 16.215 8.5 24 8.5 24C8.5 24 17 16.215 17 8.43829C17 3.77791 13.1943 0 8.5 0ZM8.5 13.1891C5.85705 13.1891 3.71461 11.0622 3.71461 8.43829C3.71461 5.81443 5.85705 3.68778 8.5 3.68778C11.143 3.68778 13.2851 5.81473 13.2851 8.43829C13.2851 11.0619 11.1427 13.1891 8.5 13.1891Z" fill="#0C343D"/>
                        </svg>
                        <span class="text"><?= esc_html($location) ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($phone_number): ?>
                    <a href="tel:<?= esc_attr($phone_number) ?>" class="form-link paragraph size-22 animation-fade-me-up">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74678 6.17406C8.38485 5.53099 8.38229 4.48043 7.74064 3.84044L4.37171 0.478327C3.73006 -0.16166 2.68316 -0.159094 2.04509 0.483973C-2.64858 5.21588 1.69561 11.7707 5.4836 15.5511C9.27159 19.3315 15.8288 23.6554 20.523 18.9235C21.1611 18.2799 21.1585 17.2299 20.5169 16.5899L17.1479 13.2278C16.5063 12.5878 15.4594 12.5904 14.8213 13.2339C13.2397 14.8285 13.5221 15.2807 11.5297 14.1285C9.60828 13.0174 7.98829 11.4007 6.87078 9.47921C5.71181 7.48688 6.16414 7.76813 7.74627 6.17355L7.74678 6.17406Z" fill="#0C343D"/>
                        </svg>
                        <span class="text"><?= esc_html($phone_number) ?></span>
                    </a>
                <?php endif; ?>
                <?php if ($email_link): ?>


                    <a href="<?= esc_url($email_link['url']) ?>" target="<?= esc_attr($email_link['target']) ?>"
                       class="form-link paragraph size-22 animation-fade-me-up">
                        <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.47018 0H21.5298C21.9436 0 22.3192 0.177999 22.5873 0.46348L11.5 8.18966L0.412693 0.46348C0.680804 0.177999 1.05583 0 1.47018 0ZM22.9983 1.43878L14.3202 7.48619L22.9729 14.779C22.9906 14.6858 23 14.5891 23 14.4907V1.50929C23 1.48541 22.9994 1.46209 22.9983 1.43878ZM22.435 15.6776L13.4421 8.09753L11.7936 9.24628C11.7698 9.26334 11.7448 9.27869 11.7188 9.2912L11.6994 9.3003C11.6385 9.32703 11.5742 9.34068 11.5105 9.34239H11.4878C11.4241 9.34125 11.3598 9.32703 11.2989 9.3003L11.2795 9.2912C11.2535 9.27869 11.2286 9.26334 11.2047 9.24628L9.55619 8.09753L0.564475 15.6776C0.814306 15.8794 1.12895 16 1.47018 16H21.5298C21.8705 16 22.1851 15.8794 22.4355 15.6776H22.435ZM0.0271435 14.779L8.67984 7.48619L0.00166185 1.43878C0.00055395 1.46209 0 1.48598 0 1.50929V14.4907C0 14.5891 0.00941715 14.6858 0.0271435 14.779Z" fill="#0C343D"/>
                        </svg>
                        <span class="link"><?= esc_html($email_link['title']) ?></span>
                    </a>
                <?php endif; ?>
                <?php if ($available_time): ?>
                    <div class="form-link paragraph size-22 animation-fade-me-up">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_90_543)">
                                <path d="M15.4714 18.5153C15.1 18.5153 14.7495 18.3441 14.5098 18.0457L9.93944 12.3568C9.74718 12.1174 9.64131 11.8131 9.64166 11.4998L9.63989 6.13945C9.63989 5.40703 10.2057 4.8111 10.9007 4.8111C11.5958 4.8111 12.1616 5.40703 12.1616 6.13907V11.0162L16.4324 16.3322C16.6498 16.6025 16.7539 16.946 16.7259 17.2992C16.6979 17.6523 16.5411 17.9727 16.2844 18.2016C16.0574 18.4041 15.7685 18.5156 15.4714 18.5156V18.5153Z" fill="#053C48"/>
                                <path d="M11.6304 11.2209V6.13908C11.6304 5.71469 11.3036 5.37048 10.9006 5.37048C10.4977 5.37048 10.1709 5.71469 10.1709 6.13908L10.1727 11.4998C10.1727 11.6751 10.2293 11.8511 10.3451 11.9951L14.9154 17.684C15.1753 18.0073 15.6349 18.0476 15.9415 17.7743C16.2485 17.5009 16.2867 17.0169 16.0269 16.6935L11.6304 11.2213V11.2209Z" fill="#053C48"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9188 23C8.00232 23 5.26041 21.8037 3.19796 19.6314C1.13585 17.4595 0 14.5716 0 11.5002C0 8.4288 1.13585 5.54088 3.19796 3.36861C5.26041 1.19634 8.00232 0 10.9188 0C13.6759 0 16.3084 1.08558 18.3312 3.05685C20.2216 4.89908 21.4233 7.35776 21.7477 10.0264H22.1662C22.5234 10.0264 22.8113 10.2143 22.9359 10.5291C23.1045 10.9546 22.9076 11.4625 22.7079 11.7038L21.185 13.8246L21.1603 13.8511C20.9924 14.0297 20.7687 14.1282 20.5304 14.1282C20.2924 14.1282 20.0687 14.0301 19.9005 13.8518L19.8753 13.825L18.3504 11.6997C18.1354 11.4297 18.0763 10.9378 18.2215 10.5716C18.3571 10.2304 18.6506 10.0264 19.0064 10.0264H19.2752C18.6078 5.73406 15.111 2.56944 10.9142 2.56944C6.24118 2.56944 2.43954 6.57388 2.43918 11.4957C2.43918 16.4168 6.23977 20.4209 10.9124 20.4216L11.4495 20.4171V23H10.9184H10.9188Z" fill="#053C48"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.1661 10.5858H21.2696C20.8284 4.97181 16.3629 0.559387 10.9187 0.559387C5.18206 0.559387 0.531006 5.45847 0.531006 11.5002C0.531006 17.5419 5.18171 22.4406 10.9187 22.4406V20.981H10.9144C5.93942 20.981 1.90798 16.7353 1.90798 11.4957C1.90798 6.2569 5.93906 2.01006 10.9141 2.01006C15.5977 2.01006 19.4443 5.77396 19.8788 10.5858H19.006C18.5765 10.5858 18.6431 11.2194 18.7617 11.3462L20.2768 13.4577C20.4166 13.6061 20.6429 13.6061 20.7824 13.4577L22.2981 11.3465C22.4511 11.1836 22.6426 10.5862 22.1657 10.5862L22.1661 10.5858Z" fill="#053C48"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_90_543">
                                    <rect width="23" height="23" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <span class="text"><?= esc_html($available_time) ?></span>
                    </div>
                <?php endif; ?>

            </div>

        </div>

        <div class="form animation-fade-me-up">
            <?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') ?>
        </div>
    </div>
</section>

