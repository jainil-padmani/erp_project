<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $total_price = $_POST['total_price'];

    $stmt = $pdo->prepare("UPDATE orders SET customer_id=?, product_id=?, total_price=? WHERE id=?");
    $stmt->execute([$customer_id, $product_id, $total_price, $id]);
    header("Location: list_orders.php");
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM orders WHERE id=?");
$stmt->execute([$id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Order</title>
</head>
<body>
    <h1>Update Order</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $order['id'] ?>">
        <input type="text" name="customer_id" value="<?= $order['customer_id'] ?>" required>
        <select name="product_id" required>
            <option value="">Select Product</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>" <?= $product['id'] == $order['product_id'] ? 'selected' : '' ?>><?= $product['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" step="0.01" name="total_price" value="<?= $order['total_price'] ?>" required>
        <button type="submit">Update Order</button>
    </form>
</body>
</html>
