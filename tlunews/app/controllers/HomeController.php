<?php
require_once APP_ROOT.'/app/services/NewsService.php';
require_once APP_ROOT.'/app/services/CategoryService.php';
    class HomeController {
        public function index(){
            $ns = new NewsService();
            $cs = new CategoryService();
            $news = $ns->getAllNews();
            $categories = $cs->getAllCategories();
            include APP_ROOT."/app/views/home/index.php";
        }
    }
?>