<?php
require_once APP_ROOT."/app/services/NewsService.php";
    class NewsController {
        public function index(){
            $n = new NewsService();
            $news = $n->getAllNews();
            $categories = $n->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }

        public function detail(){
            if(isset($_GET['id'])){
                $n = new NewsService();
                $detail = $n->getById($_GET['id']);
                include APP_ROOT."/app/views/news/detail.php";
            }
        }

        public function category(){
            if(isset($_GET['category_id'])){
                $n = new NewsService();
                $categories = $n->getAllCategories();
                $news = $n->getByCategory($_GET['category_id']);
                include APP_ROOT."/app/views/home/index.php";
            }
        }
    }
?>