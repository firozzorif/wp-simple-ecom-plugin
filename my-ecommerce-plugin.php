<?php
/**
 * Plugin Name: WordPress E-Commerce Plugin by Firoz
 * Description: A simple custom e-commerce plugin with products, cart, and checkout.
 * Version: 1.0
 * Author: Firoz Khan
 */

if (!defined('ABSPATH')) exit;

define('WEPF_PATH', plugin_dir_path(__FILE__));
define('WEPF_URL', plugin_dir_url(__FILE__));

// Includes
require_once WEPF_PATH . 'includes/class-products.php';
require_once WEPF_PATH . 'includes/class-cart.php';
require_once WEPF_PATH . 'includes/class-checkout.php';
require_once WEPF_PATH . 'includes/class-orders.php';

// Assets
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('wepf-style', WEPF_URL . 'assets/css/style.css');
    wp_enqueue_script('wepf-script', WEPF_URL . 'assets/js/main.js', ['jquery'], false, true);
});

// Create demo products on activation
register_activation_hook(__FILE__, function () {
    if (get_option('wepf_demo_products_created')) return;

    $products = [
        ['Classic T-Shirt', 'A comfortable cotton T-shirt', 20],
        ['Wireless Headphones', 'Noise-cancelling headphones', 75],
        ['Coffee Mug', 'Ceramic mug for coffee lovers', 10],
        ['Laptop Sleeve', 'Protective laptop sleeve', 25],
        ['Notebook', 'A5 size lined notebook', 5],
        ['Backpack', 'Durable everyday backpack', 40],
        ['Water Bottle', 'Stainless steel bottle', 15],
        ['Desk Lamp', 'LED desk lamp for study/work', 30],
        ['Smart Watch', 'Fitness tracking smart watch', 120],
        ['Bluetooth Speaker', 'Portable Bluetooth speaker', 50],
        ['Baseball Cap', 'Adjustable cotton cap', 12],
        ['Sunglasses', 'UV-protected stylish sunglasses', 35],
    ];

    foreach ($products as $prod) {
        $id = wp_insert_post([
            'post_title' => $prod[0],
            'post_content' => $prod[1],
            'post_status' => 'publish',
            'post_type' => 'product',
        ]);
        update_post_meta($id, 'price', $prod[2]);
    }

    update_option('wepf_demo_products_created', true);
});
