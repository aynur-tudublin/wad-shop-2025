<section class="card">
    <h2 class="card__title">Users</h2>
    <p><a class="btn" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=create">+ Add User</a></p>

    <?php if (!empty($users)): ?>
        <div class="table-wrap">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th><th>First</th><th>Last</th><th>Email</th><th>Age</th><th>Location</th><th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?php echo escape($u['id']); ?></td>
                        <td><?php echo escape($u['firstname']); ?></td>
                        <td><?php echo escape($u['lastname']); ?></td>
                        <td><?php echo escape($u['email']); ?></td>
                        <td><?php echo escape($u['age']); ?></td>
                        <td><?php echo escape($u['location']); ?></td>
                        <td>
                            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=edit&id=<?php echo escape($u['id']); ?>">Edit</a>
                            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=users&action=delete&id=<?php echo escape($u['id']); ?>" onclick="return confirm('Delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>

</section>
