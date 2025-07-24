<?php
if (!defined('ABSPATH')) exit;

class WEPF_Orders {
    public function __construct() {
        add_action('admin_menu', function () {
            add_menu_page('Orders', 'Orders', 'manage_options', 'wepf_orders', [$this, 'orders_page'], 'dashicons-list-view', 30);
        });
    }

    public function orders_page() {
        echo "<h1>Orders</h1><p>Orders will be displayed here.</p>";
    }
}
new WEPF_Orders();
