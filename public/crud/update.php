<?php

require_once '../../config.php';
use Ximena\Sheccid\Models\Product;

$product = new Product($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
    $stmt->execute(['id' => $id]);
    $productToUpdate = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if ($product->update($id, $name, $description, $price)) {
        header('Location: read.php');
        exit;
    } else {
        $error = "Error al actualizar el producto.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $productToUpdate['id'] ?>">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($productToUpdate['name']) ?>" required>
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($productToUpdate['description']) ?></textarea>
        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" value="<?= number_format($productToUpdate['price'], 2) ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>