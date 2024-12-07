<?php
require_once APP_ROOT . "/app/models/User.php";
require_once APP_ROOT . "/app/config/database.php";

class UserService {
    public function getUser($username, $password) {
        try {
            $conn = DataBase::connect();

            // Truy vấn thông tin người dùng dựa trên username
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
            $stmt->execute(["username" => $username, "password" => $password]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user; // Trả về thông tin người dùng nếu hợp lệ
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return null;
        }
    }

    public function getUserCount(){
        try {
            $conn = DataBase::connect();
            $stmt = $conn->prepare("SELECT COUNT(id) FROM users WHERE role = 1");
            $stmt->execute();
            $users_count = $stmt->fetchColumn(); // Lấy số lượng bản ghi từ cột đầu tiên của kết quả
            return $users_count;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
            return null; 
        }
    }
}
?>