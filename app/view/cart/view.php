<section class="card">
    <h2 class="card__title">Your Cart</h2>

    <?php if (empty($cart_items)): ?>

        <p>Your cart is empty.</p>
        <p>
            <a class="btn" href="<?php echo BASE_URL; ?>/index.php?controller=products&action=index">
                Browse Products
            </a>
        </p>

    <?php else: ?>

        <div class="table-wrap">
            <table class="table">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price (€)</th>
                    <th>Quantity</th>
                    <th>Line Total (€)</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo escape($item['name']); ?></td>
                        <td><?php echo escape($item['price']); ?></td>
                        <td><?php echo escape($item['quantity']); ?></td>
                        <td><?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <td>
                            <!-- Increase the number of grocery items in the cart -->
                            <a
                                    class="btn btn--tiny"
                                    href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=add&id=<?php echo escape($item['id']); ?>">
                                +
                            </a>

                            <!-- Decrease the quantity -->
                            <a
                                    class="btn btn--tiny btn--ghost"
                                    href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=decrease&id=<?php echo escape($item['id']); ?>">
                                −
                            </a>

                            <!-- Remove a grocery item from the card -->
                            <a
                                    class="btn btn--tiny btn--ghost"
                                    href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=remove&id=<?php echo escape($item['id']); ?>"
                                    onclick="return confirm('Remove this item from the cart?');">
                                Remove
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p><strong>Total: €<?php echo number_format($cart_total, 2); ?></strong></p>

        <div class="actions">
            <a
                    class="btn btn--ghost"
                    href="<?php echo BASE_URL; ?>/index.php?controller=cart&action=clear"
                    onclick="return confirm('Clear the entire cart?');">
                Clear Cart
            </a>

            <a class="btn" href="<?php echo BASE_URL; ?>/index.php?controller=products&action=index">
                Continue Shopping
            </a>
        </div>

    <?php endif; ?>

</section>
