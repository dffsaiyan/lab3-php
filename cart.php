<?php
session_start();

$products = [
    1 => "Laptop",
    2 => "Chuột",
    3 => "Bàn phím",
    4 => "Tai nghe"
];

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (isset($_GET["add"])) {
    $_SESSION["cart"][] = $_GET["add"];

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Giỏ hàng</title>
<style>
body { font-family: Arial; padding: 40px; }
.product, .cart {
    margin-bottom: 20px;
}
a {
    margin-left: 10px;
    text-decoration: none;
    color: blue;
}
</style>
</head>
<body>

<h2>🛍️ Sản phẩm</h2>
<?php foreach ($products as $id => $name): ?>
<div class="product">
    <?= $name ?>
    <a href="?add=<?= $id ?>">Thêm vào giỏ</a>
</div>
<?php endforeach; ?>

<h2>🛒 Giỏ hàng</h2>
<div class="cart">
<?php
if (count($_SESSION["cart"]) == 0) {
    echo "Giỏ hàng trống";
} else {
    foreach ($_SESSION["cart"] as $pid) {
        echo "- " . $products[$pid] . "<br>";
    }
}
?>
</div>

</body>
</html>
