<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<style>
body {
    font-family: Arial;
    background: #f4f6f8;
    padding: 40px;
}
.box {
    background: white;
    padding: 30px;
    max-width: 500px;
    margin: auto;
    border-radius: 10px;
    text-align: center;
}
a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: white;
    background: #e74c3c;
    padding: 10px 20px;
    border-radius: 6px;
}
</style>
</head>
<body>

<div class="box">
    <h2>Xin chào 👋</h2>
    <p><?= $_SESSION["user"] ?></p>
    <a href="logout.php">Đăng xuất</a>
</div>

</body>
</html>
