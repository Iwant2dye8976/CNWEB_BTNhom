<?php
require_once APP_ROOT.'/app/services/NewsService.php';
    class HomeController {
        public function index(){
            $n = new NewsService();
            $news = $n->getAllNews();
            $categories = $n->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }
    }
?>