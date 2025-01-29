<?php

require_once '../../config.php';
use Ximena\Sheccid\Models\Product;

$product = new Product($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product->delete($id);
    header('Location: read.php');
    exit;
}

?>
