<?php

namespace Ximena\Sheccid\Models;

use PDO;

class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Crear un producto
     */
    public function create($name, $description, $price) {
        $stmt = $this->pdo->prepare('INSERT INTO products (name, description, price) VALUES (:name, :description, :price)');
        return $stmt->execute(['name' => $name, 'description' => $description, 'price' => $price]);
    }

    /**
     * Leer todos los productos
     */
    public function read() {
        $stmt = $this->pdo->query('SELECT * FROM products');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Actualizar un producto
     */
    public function update($id, $name, $description, $price) {
        $stmt = $this->pdo->prepare('UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id');
        return $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description, 'price' => $price]);
    }

    /**
     * Eliminar un producto
     */
    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

    public function getAllProducts() {

        $stmt = $this->pdo->query('SELECT * FROM products');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

