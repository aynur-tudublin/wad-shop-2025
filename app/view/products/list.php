<section class="card">
    <h2 class="card__title">Products</h2>

    <div class="actions" style="margin-bottom: 12px;">
        <?php if (is_logged_in()): ?>
            <a class="btn" href="<?php echo BASE_URL; ?>/index.php?controller=products&action=create">
                + Add Product
            </a>
        <?php else: ?>
            <span class="muted">Login to add or edit products. You can still add items to the cart.</span>
        <?php endif; ?>
    </div>

    <?php if (!empty($products)): ?>
        <div class="table-wrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price (€)</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Cart</th>
                    <?php if (is_logged_in()): ?>
                        <th>Manage</th>
                    <?php endif; ?>
                </tr>
                </thead>

                <tbody>

                <?php foreach ($products as $p): ?>
                    <tr>
                        <td><?php echo escape($p['name']); ?></td>
                        <td><?php echo escape($p['price']); ?></td>
                        <td><?php echo escape($p['stock']); ?></td>
                        <td><?php echo escape($p['category']); ?></td>

                        <!-- Add to Cart button no login required -->
                        <td>
                            <a class="btn btn--tiny"
                               href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=add&id=<?php echo escape($p['id']); ?>">
                                Add to Cart
                            </a>
                        </td>

                        <!-- it allows Edit/Delete only for logged-in users -->
                        <?php if (is_logged_in()): ?>
                            <td>
                                <a class="btn btn--tiny btn--ghost"
                                   href="<?php echo BASE_URL; ?>/index.php?controller=products&action=edit&id=<?php echo escape($p['id']); ?>">
                                    Edit
                                </a>
                                <a class="btn btn--tiny btn--ghost"
                                   href="<?php echo BASE_URL; ?>/index.php?controller=products&action=delete&id=<?php echo escape($p['id']); ?>"
                                   onclick="return confirm('Delete this product?');">
                                    Delete
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <p>No products found</p>
    <?php endif; ?>

</section>
