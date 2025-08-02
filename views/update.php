<h2>Cập nhật sản phẩm</h2>

<form action="<?= BASE_URL ?>?act=editProduct&id=<?= $data_product['id'] ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Tên sản phẩm</label>
        <input type="text" name="name" value="<?= htmlspecialchars($data_product['name']) ?>" required>
    </div>

    <div>
        <label for="description">Mô tả</label>
        <input type="text" name="description" value="<?= htmlspecialchars($data_product['description']) ?>" required>
    </div>

    <div>
        <label for="price">Giá</label>
        <input type="number" name="price" value="<?= $data_product['price'] ?>" required>
    </div>

    <div>
        <label for="category_id">Loại sản phẩm</label>
        <select name="category_id" required>
            <?php foreach ($data_category as $cate): ?>
                <option value="<?= $cate['id'] ?>" <?= ($cate['id'] == $data_product['category_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cate['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="brand">Thương hiệu</label>
        <input type="text" name="brand" value="<?= htmlspecialchars($data_product['brand']) ?>" required>
    </div>

    <div>
        <label for="image">Ảnh sản phẩm</label><br>
        <input type="file" name="image"><br>
        <?php if (!empty($data_product['image'])): ?>
            <img src="<?= BASE_UPLOADS . '/imgproduct/' . $data_product['image'] ?>" width="100" alt="Ảnh cũ">
        <?php endif; ?>
    </div>

    <br>
    <div>
        <button type="submit">Cập nhật</button>
    </div>
</form>
