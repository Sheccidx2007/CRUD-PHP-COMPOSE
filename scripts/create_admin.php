<?php

require_once '../config.php';

$username = 'sheccid';
$password = password_hash('sheccid', PASSWORD_DEFAULT);
$role = 'superuser';

$stmt = $pdo->prepare('INSERT INTO users (username, password, role) VALUES (:username, :password, :role)');
$stmt->execute(['username' => $username, 'password' => $password, 'role' => $role]);

echo "Superusuario creado con éxito.";
?>