<?php require_once './views/layouts/layoutAdmin.php'; ?>

<h2>Danh sách sản phẩm</h2>
<a href="<?= BASE_URL ?>?act=insertProduct" class="btn btn-add">+ Thêm sản phẩm</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Thương hiệu</th>
            <th>Ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['categoryName']) ?></td>
                <td><?= number_format($item['price']) ?>đ</td>
                <td><?= htmlspecialchars($item['brand']) ?></td>
                <td><img src="uploads/imgproduct/<?= $item['image'] ?>" width="60" height="60"></td>
                <td>
                    <a href="<?= BASE_URL ?>?act=updateProduct&id=<?= $item['id'] ?>" class="btn btn-edit">Sửa</a>
                    <a href="<?= BASE_URL ?>?act=deleteProduct&id=<?= $item['id'] ?>" class="btn btn-delete"
                       onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<body>
    <style>
        /* Tổng thể */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

/* Tiêu đề và nút thêm */
h2 {
    margin-bottom: 20px;
    color: #1d2c46;
    text-align: center;
}

.btn-add {
    display: inline-block;
    background-color: #28a745;
    color: #fff;
    padding: 10px 18px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    margin-bottom: 15px;
    transition: background-color 0.3s ease;
}

.btn-add:hover {
    background-color: #218838;
}

/* Bảng danh sách */
table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
}

thead tr {
    background-color: #34495e;
    color: white;
    text-align: left;
}

thead th {
    padding: 12px 15px;
    font-weight: 600;
}

tbody tr:nth-child(even) {
    background-color: #f4f7f9;
}

tbody tr:hover {
    background-color: #e9f0f7;
}

tbody td {
    padding: 12px 15px;
    vertical-align: middle;
}

/* Ảnh sản phẩm */
tbody img {
    border-radius: 5px;
    object-fit: cover;
}

/* Các nút hành động */
.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 13px;
    cursor: pointer;
    text-decoration: none;
    margin-right: 5px;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.btn-edit {
    background-color: #007bff;
}

.btn-edit:hover {
    background-color: #0069d9;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

    </style>
</body>