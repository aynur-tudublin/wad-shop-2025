<?php
require_once BASE_PATH . '/config/db.php';
require_once BASE_PATH . '/core/helpers.php';
require_once BASE_PATH . '/app/model/users_model.php';

if ($action === 'login') {
    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $error = "Please enter both email and password.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address.";

        } else {
            $user = users_get_by_email($email);

            if ($user && password_verify($password, $user['password_hash'])) {

                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['firstname'];

                header('Location: ' . BASE_URL . '/index.php');
                exit;

            } else {
                $error = "Incorrect email or password.";
            }
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/auth/login.php';
    include BASE_PATH . '/app/view/layout/footer.php';

} elseif ($action === 'register') {

    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = trim($_POST['firstname']);
        $lastname  = trim($_POST['lastname']);
        $email     = trim($_POST['email']);
        $password  = $_POST['password'];
        $age       = trim($_POST['age']);
        $location  = trim($_POST['location']);

        if ($firstname === '' || $lastname === '' || $email === '' || $password === '') {
            $error = "All required fields must be filled.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email.";
        } elseif (strlen($password) < 6) {
            $error = "Password must be at least 6 characters.";
        } elseif (users_get_by_email($email)) {
            $error = "This email is already registered.";
        } else {
            $data = array(
                'firstname'     => $firstname,
                'lastname'      => $lastname,
                'email'         => $email,
                'password_hash' => password_hash($password, PASSWORD_DEFAULT),
                'age'           => $age !== '' ? (int)$age : null,
                'location'      => $location
            );

            users_create($data);

            header('Location: ' . BASE_URL . '/index.php?controller=auth&action=login');
            exit;
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/auth/register.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'logout') {
    $_SESSION = [];
    session_destroy();

    header('Location: ' . BASE_URL . '/index.php');
    exit;
} else {
    http_response_code(404);
    echo "Unknown action in auth controller.";
}
