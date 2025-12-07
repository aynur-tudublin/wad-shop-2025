<section class="card">
    <h2 class="card__title">Login</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert--error">X <?php echo escape($error); ?></div>
    <?php endif; ?>

    <form method="post" class="form">
        <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" required>
        </label>
        <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" required>
        </label>
        <div class="actions">
            <button class="btn" type="submit">Login</button>
            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=auth&action=register">Register</a>
        </div>
    </form>
</section>
