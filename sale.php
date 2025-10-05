<?php
include 'db.php';
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);
// Check stock
$stmt = $db->prepare("SELECT stock FROM products WHERE id = :id");
$stmt->bindValue(':id', $product_id, SQLITE3_INTEGER);
$result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
if ($result && $result['stock'] >= $quantity) {
$db->exec("UPDATE products
SET sold = sold + $quantity, stock = stock - $quantity
WHERE id = $product_id");
}
header("Location: inventory.php");
}
?>