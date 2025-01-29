<?php

require_once '../../config.php';
use Ximena\Sheccid\Models\Product;

$product = new Product($pdo);
$products = $product->getAllProducts();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="create.php">Crear Producto</a> | <a href="../dashboard.php">Volver al Dashboard</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id']; ?>">Editar</a>
                        <a href="delete.php?id=<?php echo $product['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>