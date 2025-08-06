<?php require_once './views/layouts/layoutAdmin.php'; ?>

<h2 style="margin-bottom: 20px;">Danh sách bình luận</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>Người dùng</th>
            <th>Nội dung</th>
            <th>Thời gian</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <td><?= $comment['id'] ?></td>
                    <td><?= htmlspecialchars($comment['product_name']) ?></td>
                    <td><?= htmlspecialchars($comment['user_name']) ?></td>
                    <td><?= nl2br(htmlspecialchars($comment['content'])) ?></td>
                    <td><?= $comment['created_at'] ?></td>
                    <td>
                        <a href="index.php?act=admin-comment-delete&id=<?= $comment['id'] ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">
                        Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" style="text-align: center;">Không có bình luận nào.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<style>
    table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    background: #fff;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

thead tr {
    background-color: #2c3e50;
    color: #ecf0f1;
    text-align: left;
    font-weight: bold;
}

thead th, tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

tbody tr:last-child td {
    border-bottom: none;
}

a {
    color: #e74c3c;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

a:hover {
    color: #c0392b;
}

/* Cột ID (cột đầu tiên) */
td:first-child, th:first-child {
    text-align: center;
    width: 30px; /* hoặc bạn muốn kích thước nào */
}

/* Cột Thời gian (cột thứ 5) */
td:nth-child(5), th:nth-child(5) {
    text-align: center;
    width: 100px; /* ví dụ rộng hơn */
}


/* Căn giữa nút Xóa */
td:last-child {
    text-align: center;
    width: 100px;
}

/* Giảm chiều rộng cột Sản phẩm và Người dùng */
th:nth-child(2), td:nth-child(2),
th:nth-child(3), td:nth-child(3) {
    width: 130px; /* nhỏ hơn chút */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Cột nội dung rộng hơn */
th:nth-child(4), td:nth-child(4) {
    width: auto;  /* chiếm phần lớn còn lại */
    max-width: 600px; /* giới hạn tối đa nếu muốn */
    white-space: normal;
    word-wrap: break-word;
}

/* Tiêu đề */
h2 {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: 700;
    color: #34495e;
    margin-bottom: 25px;
}

</style>