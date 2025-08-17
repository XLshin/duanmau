<?php require_once './views/layouts/layoutAdmin.php'; ?>
<body>
    <style>
        form {
    max-width: 500px;
    margin: 30px auto;
    background: #fff;
    padding: 25px 30px;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
}

form div {
    margin-bottom: 18px;
    display: flex;
    flex-direction: column;
}

form label {
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
}

form input[type="text"],
form input[type="number"],
form select,
form input[type="file"] {
    padding: 10px 12px;
    font-size: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus,
form input[type="number"]:focus,
form select:focus,
form input[type="file"]:focus {
    outline: none;
    border-color: #007bff;
}

form button {
    width: 100%;
    padding: 12px 0;
    background-color: #28a745;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: 700;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #218838;
}

    </style>
</body>
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
    <?php if (isset($_SESSION['error'])): ?>
    <div style="color: red; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

</form>
