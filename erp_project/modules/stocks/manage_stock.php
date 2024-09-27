<?php
include '../includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $batch_no = $_POST['batch_no'];
    $expiry_date = $_POST['expiry_date'];
    $manufactured_at = $_POST['manufactured_at'];

    $stmt = $pdo->prepare("INSERT INTO stocks (product_id, quantity, batch_no, expiry_date, manufactured_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$product_id, $quantity, $batch_no, $expiry_date, $manufactured_at]);
    header("Location: list_stocks.php");
}

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Stock</title>
</head>
<body>
    <h1>Manage Stock</h1>
    <form method="POST">
        <select name="product_id" required>
            <option value="">Select Product</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="text" name="batch_no" placeholder="Batch Number" required>
        <input type="date" name="expiry_date" placeholder="Expiry Date" required>
        <input type="date" name="manufactured_at" placeholder="Manufactured Date" required>
        <button type="submit">Add Stock</button>
    </form>
</body>
</html>
