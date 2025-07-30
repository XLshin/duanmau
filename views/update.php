<form action="<?=  BASE_URL ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="">Name</label>
        <input type="text" name="name" id="">
    </div>
    <div>
        <label for="">description</label>
        <input type="text" name="description" id="">
    </div>
    <div>
        <label for="">Price</label>
        <input type="number" name="price" id="">
    </div>
    <div>
        <label for="">Category</label>
        <select name="category_id" id="">
            <?php foreach($data as $value): ?>
                <option value="<?= $value['id'] ?>">
                    <?= $value['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="">Brand</label>
        <input type="text" name="brand" id="">
    </div>
    <div>
        <label for="">Image</label>
        <input type="file" name="image" id="">
    </div>
    <button>Thêm mới</button>
</form>