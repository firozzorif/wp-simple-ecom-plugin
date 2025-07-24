<?php
if (!defined('ABSPATH')) exit;

class WEPF_Products {
    public function __construct() {
        add_action('init', [$this, 'register_cpt']);
        add_filter('template_include', [$this, 'load_templates']);
    }

    public function register_cpt() {
        register_post_type('product', [
            'labels' => ['name' => 'Products', 'singular_name' => 'Product'],
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-cart',
            'supports' => ['title', 'editor', 'thumbnail'],
            'rewrite' => ['slug' => 'products'],
        ]);
    }

    public function load_templates($template) {
        if (is_singular('product')) {
            return WEPF_PATH . 'templates/single-product.php';
        }
        if (is_post_type_archive('product')) {
            return WEPF_PATH . 'templates/product-archive.php';
        }
        return $template;
    }
}
new WEPF_Products();
