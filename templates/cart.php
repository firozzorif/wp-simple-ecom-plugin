<h2>Your Cart</h2>
<?php
$cart = $_SESSION['wepf_cart'] ?? [];
if (!$cart) { echo "<p>Your cart is empty.</p>"; return; }
foreach ($cart as $id => $qty) {
    echo "<p>" . get_the_title($id) . " x $qty</p>";
}
?>
<a href="/checkout" style="display:inline-block; padding:10px; background:#28a745; color:#fff; text-decoration:none;">Proceed to Checkout</a>
