<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        /* Tùy chỉnh kích thước các cột trong bảng */
        .table td, .table th {
            vertical-align: middle;
        }
        .table img {
            width: 100px;
            height: auto;
        }
        .table td:nth-child(1), .table th:nth-child(1) {
            width: 50px; /* Cột # */
        }
        .table td:nth-child(2), .table th:nth-child(2) {
            width: 200px; /* Cột Title */
        }
        .table td:nth-child(3), .table th:nth-child(3) {
            width: 250px; /* Cột Content */
        }
        .table td:nth-child(4), .table th:nth-child(4) {
            width: 150px; /* Cột Image */
        }
        .table td:nth-child(5), .table th:nth-child(5) {
            width: 150px; /* Cột Date */
        }
        .table td:nth-child(6), .table th:nth-child(6) {
            width: 100px; /* Cột Category Id */
        }
        .table td:nth-child(7), .table th:nth-child(7) {
            width: 150px; /* Cột Actions */
        }
    </style>
</head>
<body>  
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand">Admin Dashboard</span>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome, Admin!</h1>
        <p>Here is the overview of your website.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-newspaper"></i> Total News</h5>
                        <p class="card-text"><?= $n->getNewsCount()?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Total Users</h5>
                        <p class="card-text"><?= $n->getUserCount();?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-folder"></i> Total Categories</h5>
                        <p class="card-text"><?= $n->getCategoryCount();?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start gap-3">
            <a href="?controller=admin&action=add" class="btn btn-success">Add news</a>
            <a href="?controller=admin&action=index" class="btn btn-info">View News Wall</a>
            <a href="?controller=auth&action=logout" class="btn btn-danger">Log Out</a>
        </div>
        <!-- Example Table -->
        <h2 class="mt-5">News</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Category Id</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($news as $item){?>
                <tr>
                    <td><?=$item->getID()?></td>
                    <td><?=$item->getTitle()?></td>
                    <td><?=$item->getContent()?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <img src="<?= PATH.$item->getImage();?>" style="height:120px;width:120px;">
                        </div>
                    </td>
                    <td><?=$item->getCreated_at()?></td>
                    <td><?=$item->getCategory_id()?></td>
                    <td>
                        <a href="?controller=admin&action=edit&id=<?= $item->getID()?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                        <a href="?controller=admin&action=delete&id=<?= $item->getID()?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php }; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
