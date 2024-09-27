<?php
include '../includes/database.php';

$stmt = $pdo->query("SELECT * FROM stocks");
$stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock List</title>
</head>
<body>
    <h1>Stock List</h1>
    <a href="manage_stock.php">Manage Stock</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Batch No</th>
                <th>Expiry Date</th>
                <th>Manufactured Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock): ?>
                <tr>
                    <td><?= $stock['id'] ?></td>
                    <td><?= $stock['product_id'] ?></td>
                    <td><?= $stock['quantity'] ?></td>
                    <td><?= $stock['batch_no'] ?></td>
                    <td><?= $stock['expiry_date'] ?></td>
                    <td><?= $stock['manufactured_at'] ?></td>
                    <td>
                        <a href="delete_stock.php?id=<?= $stock['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
