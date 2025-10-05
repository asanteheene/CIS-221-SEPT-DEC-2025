<?php
$db = new SQLite3('fashion_store.db');
$db->exec("CREATE TABLE IF NOT EXISTS products (
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT,
price REAL,
stock INTEGER,
sold INTEGER DEFAULT 0,
image TEXT
)");
// Insert sample products
$db->exec("INSERT INTO products (name, price, stock, image) VALUES
('Red Dress', 45.00, 20, 'dress1.jpg'),
('White Sneakers', 60.00, 15, 'shoes1.jpg'),
('Leather Jacket', 120.00, 10, 'jacket1.jpg')
");
echo 'Database setup complete!';
?>