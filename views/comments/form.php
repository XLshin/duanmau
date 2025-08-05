<h3>Bình luận (<?= count($comments) ?>)</h3>
<?php if (!empty($comments)): ?>
    <div class="comments-list" style="margin-bottom: 40px;">
        <?php foreach ($comments as $cmt): ?>
            <div class="comment-item" style="border-bottom: 1px solid #ddd; padding: 12px 0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong><?= htmlspecialchars($cmt['user_name']) ?></strong> 
                        <small style="color:#777; font-size: 12px; margin-left: 8px;">
                            <?= date('d/m/Y H:i', strtotime($cmt['created_at'])) ?>
                        </small>
                    </div>
                    <?php if (
                        isset($_SESSION['user']) &&
                        ($_SESSION['user']['role'] === 'admin' || $_SESSION['user']['id'] == $cmt['user_id'])
                    ): ?>
                        <a href="<?= BASE_URL ?>?act=delete-comment&id=<?= $cmt['id'] ?>&product_id=<?= $product['id'] ?>" 
                           style="color:red; font-size: 13px;" 
                           onclick="return confirm('Bạn có chắc muốn xóa bình luận này?');">Xóa</a>
                    <?php endif; ?>
                </div>
                <p style="margin: 6px 0;"><?= nl2br(htmlspecialchars($cmt['content'])) ?></p>
                <div style="color: #d43f00;">
                    Đánh giá: <?= str_repeat('★', $cmt['rating']) . str_repeat('☆', 5 - $cmt['rating']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Chưa có bình luận nào cho sản phẩm này.</p>
<?php endif; ?>
<?php if (isset($_SESSION['user'])): ?>
    <h3>Viết bình luận</h3>
    <form action="<?= BASE_URL ?>?act=add-comment" method="post" style="margin-bottom: 40px;">
        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
        <div style="margin-bottom: 10px;">
            <label for="rating">Đánh giá:</label>
            <select name="rating" id="rating" required>
                <?php for ($i = 5; $i >= 1; $i--): ?>
                    <option value="<?= $i ?>"><?= $i ?> sao</option>
                <?php endfor; ?>
            </select>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="content">Nội dung:</label><br>
            <textarea name="content" id="content" rows="4" style="width: 100%;" required></textarea>
        </div>
        <button type="submit" style="padding: 8px 16px; background-color: #d43f00; color: white; border: none; border-radius: 4px; cursor: pointer;">Gửi bình luận</button>
    </form>
<?php else: ?>
    <p>Bạn cần <a href="<?= BASE_URL ?>?act=login">đăng nhập</a> để bình luận.</p>
<?php endif; ?>


