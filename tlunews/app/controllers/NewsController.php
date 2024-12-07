<?php
require_once APP_ROOT."/app/services/NewsService.php";
require_once APP_ROOT."/app/services/CategoryService.php";
    class NewsController {
        public function index(){
            $ns = new NewsService();
            $cs = new CategoryService();
            $news = $ns->getAllNews();
            $categories = $cs->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }

        public function detail(){
            if(isset($_GET['id'])){
                $ns = new NewsService();
                $detail = $ns->getById($_GET['id']);
                include APP_ROOT."/app/views/news/detail.php";
            }
        }

        public function category(){
            if(isset($_GET['category_id'])){
                $ns = new NewsService();
                $cs = new CategoryService();
                $categories = $cs->getAllCategories();
                $news = $ns->getByCategory($_GET['category_id']);
                include APP_ROOT."/app/views/home/index.php";
            }
        }
    }
?>