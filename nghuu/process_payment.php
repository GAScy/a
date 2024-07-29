<?php
// Kiểm tra nếu phương thức yêu cầu là POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $bank = $_POST['bank'];
    $account = $_POST['account'];

    // Xử lý thanh toán (ví dụ: lưu thông tin vào cơ sở dữ liệu, gửi email xác nhận, v.v.)
    // Ở đây chỉ đơn giản là hiển thị thông tin đã nhận được

    // Kết nối tới cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nguyenhuu_tea";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Chuẩn bị và thực thi câu lệnh SQL để chèn dữ liệu
    $sql = "INSERT INTO payments (name, address, bank, account) VALUES ('$name', '$address', '$bank', '$account')";

    if ($conn->query($sql) === TRUE) {
        echo "Thanh toán của bạn đã được xử lý thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Phương thức yêu cầu không hợp lệ.";
}
?>
