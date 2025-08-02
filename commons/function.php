<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

function uploadFile($file, $folderSave) {
    $file_upload = $file;
    $fileName = rand(10000, 99999) . '_' . $file_upload['name'];

    $folderPath = PATH_ROOT . 'uploads/' . $folderSave . '/';
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0755, true); // tạo thư mục nếu chưa có
    }

    $absolutePath = $folderPath . $fileName;
    $tmp_file = $file_upload['tmp_name'];

    if (move_uploaded_file($tmp_file, $absolutePath)) {
        return $fileName; // ✅ chỉ tên file
    }
    return null;
}



function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete); // Hàm unlink dùng để xóa file
    }
}

