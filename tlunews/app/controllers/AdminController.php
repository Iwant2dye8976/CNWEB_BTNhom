<?php
require_once APP_ROOT."/app/services/AdminService.php";
require_once APP_ROOT."/app/services/NewsService.php";
// require_once APP_ROOT."/app/config/database.php";

class AdminController {
    public function index() {
        $n = new NewsService();
        $news = $n->getAllNews();
        include APP_ROOT."/app/views/admin/news/index.php";
    }

    public function dashboard(){
        $n = new NewsService();
        $news = $n->getAllNews();
        include APP_ROOT."/app/views/admin/dashboard.php";
    }

    public function add(){
        $n = new NewsService();
        $categories = $n->getAllCategories();
        include APP_ROOT."/app/views/admin/news/add.php";
    }

    public function edit(){
        $n = new NewsService();
        $id = $_GET['id'];
        $news = $n->getById($id);
        $categories = $n->getAllCategories();
        include APP_ROOT."/app/views/admin/news/edit.php";
    }

    public function delete(){
        $id = $_GET['id'];
        $as =  new AdminService();
        $as->deleteNews($id);
        header("Location: ?controller=admin&action=dashboard");
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $as = new AdminService();
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = "/".$_FILES['image']['name'];
            $created_at = $_POST['created_at'];
            $category_id = $_POST['category_id'];
            $as->addNews($title,$content,$image,$created_at,$category_id);
            header("Location: ?controller=admin&action=dashboard");
        }
    }

    public function update(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $as = new AdminService();
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = "/".$_FILES['image']['name'];
            $created_at = $_POST['created_at'];
            $category_id = $_POST['category_id'];
            $as->editNews($id,$title,$content,$image,$created_at,$category_id);
            header("Location: ?controller=admin&action=dashboard");
        }
    }
}
?>