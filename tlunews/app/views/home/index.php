<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Danh sách tin tức</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Danh sách tin tức</h1>

    <!-- Bộ lọc danh mục -->
    <form method="GET" action="" class="mb-4">
    <input type="hidden" name="controller" value="news">
    <input type="hidden" name="action" value="category">
    <div class="row">
        <div class="col-md-4">
            <select name="category_id" class="form-select" onchange="this.form.submit()">
                <option value="" disabled selected>Chọn danh mục</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->getID(); ?>" 
                        <?= (isset($_GET['category_id']) && $_GET['category_id'] == $category->getID()) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($category->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>

    <!-- Danh sách tin tức -->
    <div class="row">
        <?php if (empty($news)): ?>
            <p>Không có tin tức nào thuộc danh mục này.</p>
        <?php else: ?>
            <?php foreach ($news as $item): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= $item->getImage(); ?>" class="card-img-top" alt="Ảnh tin tức">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->getTitle(); ?></h5>
                            <a href="index.php?controller=news&action=detail&id=<?= $item->getId(); ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
