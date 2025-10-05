<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fashion Store</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
<h1>Fashion Store</h1>
</header>
<section class="products">
<h2>Latest Fashion</h2>
<div class="product-grid">
<?php
$results = $db->query("SELECT * FROM products");
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
echo "
<div class='product'>
<img src='images/{$row['image']}' alt='{$row['name']}'>
<h3>{$row['name']}</h3>
<p>\${$row['price']}</p>
<p><strong>Stock:</strong> {$row['stock']}</p>
<form action='add_sale.php' method='POST'>
<input type='hidden' name='product_id' value='{$row['id']}'>
<input type='number' name='quantity' min='1' max='{$row['stock']}' value='1' requi
<button type='submit'>Buy Now</button>
</form>
</div>
";
}
?>
</div>
</section>
</body>
</html>