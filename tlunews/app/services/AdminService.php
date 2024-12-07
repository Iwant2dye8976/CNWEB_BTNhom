<?php 
require_once APP_ROOT . "/app/config/database.php";

class AdminService {
    // Thêm bài viết mới
    public function addNews($title, $content, $image, $created_at, $category_id) {
        try {
            $conn = DataBase::connect();
            if (!$conn) {
                throw new Exception("Database connection failed.");
            }

            $stmt = $conn->prepare("
                INSERT INTO news (title, content, image, created_at, category_id)
                VALUES (:title, :content, :image, :created_at, :category_id)
            ");
            $stmt->execute([
                "title" => $title,
                "content" => $content,
                "image" => $image,
                "created_at" => $created_at,
                "category_id" => $category_id,
            ]);

        } catch (PDOException $e) {
            error_log("Database Error in addNews: " . $e->getMessage());
        }
    }

    // Chỉnh sửa bài viết
    public function editNews($id, $title, $content, $image, $created_at, $category_id) {
        try {
            $conn = DataBase::connect();
            if (!$conn) {
                throw new Exception("Database connection failed.");
            }

            // Kiểm tra xem `image` có cần cập nhật không
            $query = "
                UPDATE news 
                SET title = :title, content = :content, created_at = :created_at, category_id = :category_id
            ";
            $params = [
                "title" => $title,
                "content" => $content,
                "created_at" => $created_at,
                "category_id" => $category_id,
                "id" => $id,
            ];

            if (!empty($image)) {
                $query .= ", image = :image";
                $params["image"] = $image;
            }

            $query .= " WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

        } catch (PDOException $e) {
            error_log("Database Error in editNews: " . $e->getMessage());
        }
    }
    public function deleteNews($id) {
        try {
            $conn = DataBase::connect();
            if (!$conn) {
                throw new Exception("Database connection failed.");
            }
    
            $stmt = $conn->prepare("DELETE FROM news WHERE id = :id");
            $stmt->execute(["id" => $id]);
    
        } catch (PDOException $e) {
            error_log("Database Error in deleteNews: " . $e->getMessage());
        }
    }    
}
?>
