<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Inventory - Fashion Store</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Inventory & Sales</h2>
<table>
<tr>
<th>Product</th><th>Price</th><th>Stock</th><th>Sold</th><th>Revenue</th>
</tr>
<?php
$results = $db->query("SELECT * FROM products");
$totalRevenue = 0;
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
$revenue = $row['sold'] * $row['price'];
$totalRevenue += $revenue;
echo "<tr>
<td>{$row['name']}</td>
<td>\${$row['price']}</td>
<td>{$row['stock']}</td>
<td>{$row['sold']}</td>
<td>\${$revenue}</td>
</tr>";
echo "<tr><td colspan='4'><strong>Total Revenue</strong></td><td><strong>\${$totalRevenue}</
}
?>
</table>
</body>
</html>