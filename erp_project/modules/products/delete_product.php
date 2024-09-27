<?php
include '../includes/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
$stmt->execute([$id]);
header("Location: list_products.php");
?>
