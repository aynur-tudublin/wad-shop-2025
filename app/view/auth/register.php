<section class="card">
    <h2 class="card__title">Create an Account</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert--error">X <?php echo escape($error); ?></div>
    <?php endif; ?>

    <form method="post" class="form">

        <div class="grid">
            <label class="field">
                <span class="field__label">First Name</span>
                <input class="input" type="text" name="firstname" required>
            </label>

            <label class="field">
                <span class="field__label">Last Name</span>
                <input class="input" type="text" name="lastname" required>
            </label>
        </div>

        <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" required>
        </label>

        <label class="field">
            <span class="field__label">Password</span>
            <input class="input" type="password" name="password" required>
        </label>

        <div class="grid">
            <label class="field">
                <span class="field__label">Age</span>
                <input class="input" type="number" name="age">
            </label>

            <label class="field">
                <span class="field__label">Location</span>
                <input class="input" type="text" name="location">
            </label>
        </div>

        <div class="actions">
            <button class="btn" type="submit">Register</button>
            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=auth&action=login">Cancel</a>
        </div>

    </form>
</section>
