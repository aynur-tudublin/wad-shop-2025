<?php
require_once BASE_PATH . '/app/model/users_model.php';

require_login(); // all user actions require login

if ($action === 'index') {
    $users = users_get_all();

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/users/list.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'create') {

    $error = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstname = trim($_POST['firstname']);
        $lastname  = trim($_POST['lastname']);
        $email     = trim($_POST['email']);
        $password  = $_POST['password']; // only used on create
        $age       = trim($_POST['age']);
        $location  = trim($_POST['location']);

        // validation for first and last names, and email and password
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
            $error = "First name, last name, email and password are required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address.";
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

            header('Location: ' . BASE_URL . '/index.php?controller=users&action=index');
            exit;
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/users/create.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'edit') {
    $error = "";
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id <= 0) {
        header('Location: ' . BASE_URL . '/index.php?controller=users&action=index');
        exit;
    }

    $user = users_get_by_id($id);

    if (!$user) {
        header('Location: ' . BASE_URL . '/index.php?controller=users&action=index');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $firstname = trim($_POST['firstname']);
        $lastname  = trim($_POST['lastname']);
        $email     = trim($_POST['email']);
        $age       = trim($_POST['age']);
        $location  = trim($_POST['location']);

        if (empty($firstname) || empty($lastname) || empty($email)) {
            $error = "First name, last name and email are required.";

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email.";

        } else {
            $data = array(
                'firstname' => $firstname,
                'lastname'  => $lastname,
                'email'     => $email,
                'age'       => $age !== '' ? (int)$age : null,
                'location'  => $location
            );

            users_update($id, $data);

            header('Location: ' . BASE_URL . '/index.php?controller=users&action=index');
            exit;
        }
    }

    include BASE_PATH . '/app/view/layout/header.php';
    include BASE_PATH . '/app/view/users/edit.php';
    include BASE_PATH . '/app/view/layout/footer.php';
} elseif ($action === 'delete') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id > 0) {
        users_delete($id);
    }

    header('Location: ' . BASE_URL . '/index.php?controller=users&action=index');
    exit;
} else {
    http_response_code(404);
    echo "Unknown action in users controller.";
}
