<?php
if (!defined('ABSPATH')) exit;

class WEPF_Cart {
    public function __construct() {
        if (!session_id()) session_start();
        add_action('init', [$this, 'handle_actions']);
        add_shortcode('wepf_cart', [$this, 'render_cart']);
    }

    public function handle_actions() {
        if (isset($_GET['add_to_cart'])) {
            $id = intval($_GET['add_to_cart']);
            $_SESSION['wepf_cart'][$id] = ($_SESSION['wepf_cart'][$id] ?? 0) + 1;
            wp_redirect(site_url('/cart'));
            exit;
        }
    }

    public function render_cart() {
        ob_start();
        include WEPF_PATH . 'templates/cart.php';
        return ob_get_clean();
    }
}
new WEPF_Cart();
