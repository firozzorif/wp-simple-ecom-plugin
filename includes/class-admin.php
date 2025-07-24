<?php
if (!defined('ABSPATH')) exit;

class My_Ecommerce_Admin {
    public function __construct() {
        add_action('init', [$this, 'register_orders']);
    }

    public function register_orders() {
        register_post_type('shop_order', [
            'label' => 'Orders',
            'public' => false,
            'show_ui' => true,
            'supports' => ['title', 'editor'],
            'menu_icon' => 'dashicons-list-view',
        ]);
    }
}

new My_Ecommerce_Admin();
