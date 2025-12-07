<?php
require_once BASE_PATH . '/app/model/products_model.php';

// it is a public page to list the product, but other actions require login
if ($action === 'index') {

    $products = products_get_all();

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/products/list.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'create') {

    require_login();

    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name        = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price_raw   = trim($_POST['price']);
        $stock_raw   = trim($_POST['stock']);
        $category    = trim($_POST['category']);

        // Validation
        if ($name === '' || $price_raw === '' || $stock_raw === '') {
            $error = "Name, price and stock are required.";
        } elseif (!is_numeric($price_raw) || (float)$price_raw < 0) {
            $error = "Price must be a number greater than or equal to 0.";
        } elseif (!ctype_digit($stock_raw) || (int)$stock_raw < 0) {
            // ctype_digit ensures an integer string like "0", "10"
            $error = "Stock must be a whole number greater than or equal to 0.";
        } else {

            $data = array(
                'name'        => $name,
                'description' => $description,
                'price'       => (float)$price_raw,
                'stock'       => (int)$stock_raw,
                'category'    => $category,
                'image_path'  => null   // I don't really implemented image upload funcitonality. It exists here, but not used
            );

            products_create($data);

            header('Location: ' . BASE_URL . '/index.php?controller=products&action=index');
            exit;
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/products/create.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'edit') {
    require_login();

    $error = "";
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id <= 0) {
        header('Location: ' . BASE_URL . '/index.php?controller=products&action=index');
        exit;
    }

    $product = products_get_by_id($id);
    if (!$product) {
        header('Location: ' . BASE_URL . '/index.php?controller=products&action=index');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name        = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price_raw   = trim($_POST['price']);
        $stock_raw   = trim($_POST['stock']);
        $category    = trim($_POST['category']);

        if ($name === '' || $price_raw === '' || $stock_raw === '') {
            $error = "Name, price and stock are required.";

        } elseif (!is_numeric($price_raw) || (float)$price_raw < 0) {
            $error = "Price must be a number greater than or equal to 0.";

        } elseif (!ctype_digit($stock_raw) || (int)$stock_raw < 0) {
            $error = "Stock must be a whole number greater than or equal to 0.";

        } else {
            $data = array(
                'name'        => $name,
                'description' => $description,
                'price'       => (float)$price_raw,
                'stock'       => (int)$stock_raw,
                'category'    => $category,
                'image_path'  => $product['image_path'] // I don't really implemented image upload funcitonality. It exists here, but not used
            );

            products_update($id, $data);

            header('Location: ' . BASE_URL . '/index.php?controller=products&action=index');
            exit;
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/products/edit.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'delete') {
    require_login();

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        products_delete($id);
    }

    header('Location: ' . BASE_URL . '/index.php?controller=products&action=index');
    exit;
} else {
    http_response_code(404);
    echo "Unknown action in products controller.";
}
