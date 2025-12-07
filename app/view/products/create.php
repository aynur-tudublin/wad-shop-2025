<section class="card">
    <h2 class="card__title">Add a New Grocery Product</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert--error">X <?php echo escape($error); ?></div>
    <?php endif; ?>

    <form method="post" class="form" enctype="multipart/form-data">

        <label class="field">
            <span class="field__label">Product Name</span>
            <input class="input" type="text" name="name" required>
        </label>

        <label class="field">
            <span class="field__label">Description</span>
            <textarea class="input" name="description" rows="4"></textarea>
        </label>

        <div class="grid">
            <label class="field">
                <span class="field__label">Price (€)</span>
                <input class="input" type="number" name="price" step="0.01" min="0" required>
            </label>

            <label class="field">
                <span class="field__label">Stock</span>
                <input class="input" type="number" name="stock" min="0" required>
            </label>
        </div>

        <label class="field">
            <span class="field__label">Category</span>
            <input class="input" type="text" name="category">
        </label>

        <label class="field">
            <span class="field__label">Image (optional)</span>
            <input class="input" type="file" name="image">
        </label>

        <div class="actions">
            <button class="btn" type="submit">Add Product</button>
            <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/index.php?controller=products&action=index">Cancel</a>
        </div>

    </form>
</section>
