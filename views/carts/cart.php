<h2 style="margin: 30px;">🛒 Giỏ hàng của bạn</h2>
<?php if (empty($cart_items)): ?>
    <p style="margin: 30px;">Giỏ hàng trống.</p>
<?php else: ?>
    <table style="width: 90%; margin: 0 auto; border-collapse: collapse;">
        <tr style="background: #f0f0f0;">
            <th>Ảnh</th>
            <th>Tên</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </tr>
        <?php 
        $total = 0;
        foreach ($_SESSION['cart'] as $key => $item): 
            $price = $item['price'] ?? 0;
            $quantity = $item['quantity'] ?? 0;
            $subtotal = $price * $quantity;
            $total += $subtotal;
        ?>
        <tr style="text-align: center;">
            <td><img src="<?= BASE_URL ?>uploads/imgproduct/<?= $item['image'] ?>" width="60"></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['size'] ?></td>
            <td><?= $quantity ?></td>
            <td><?= number_format($price) ?>đ</td>
            <td><?= number_format($subtotal) ?>đ</td>
            <td><a href="<?= BASE_URL ?>?act=remove-cart&remove=<?= urlencode($key) ?>">❌</a></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="5" style="text-align: right;"><strong>Tổng cộng:</strong></td>
            <td colspan="2"><?= number_format($total) ?>đ</td>
        </tr>
    </table>
    <div style="text-align: center; margin-top: 20px;">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="<?= BASE_URL ?>" class="btn-cart">🧾 Đặt hàng</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>?act=login" class="btn-cart">🔒 Đăng nhập để đặt hàng</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
