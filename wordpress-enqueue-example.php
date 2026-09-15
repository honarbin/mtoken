<?php
// در functions.php قالب یا افزونه اختصاصی قرار دهید؛ slugها را مطابق صفحات خود تغییر دهید.
function mtoken_enqueue_assets() {
    $base = get_stylesheet_directory_uri() . '/assets/css/';
    wp_enqueue_style('mtoken-base', $base . 'mtoken-base.css', array(), '1.1');
    wp_enqueue_style('mtoken-components', $base . 'mtoken-components.css', array('mtoken-base'), '1.1');

    $pages = array(
        'services' => 'services',
        'systems-guide' => 'systems-guide',
        'vip' => 'vip',
        'k3' => 'k3',
        'gica-guide' => 'gica-guide',
        'gica' => 'gica',
        'csr' => 'csr',
        'reissue' => 'reissue',
        'issue-certifiate' => 'issue-certifiate',
        'support-home' => 'support-home',
    );

    foreach ($pages as $slug => $css_file) {
        if (is_page($slug)) {
            wp_enqueue_style(
                'mtoken-page-' . sanitize_title($slug),
                $base . 'pages/' . $css_file . '.css',
                array('mtoken-components'),
                '1.1'
            );
            break;
        }
    }
}
add_action('wp_enqueue_scripts', 'mtoken_enqueue_assets');
