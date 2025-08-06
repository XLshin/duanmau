<?php require_once './views/layouts/layoutAdmin.php'; ?>

<h2>Danh sách danh mục</h2>
<a href="<?= BASE_URL ?>?act=admin-category-insert" class="btn btn-add">+ Thêm danh mục</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= htmlspecialchars($category['name']) ?></td>
                <td><?= htmlspecialchars($category['description']) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>?act=admin-category-edit&id=<?= $category['id'] ?>" class="btn btn-edit">Sửa</a>
                    <a href="<?= BASE_URL ?>?act=admin-category-delete&id=<?= $category['id'] ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<style>
/* --- CSS Dùng Chung --- */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
}

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
