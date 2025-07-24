<?php
if (!defined('ABSPATH')) exit;

class WEPF_Checkout {
    public function __construct() {
        add_shortcode('wepf_checkout', [$this, 'render_checkout']);
    }

    public function render_checkout() {
        ob_start();
        include WEPF_PATH . 'templates/checkout.php';
        return ob_get_clean();
    }
}
new WEPF_Checkout();
