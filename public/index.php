<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../core/helpers.php';

// selects controller and action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ? $_GET['action'] : 'index';

// builds the controller path
$controller_file = BASE_PATH . '/app/controller/' . $controller . '_controller.php';

if (!file_exists($controller_file)) {
    http_response_code(404);
    echo "Controller not found: " . htmlspecialchars($controller);
    exit;
}

// it loads the controller, action variable should now available
require $controller_file;
