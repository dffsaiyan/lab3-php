<?php
include "db_connect.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $message = "Vui lòng nhập đầy đủ thông tin";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO students (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        try {
            $stmt->execute([$email, $password_hash]);
            $message = "🎉 Đăng ký thành công! Hãy đăng nhập.";
        } catch (PDOException $e) {
            $message = "⚠ Email đã tồn tại hoặc lỗi hệ thống";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng ký</title>
<style>
body {
    background: linear-gradient(135deg, #667eea, #764ba2);
    font-family: Arial;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.form-box {
    background: white;
    padding: 30px;
    width: 360px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}
h2 {
    text-align: center;
    margin-bottom: 20px;
}
input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
button {
    width: 100%;
    padding: 12px;
    border: none;
    background: #667eea;
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
}
.message {
    text-align: center;
    margin-top: 15px;
    color: #333;
}
a {
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
}
</style>
</head>
<body>

<div class="form-box">
    <h2>Đăng ký</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mật khẩu">
        <button type="submit">Tạo tài khoản</button>
    </form>
    <div class="message"><?= $message ?></div>
    <a href="login.php">Đã có tài khoản? Đăng nhập</a>
</div>

</body>
</html>
