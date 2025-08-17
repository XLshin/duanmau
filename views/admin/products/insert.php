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
<form action="<?=  BASE_URL ?>?act=storeProduct" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" id="">
    </div>
    <div>
        <label for="">Mô tả</label>
        <input type="text" name="description" id="">
    </div>
    <div>
        <label for="">Giá tiền</label>
        <input type="number" name="price" id="">
    </div>
    <div>
        <label for="">Danh mục sản phẩm</label>
        <select name="category_id" id="">
            <?php foreach($data as $value): ?>
                <option value="<?= $value['id'] ?>">
                    <?= $value['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="">Thương hiệu</label>
        <input type="text" name="brand" id="">
    </div>
    <div>
        <label for="">Ảnh sản phẩm</label>
        <input type="file" name="image" id="">
    </div>
    <button>Thêm mới</button>
    <?php if (isset($_SESSION['error'])): ?>
    <div style="color: red; margin-bottom: 10px;">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

</form>
