<?php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <p><a href="crud/read.php">Ir al CRUD de Productos</a></p>
    <p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>
