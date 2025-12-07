<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/core/helpers.php';
require_once BASE_PATH . '/app/model/products_model.php';

// checks if session cart exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the card
if ($action === 'add') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id]++;
        }
    }

    header("Location: " . BASE_URL . "/index.php?controller=cart&action=view");
    exit;
}

// Decrease counts of the product
if ($action === 'decrease') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0 && isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]--;
        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }

    header("Location: " . BASE_URL . "/index.php?controller=cart&action=view");
    exit;
}

// Remove product from the card
if ($action === 'remove') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }

    header("Location: " . BASE_URL . "/index.php?controller=cart&action=view");
    exit;
}

// Clear cart
if ($action === 'clear') {
    $_SESSION['cart'] = [];
    header("Location: " . BASE_URL . "/index.php?controller=cart&action=view");
    exit;
}

// View cart
if ($action === 'view' || $action === 'index') {

    $cart_items = [];
    $cart_total = 0;

    foreach ($_SESSION['cart'] as $product_id => $qty) {

        $product = products_get_by_id($product_id);

        if ($product) {
            $cart_items[] = [
                'id'       => $product['id'],
                'name'     => $product['name'],
                'price'    => $product['price'],
                'quantity' => $qty
            ];

            $cart_total += ($product['price'] * $qty);
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/cart/view.php';
    include BASE_PATH . '/app/view/layout/footer.php';
    exit;
}

http_response_code(404);
echo "Unknown cart action.";
