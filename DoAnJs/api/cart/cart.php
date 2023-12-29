<?php 
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra yêu cầu AJAX và kiểm tra quyền truy cập
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Lấy thông tin sản phẩm từ yêu cầu AJAX
$product = $_POST['product'];
$product = json_decode($product);

// Thêm sản phẩm vào cơ sở dữ liệu
$sql = "INSERT INTO order_items (product_id, name, price, quantity, created_at)
        VALUES ('$product->id', '$product->name', '$product->price', 1, NOW())";
$conn->query($sql);

// Truy vấn cơ sở dữ liệu để lấy thông tin giỏ hàng
$sql = "SELECT * FROM order_items";
$result = $conn->query($sql);
$order_items_data = array();
while ($row = $result->fetch_assoc()) {
    $order_items_data[] = $row;
}

// Trả về dữ liệu giỏ hàng dưới dạng JSON
echo json_encode($order_items_data);

// Thêm một số mục vào giỏ hàng
$sql = "INSERT INTO cart_items (product_name, product_price, quantity)
        VALUES
        ('Sản phẩm 1', 10.99, 2),
        ('Sản phẩm 2', 19.99, 1),
        ('Sản phẩm 3', 5.99, 3)";

if ($conn->query($sql) === TRUE) {
    echo "Thêm mục vào giỏ hàng thành công.";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>