<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];

    $stmt = $pdo->prepare("UPDATE products SET name=?, category=?, price=?, cost=? WHERE id=?");
    $stmt->execute([$name, $category, $price, $cost, $id]);
    header("Location: list_products.php");
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>
    <h1>Update Product</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <input type="text" name="name" value="<?= $product['name'] ?>" required>
        <input type="text" name="category" value="<?= $product['category'] ?>" required>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
        <input type="number" step="0.01" name="cost" value="<?= $product['cost'] ?>" required>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
