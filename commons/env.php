<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/D%e1%bb%b1%20%c3%a1n%20m%e1%ba%abu/mvc-oop-basic-duanmau/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duanmau');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
define('BASE_UPLOADS',   BASE_URL . 'uploads/imgproduct');
define('PATH_UPLOADS', PATH_ROOT . 'uploads/imgproduct/');