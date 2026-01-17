<?php
session_start();
include "db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM students WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["email"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Đăng nhập</title>
<style>
body {
    background: linear-gradient(135deg, #43cea2, #185a9d);
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
input, button {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
}
button {
    background: #185a9d;
    color: white;
    border: none;
}
.error {
    color: red;
    text-align: center;
}
</style>
</head>
<body>

<div class="form-box">
    <h2>Đăng nhập</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mật khẩu">
        <button>Đăng nhập</button>
    </form>
    <div class="error"><?= $error ?></div>
</div>

</body>
</html>
