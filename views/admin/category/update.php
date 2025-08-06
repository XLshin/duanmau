<?php require_once './views/layouts/layoutAdmin.php'; ?>

<h2>Cập nhật danh mục</h2>

<form action="<?= BASE_URL ?>?act=admin-category-update" method="post" class="admin-form">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">

    <label for="name">Tên danh mục</label>
    <input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>

    <label for="description">Mô tả</label>
    <textarea name="description" rows="4"><?= htmlspecialchars($category['description']) ?></textarea>

    <button type="submit" class="btn btn-edit">Cập nhật</button>
    <a href="<?= BASE_URL ?>?act=admin-categories" class="btn btn-delete">Hủy</a>
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
