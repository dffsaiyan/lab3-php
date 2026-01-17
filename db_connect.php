<?php
try {
    // 1. Thong tin ket noi
    $host = "localhost";
    $dbname = "buoi2_php";
    $username = "root";
    $password = ""; // XAMPP mac dinh la rong

    // 2. Chuoi ket noi (DSN)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // 3. Tao ket noi PDO
    $conn = new PDO($dsn, $username, $password);

    // 4. Bat che do bao loi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // 5. Thong bao than thien
    die("He thong dang bao tri, vui long quay lai sau");
}
