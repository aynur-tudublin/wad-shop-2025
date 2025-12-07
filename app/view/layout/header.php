<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>Simple Grocery Store</title>
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css" />
  </head>
<body>

<header class="site-header">
    <div class="container">
        <h1 class="brand">Simple Store</h1>
        <nav class="nav">
            <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php">Home</a>
            <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=products&action=index">Products</a>
            <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=view">Cart</a>

            <?php if (is_logged_in()): ?>
                <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=index">Users</a>
                <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=auth&action=logout">Logout (<?php echo escape($_SESSION['user_name']); ?>)</a>
            <?php else: ?>
                <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=auth&action=login">Login</a>
                <a class="nav__link" href="<?php echo BASE_URL; ?>/index.php?controller=auth&action=register">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main class="container">
