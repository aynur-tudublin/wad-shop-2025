<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function escape($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function is_logged_in() {
    return !empty($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: ' . BASE_URL . '/index.php?controller=auth&action=login');
        exit;
    }
}
