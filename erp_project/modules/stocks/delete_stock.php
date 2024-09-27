<?php
include '../includes/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM stocks WHERE id=?");
$stmt->execute([$id]);
header("Location: list_stocks.php");
?>
