<?php
require_once __DIR__ . '/../../config/db.php';

function products_get_all() {
    global $connection;
  
    $sql = 'SELECT * FROM products ORDER BY created_at DESC';
    $stmt = $connection->query($sql);
  
    return $stmt->fetchAll();
}

function products_get_by_id($id) {
    global $connection;
  
    $sql = 'SELECT * FROM products WHERE id = :id';
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':id' => $id));
  
    return $stmt->fetch();
}

function products_create($data) {
    global $connection;
  
    $sql = 'INSERT INTO products (name, description, price, stock, image_path, category)
            VALUES (:name, :description, :price, :stock, :image_path, :category)';
    $stmt = $connection->prepare($sql);
  
    $stmt->execute($data);
}

function products_update($id, $data) {
    global $connection;
  
    $data['id'] = $id;
    $sql = 'UPDATE products
            SET name = :name,
                description = :description,
                price = :price,
                stock = :stock,
                image_path = :image_path,
                category = :category
            WHERE id = :id';
  
    $stmt = $connection->prepare($sql);
    $stmt->execute($data);
}

function products_delete($id) {
    global $connection;
  
    $sql = 'DELETE FROM products WHERE id = :id';
    $stmt = $connection->prepare($sql);
  
    $stmt->execute(array(':id' => $id));
}
