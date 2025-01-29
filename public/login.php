<?php

require_once '../config.php';
use Ximena\Sheccid\Models\User;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($pdo);
    $authenticatedUser = $user->login($username, $password);

    if ($authenticatedUser) {
        $_SESSION['user_id'] = $authenticatedUser['id'];
        $_SESSION['username'] = $authenticatedUser['username'];
        $_SESSION['role'] = $authenticatedUser['role'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>