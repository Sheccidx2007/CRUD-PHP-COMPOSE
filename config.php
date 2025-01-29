<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Cargar las variables de entorno desde el archivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Verificar que las variables de entorno se han cargado correctamente
if (!isset($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'])) {
    die('Error: Una o más variables de entorno no están definidas.');
}

// Conectar a la base de datos
try {
    $pdo = new PDO(
        'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'] ?? ''
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}