<?php
require_once APP_ROOT."/app/models/News.php";
require_once APP_ROOT."/app/models/Category.php";
require_once APP_ROOT."/app/config/database.php";
class NewsService {
    public function getAllNews() {
        try{
            $conn = DataBase::connect();
            $stmt = $conn->query("SELECT * FROM news");
            $news_ = [];
            while($row = $stmt->fetch()){
                $news = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
                $news_[] = $news;
            }
            return $news_;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            
            $conn = DataBase::connect();            
            $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
    
            $row = $stmt->fetch();
            if ($row) {
                return new News(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['created_at'],
                    $row['category_id']
                );
            }

            return $row;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
            return null; 
        }
    }

    public function getAllCategories(){
        try {
            $conn = DataBase::connect();
            $stmt = $conn->query("SELECT * FROM categories");
            $categories_ = [];
            while($row = $stmt->fetch()){
                $categories = new Category($row['id'], $row['name']);
                $categories_[] = $categories;
            }
            return $categories_;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
            return null; 
        }
    }

    public function getByCategory($category_id) {
        try {
            $conn = DataBase::connect();
            $stmt = $conn->prepare("SELECT * FROM news WHERE category_id=:category_id");
            $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT); 
            $stmt->execute();
            $news_c = [];
            while($row = $stmt->fetch()){
                $news = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
                $news_c[] = $news;
            }
            return $news_c;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
            return null; 
        }
    }

    public function getNewsCount(){
        try {
            $conn = DataBase::connect();
            $stmt = $conn->prepare("SELECT COUNT(id) FROM news");
            $stmt->execute();
            $news_count = $stmt->fetchColumn(); // Lấy số lượng bản ghi từ cột đầu tiên của kết quả
            return $news_count;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
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
    public function getCategoryCount(){
        try {
            $conn = DataBase::connect();
            $stmt = $conn->prepare("SELECT COUNT(id) FROM categories");
            $stmt->execute();
            $categories_count = $stmt->fetchColumn(); // Lấy số lượng bản ghi từ cột đầu tiên của kết quả
            return $categories_count;
        } catch (PDOException $e) {
         
            echo "Lỗi kết nối: " . $e->getMessage();
            return null; 
        }
    }
}
?>