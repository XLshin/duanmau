<?php require_once './views/layouts/header.php'; ?>



<style>


.detail-container {
    max-width: 960px;
    margin: 40px auto;
    display: flex;
    gap: 32px;
    background: #fff;
    padding: 28px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.detail-image {
    flex: 1;
    text-align: center;
}

.detail-image img {
    width: 100%;
    max-width: 360px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.detail-info {
    flex: 2;
}

.detail-info h2 {
    font-size: 26px;
    margin-bottom: 12px;
    color: #333;
}

.detail-info p {
    margin: 10px 0;
    font-size: 15px;
    color: #555;
}

.detail-info .price {
    font-size: 22px;
    color: #c0392b;
    font-weight: bold;
    margin: 14px 0;
}

.size-list {
    margin-top: 20px;
    font-size: 15px;
}

.size-list strong {
    display: block;
    margin-bottom: 10px;
}

.size-list ul {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
}


.size-list button.size-item {
    border: 1px solid #ddd;
    padding: 10px 14px;
    border-radius: 6px;
    background-color: #f8f8f8;
    min-width: 60px;
    text-align: center;
    font-size: 14px;
    color: #333;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s;
}

.size-list button.size-item.selected {
    background-color: #2c3e50;
    color: white;
    border-color: #2c3e50;
}

.action-buttons {
    margin-top: 30px;
    display: flex;
    gap: 16px;
    align-items: center;
}

/* Số lượng */
.qty-control {
    display: flex;
    align-items: center;
    gap: 8px;
}

.qty-control button {
    background-color: #ddd;
    border: none;
    padding: 6px 12px;
    font-size: 18px;
    border-radius: 6px;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.3s ease;
}

.qty-control button:hover {
    background-color: #bbb;
}

.qty-control input {
    width: 50px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 6px;
}

.action-buttons button.btn-cart {
    background-color: #2c3e50;
    color: #fff;
    padding: 12px 22px;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s ease;
}

.action-buttons button.btn-cart:hover {
    background-color: #1a252f;
}

.action-buttons button.btn-buy {
    background-color: #e74c3c;
    color: #fff;
    padding: 12px 22px;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s ease;
}

.action-buttons button.btn-buy:hover {
    background-color: #c0392b;
}
</style>

<div class="detail-container">
    <div class="detail-image">
        <img src="<?= BASE_UPLOADS . '/' . $data['image'] ?>" alt="<?= htmlspecialchars($data['name']) ?>">
    </div>
    <div class="detail-info">
        <h2><?= htmlspecialchars($data['name']) ?></h2>
        <p><strong>Thương hiệu:</strong> <?= htmlspecialchars($data['brand']) ?></p>
        <p><strong>Loại giày:</strong> <?= htmlspecialchars($data['categoryName']) ?></p>
        <p><strong>Mô tả:</strong> <?= nl2br(htmlspecialchars($data['description'])) ?></p>
        <div class="price"><?= number_format($data['price']) ?>₫</div>

        <?php if (!empty($data['sizes'])): ?>
        <div class="size-list">
            <strong>Size có sẵn:</strong>
            <ul>
                <?php foreach ($data['sizes'] as $item): ?>
                    <li>
                        <button type="button" class="size-item" data-size="<?= htmlspecialchars($item['size']) ?>">
                            <?= htmlspecialchars($item['size']) ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

    <form action="<?= BASE_URL ?>?act=add-cart" method="post" id="addCartForm">
        <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
        <input type="hidden" name="size" id="selected-size" value="">
        <input type="hidden" name="quantity" id="selected-qty" value="1">

        <div class="action-buttons">
            <div class="qty-control">
                <button type="button" id="btn-decrease">−</button>
                <input type="number" id="quantity" value="1" min="1" max="99" />
                <button type="button" id="btn-increase">+</button>
            </div>
            <button type="submit" class="btn-cart" id="btn-add-cart" disabled>Thêm vào giỏ</button>
            <button type="button" class="btn-buy" id="btn-buy-now" disabled>Mua ngay</button>
            
        </div>
    </form>
<?php
// Giả sử biến $data chứa info sản phẩm, $comments chứa bình luận, session đã start
$product = $data;
?>

<?php require_once './views/comments/form.php'; ?>

    </div>
</div>

<script>
    // Chọn size
    const sizeButtons = document.querySelectorAll('.size-item');
    let selectedSize = null;

    sizeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Bỏ chọn tất cả
            sizeButtons.forEach(b => b.classList.remove('selected'));
            // Chọn btn hiện tại
            btn.classList.add('selected');
            selectedSize = btn.getAttribute('data-size');

            // Bật nút Thêm vào giỏ & Mua ngay
            document.getElementById('btn-add-cart').disabled = false;
            document.getElementById('btn-buy-now').disabled = false;
        });
    });

    // Số lượng
    const qtyInput = document.getElementById('quantity');
    const btnIncrease = document.getElementById('btn-increase');
    const btnDecrease = document.getElementById('btn-decrease');

    btnIncrease.addEventListener('click', () => {
        let current = parseInt(qtyInput.value) || 1;
        if (current < parseInt(qtyInput.max)) {
            qtyInput.value = current + 1;
        }
    });

    btnDecrease.addEventListener('click', () => {
        let current = parseInt(qtyInput.value) || 1;
        if (current > parseInt(qtyInput.min)) {
            qtyInput.value = current - 1;
        }
    });

    qtyInput.addEventListener('input', () => {
        let val = parseInt(qtyInput.value);
        if (isNaN(val) || val < parseInt(qtyInput.min)) {
            qtyInput.value = qtyInput.min;
        } else if (val > parseInt(qtyInput.max)) {
            qtyInput.value = qtyInput.max;
        }
    });

    // Xử lý khi bấm Thêm vào giỏ hoặc Mua ngay
    document.getElementById('btn-add-cart').addEventListener('click', (e) => {
        e.preventDefault();
        if (!selectedSize) {
            alert('Vui lòng chọn size!');
            return;
        }

        const quantity = parseInt(qtyInput.value);
        document.getElementById('selected-size').value = selectedSize;
        document.getElementById('selected-qty').value = quantity;

        document.getElementById('addCartForm').submit();
    });


    document.getElementById('btn-buy-now').addEventListener('click', () => {
        if (!selectedSize) {
            alert('Vui lòng chọn size!');
            return;
        }
        const quantity = parseInt(qtyInput.value);
        // TODO: Xử lý mua ngay
        alert(`Bạn sẽ mua sản phẩm "${selectedSize}" với số lượng ${quantity}.`);
    });
</script>

