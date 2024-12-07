<?php
session_start();
require_once APP_ROOT . "/app/services/UserService.php";
require_once APP_ROOT."/app/services/NewsService.php";

class AuthController {
    public function index() {
        // Hiển thị form đăng nhập
        include APP_ROOT . "/app/views/admin/login.php";
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $us = new UserService();

            // Lấy thông tin người dùng
            $user = $us->getUser($username, $password);

            // Kiểm tra thông tin đăng nhập
            if ($user) {
                session_regenerate_id(true); // Bảo vệ session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $n = new NewsService();
                $news = $n->getAllNews();
                // Điều hướng dựa trên vai trò
                if ($user['role'] === 0) {
                    header("Location: ?controller=admin&action=dashboard");
                } else {
                    include APP_ROOT."/app/views/home/index.php";
                }
                exit();
            } else {
                // Thông báo lỗi
                $error = "Tài khoản hoặc mật khẩu không đúng!";
                $_SESSION['error'] = "Invalid username or password.";
                exit();
            }
        }
    }

    public function logout() {
        // Hủy session và chuyển hướng
        session_unset();
        session_destroy();
        header('Location: ?controller=auth&action=index');
        exit();
    }
}
?>
