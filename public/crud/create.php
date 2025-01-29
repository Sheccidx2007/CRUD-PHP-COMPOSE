<?php

require_once '../../config.php';
use Ximena\Sheccid\Models\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $product = new Product($pdo);
    if ($product->create($name, $description, $price)) {
        header('Location: read.php');
        exit;
    } else {
        $error = "Error al crear el producto.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Crear Producto</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="create.php">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="price">Precio:</label>
            <input type="number" id="price" name="price" required>
            <button type="submit">Crear Producto</button>
        </form>
        <a href="read.php">Volver a la Lista de Productos</a>
    </div>
</body>
</html>