<?php require_once './views/courses/header.php'; ?>
<table>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

table {
    width: 95%;
    margin: 40px auto;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #333;
}

th {
    background-color: #444;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 0.5px;
}

tr:hover {
    background-color: #f0f0f0;
}

img {
    width: 80px;
    height: auto;
    border-radius: 6px;
    border: 1px solid #ccc;
    object-fit: cover;
}

/* Responsive table for small screens */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    th, td {
        padding: 10px;
    }

    img {
        width: 60px;
    }
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
            <tr>
                <td><?= $data['name'] ?></td>
                <td><?= $data['description'] ?></td>
                <td><?= number_format($data['price']) ?></td>
                <td><?= $data['categoryName'] ?></td>
                <td><?= $data['brand'] ?></td>
                <td>                    
                    <img src="<?= BASE_UPLOADS . '/' . $data['image'] ?>"  width="100">
                </td>
                <td><?= $data['created_at'] ?></td>
                
            </tr>
    </tbody>
</table>
 <?php require_once './views/courses/footer.php'; ?>
