<?php
session_start();
if ($_SESSION['rol'] != 'usuario') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario - Tienda de joyas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Panel de Usuario</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
        <p>Panel de usuario.</p>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de joyas. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
