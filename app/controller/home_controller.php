<?php

if ($action === 'index') {
    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/home/index.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} else {
    http_response_code(404);
    echo "Unknown action in home controller.";
}
