<?php
class DataBase {
    private static $host = '127.0.0.1';
    private static $db = 'tintuc';
    private static $user = 'root';
    private static $pass = '';
    private static $charset = 'utf8mb4';

    public static function connect() {
        try {
            // Chuỗi DSN kết nối PDO
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            
            // Tạo kết nối PDO
            $conn = new PDO($dsn, self::$user, self::$pass);

            // Thiết lập chế độ lỗi PDO
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; // Trả về kết nối PDO
        } catch (\PDOException $e) {
            die('Kết nối thất bại: ' . $e->getMessage());
        }
    }
}
?>
