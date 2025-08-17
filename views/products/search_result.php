<?php require_once './views/layouts/header.php'; ?>
        <div class="banner"><img src="./views/banner/7.png" alt=""></div>

<style>

    .banner img {
    max-width: 100%;
    width: 1472px;
    height: 628px;
    display: block;
    margin: 0 auto;
}
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 24px;
}

.product-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    overflow: hidden;
    transition: transform 0.2s ease;
}

.product-card:hover {
    transform: translateY(-6px);
}

.product-image img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom: 1px solid #eee;
}

.product-info {
    padding: 14px 16px;
}

.product-info h3 {
    font-size: 16px;
    margin: 0 0 6px;
    color: #333;
}

.product-info p {
    font-size: 14px;
    color: #666;
    margin: 4px 0;
}

.product-price {
    font-size: 16px;
    font-weight: bold;
    color: #d43f00;
    margin-top: 8px;
}

.product-actions {
    margin-top: 10px;
}

.product-actions a {
    display: inline-block;
    margin-right: 10px;
    font-size: 13px;
    color: #0077cc;
    text-decoration: none;
}

.product-actions a:hover {
    text-decoration: underline;
}
</style>

<div class="container">
    <h2 style="text-align:center; margin-bottom: 30px;">Kết quả tìm kiếm</h2>

    <?php if (empty($results)): ?>
        <p style="text-align: center;">Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php else: ?>
        <div class="product-grid">
            <?php foreach ($results as $value): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= BASE_UPLOADS . '/' . $value['image'] ?>" alt="<?= $value['name'] ?>">
                    </div>
                    <div class="product-info">
                        <h3><?= htmlspecialchars($value['name']) ?></h3>
                        <p><?= htmlspecialchars($value['brand']) ?> • <?= htmlspecialchars($value['categoryName'] ?? '') ?></p>
                        <div class="product-price"><?= number_format($value['price']) ?>₫</div>
                        <div class="product-actions">
                            <a href="<?= BASE_URL ?>?act=detail&id=<?= $value['id'] ?>">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once './views/layouts/footer.php'; ?>
