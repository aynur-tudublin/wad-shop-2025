<?php
// $user = users_get_by_id($id);
// should the controller check if $user exists before including this view.
?>

<section class="card">
    <h2 class="card__title">Edit User #<?php echo escape($user['id']); ?></h2>

    <form method="post" class="form">

        <div class="grid">
            <label class="field">
                <span class="field__label">First Name</span>
                <input class="input" type="text" name="firstname" required
                       value="<?php echo escape($user['firstname']); ?>">
            </label>

            <label class="field">
                <span class="field__label">Last Name</span>
                <input class="input" type="text" name="lastname" required
                       value="<?php echo escape($user['lastname']); ?>">
            </label>
        </div>

        <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" name="email" required
                   value="<?php echo escape($user['email']); ?>">
        </label>

        <div class="grid">
            <label class="field">
                <span class="field__label">Age</span>
                <input class="input" type="number" name="age"
                       value="<?php echo escape($user['age']); ?>">
            </label>

            <label class="field">
                <span class="field__label">Location</span>
                <input class="input" type="text" name="location"
                       value="<?php echo escape($user['location']); ?>">
            </label>
        </div>

        <div class="actions">
            <button class="btn" type="submit">Save Changes</button>
            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=index">Cancel</a>
        </div>

    </form>
</section>
