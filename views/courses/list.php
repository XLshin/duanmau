<table>
    <thead>
        <tr>
            <th>ID</th>
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
                <td><?= $value['id'] ?></td>
                <td><?= $value['name'] ?></td>
                <td><?= $value['description'] ?></td>
                <td><?= number_format($value['price']) ?></td>
                <td><?= $value['category_id'] ?></td>
                <td><?= $value['brand'] ?></td>
                <td>
                    <img src="<?= BASE_URL . $value['image'] ?>" alt="<?= $value['name'] ?>" width="100">
                </td>
                <td><?= $value['created_at'] ?></td>

            </tr>
            <?php endforeach; ?>
    </tbody>
</table>