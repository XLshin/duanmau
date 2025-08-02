<?php require_once './views/courses/header.php'; ?>
<a href="<?= BASE_URL ?>?act=insert">thêm mới</a>
<table>
    <style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

thead {
    background-color: #111;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
}

th, td {
    padding: 15px 20px;
    text-align: left;
}

tbody tr {
    border-bottom: 1px solid #eee;
    transition: background 0.3s ease;
}

tbody tr:hover {
    background-color: #f9f9f9;
}

img {
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.05);
}

a {
    color: #0077cc;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    color: #005fa3;
    text-decoration: underline;
}

td:last-child a {
    color: red;
    font-weight: bold;
}

td:last-child a:hover {
    text-decoration: underline;
}


    </style>
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Loại giày</th>
            <th>Thương hiệu</th>
            <th>Ảnh</th>
            <th>Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $value): ?>
            <tr>
                <td><?= $value['name'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= number_format($value['price']) ?></td>
                <td><?= $value['categoryName'] ?></td>
                <td><?= $value['brand'] ?></td>
                <td>                    
                    <img src="<?= BASE_UPLOADS . '/' . $value['image'] ?>"  width="100">
                </td>
                <td><?= $value['created_at'] ?></td>
                <td>
                    <a href="<?= BASE_URL ?>?act=detail&id=<?= $value['id'] ?>">
                        Chi tiết
                    </a>
                </td>
                <td>
                    <a href="<?= BASE_URL ?>?act=update&id=<?= $value['id'] ?>">
                        chỉnh sửa
                    </a>
                </td>
                <td>
                    <a href="<?= BASE_URL ?>?act=deleteProduct&id=<?= $value['id']?>"
                    onclick="return confirm('Mày xóa thật không')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
 <?php require_once './views/courses/footer.php'; ?>
