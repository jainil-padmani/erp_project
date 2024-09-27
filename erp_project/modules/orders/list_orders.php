<?php
include '../includes/database.php';

$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order List</title>
</head>
<body>
    <h1>Order List</h1>
    <a href="create_order.php">Create New Order</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product ID</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['customer_id'] ?></td>
                    <td><?= $order['product_id'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><?= $order['total_price'] ?></td>
                    <td>
                        <a href="update_order.php?id=<?= $order['id'] ?>">Edit</a>
                        <a href="delete_order.php?id=<?= $order['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
