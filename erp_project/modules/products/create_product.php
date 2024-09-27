<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $cost = $_POST['cost'];
    
    $stmt = $pdo->prepare("INSERT INTO products (name, category, price, cost) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $category, $price, $cost]);
    header("Location: list_products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create Product</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="number" step="0.01" name="cost" placeholder="Cost" required>
        <button type="submit">Create Product</button>
    </form>
</body>
</html>
