<?php 
require_once APP_ROOT.'/app/config/database.php';
class CategoryService {
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

    public function getCategoryById($id){
        try {
            $conn = DataBase::connect();
            $stmt = $conn->prepare("SELECT * FROM categories WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
    
            $row = $stmt->fetch();
            if ($row) {
                return new Category(
                    $row['id'],
                    $row['name']
                );
            }
            return $row;
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