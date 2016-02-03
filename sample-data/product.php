<?php

$prices = array(
    9.99,
    19.99,
    49.99,
    99.99,
    199.99
);

$qtys = array(
    10,
    20,
    50,
    100,
    120,
    150,
    200
);

// Fetch current category IDs
$categoryIds = array();
$stmt = $DB->query('SELECT entity_id FROM category');
$_categoryIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($_categoryIds as $_categoryId) {
    $categoryIds[] = $_categoryId['entity_id'];
}

// Create sample products
for ($i=1; $i<=100; $i++) {
    $stmt = $DB->prepare("INSERT INTO product (category_entity_id, active, name, sku, price, qty) VALUES (:category_entity_id, :active, :name, :sku, :price, :qty)");

    $categoryEntityId = $categoryIds[array_rand($categoryIds)];
    $active = true;
    $name = 'Product_'.$i;
    $sku = 'the-'.$i.'-product';
    $price = $prices[array_rand($prices)];
    $qty = $qtys[array_rand($qtys)];

    $stmt->bindParam(':category_entity_id', $categoryEntityId);
    $stmt->bindParam(':active', $active);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':sku', $sku);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':qty', $qty);

    try {
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}