<?php
include '../includes/database.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    <a href="create_product.php">Create New Product</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['cost'] ?></td>
                    <td>
                        <a href="update_product.php?id=<?= $product['id'] ?>">Edit</a>
                        <a href="delete_product.php?id=<?= $product['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
