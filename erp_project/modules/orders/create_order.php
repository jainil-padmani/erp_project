<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $total_price = $_POST['total_price'];
    
    $stmt = $pdo->prepare("INSERT INTO orders (customer_id, product_id, status, total_price) VALUES (?, ?, 'upcoming', ?)");
    $stmt->execute([$customer_id, $product_id, $total_price]);
    header("Location: list_orders.php");
}

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>
    <h1>Create Order</h1>
    <form method="POST">
        <input type="text" name="customer_id" placeholder="Customer ID" required>
        <select name="product_id" required>
            <option value="">Select Product</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" step="0.01" name="total_price" placeholder="Total Price" required>
        <button type="submit">Create Order</button>
    </form>
</body>
</html>
