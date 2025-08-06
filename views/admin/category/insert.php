<?php require_once './views/layouts/layoutAdmin.php'; ?>

<h2>Thêm danh mục</h2>

<form action="<?= BASE_URL ?>?act=admin-category-store" method="post" class="admin-form">
    <label for="name">Tên danh mục</label>
    <input type="text" name="name" required>

    <label for="description">Mô tả</label>
    <textarea name="description" rows="4"></textarea>

    <button type="submit" class="btn btn-add">Thêm</button>
    <a href="<?= BASE_URL ?>?act=admin-categories" class="btn btn-edit">Quay lại</a>
</form>

<style>
.admin-form {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    padding: 20px 25px;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
}

.admin-form label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
}

.admin-form input[type="text"],
.admin-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.btn {
    padding: 8px 14px;
    border-radius: 5px;
    font-size: 14px;
    color: #fff;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-add {
    background-color: #28a745;
}

.btn-add:hover {
    background-color: #218838;
}

.btn-edit {
    background-color: #007bff;
}

.btn-edit:hover {
    background-color: #0069d9;
}
</style>
