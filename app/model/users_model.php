<?php
require_once __DIR__ . '/../../config/db.php';

function users_get_all() {
    global $connection;
  
    $sql = 'SELECT * FROM users ORDER BY id DESC';
    $stmt = $connection->query($sql);
  
    return $stmt->fetchAll();
}

function users_get_by_id($id) {
    global $connection;
  
    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':id' => $id));
  
    return $stmt->fetch();
}

function users_get_by_email($email) {
    global $connection;
  
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':email' => $email));
  
    return $stmt->fetch();
}

function users_create($data) {
    global $connection;
  
    $sql = 'INSERT INTO users (firstname, lastname, email, password_hash, age, location)
            VALUES (:firstname, :lastname, :email, :password_hash, :age, :location)';
  
    $stmt = $connection->prepare($sql);
    $stmt->execute($data);
}

function users_update($id, $data) {
    global $connection;
  
    $data['id'] = $id;
    $sql = 'UPDATE users
            SET firstname = :firstname,
                lastname  = :lastname,
                email     = :email,
                age       = :age,
                location  = :location
            WHERE id = :id';
  
    $stmt = $connection->prepare($sql);
    $stmt->execute($data);
}

function users_delete($id) {
    global $connection;
  
    $sql = 'DELETE FROM users WHERE id = :id';
    $stmt = $connection->prepare($sql);
  
    $stmt->execute(array(':id' => $id));
}
