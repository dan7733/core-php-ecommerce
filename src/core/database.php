<?php
class database {
    const HOST = 'db';
    const USERNAME = 'user';
    const PASSWORD = 'pass';
    const DBNAME = 'core_php_ecommerce';

    public function connect(){
        $maxRetries = 5;     // số lần thử lại
        $delay = 2;          // thời gian chờ (giây)
        $attempt = 0;

        while ($attempt < $maxRetries) {
            $conn = @mysqli_connect(
                self::HOST,
                self::USERNAME,
                self::PASSWORD,
                self::DBNAME
            );

            if ($conn) {
                // kết nối thành công
                return $conn;
            }

            $attempt++;
            sleep($delay);
        }

        // nếu fail sau nhiều lần
        die("Kết nối DB thất bại sau {$maxRetries} lần: " . mysqli_connect_error());
    }
}
?>