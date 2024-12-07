<?php
require_once('../app/config/config.php');

$controller = $_GET['controller'] ?? 'home'; 
$action = $_GET['action'] ?? 'index';

switch ($controller){
    case 'home':
        require_once APP_ROOT."/app/controllers/HomeController.php";
        $controllerObj = new HomeController();
        break;
    case 'news':
        require_once APP_ROOT."/app/controllers/NewsController.php";
        $controllerObj = new NewsController();
        break;
    case 'auth':
        require_once APP_ROOT."/app/controllers/AuthController.php";
        $controllerObj = new AuthController();
        break;
    case 'admin':
        require_once APP_ROOT."/app/controllers/AdminController.php";
        $controllerObj = new AdminController();
        break;
}

if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    die("Action không hợp lệ");
}
?>