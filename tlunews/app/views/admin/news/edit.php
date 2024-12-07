<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit News</h2>
    <form action="?controller=admin&action=update" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        <!-- Hidden ID -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($news->getId()); ?>">

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" 
                   value="<?=htmlspecialchars($news->getTitle()); ?>" required>
        </div>

        <!-- Content -->
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6" required><?= htmlspecialchars($news->getContent()); ?></textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <?php if (!empty($news->getImage())): ?>
                <p class="mt-2">Current Image:</p>
                <img src="<?=PATH.htmlspecialchars($news->getImage()); ?>" alt="Current Image" class="img-thumbnail" width="150">
            <?php endif; ?>
        </div>

        <!-- Created At -->
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" class="form-control" id="created_at" name="created_at" 
                   value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($news->getCreated_at()))); ?>" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->getId(); ?>" 
                            <?= ($category->getId() == $news->getCategory_id()) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($category->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" name="submit">Update News</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
