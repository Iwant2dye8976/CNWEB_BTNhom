<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Chi tiết bài báo</title>
</head>
<body>
    <div class="container mt-5">
        <!-- Tiêu đề bài báo -->
        <h1 class="mb-4 text-center"><?= htmlspecialchars($detail->getTitle()) ?></h1>

        <!-- Ảnh bài báo -->
        <div class="text-center mb-4">
            <img src="<?= PATH.htmlspecialchars($detail->getImage()) ?>" alt="Ảnh bài báo" class="img-fluid rounded" style="max-height: 400px;">
        </div>

        <!-- Nội dung bài báo -->
        <div class="mb-4">
            <p><?= nl2br(htmlspecialchars($detail->getContent())) ?></p>
        </div>

        <!-- Ngày viết -->
        <div class="text-muted">
            <small>Ngày viết: <?= htmlspecialchars($detail->getCreated_at()) ?></small>
        </div>

        <!-- Nút quay lại -->
        <div class="mt-4">
            <a href="index.php?controller=home&action=index" class="btn btn-primary">Quay lại danh sách tin tức</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
