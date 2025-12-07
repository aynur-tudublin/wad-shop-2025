<section class="card">
    <h2 class="card__title">Create User</h2>

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
            <button class="btn" type="submit">Save</button>
            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=index">Cancel</a>
        </div>
    </form>
    
</section>
