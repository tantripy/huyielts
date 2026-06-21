<?php
// Cho phép trình duyệt đọc/ghi dữ liệu dạng JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

// Tên file database lưu trên server
$file = 'database.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ HTML gửi lên và ghi đè vào file database.json
    $data = file_get_contents('php://input');
    file_put_contents($file, $data);
    echo json_encode(["status" => "success", "message" => "Đã lưu lên server"]);
} else {
    // Trả dữ liệu từ file database.json về cho HTML khi trang tải
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        // Nếu chưa có file (chạy lần đầu), trả về mảng rỗng
        echo json_encode(null); 
    }
}
?>