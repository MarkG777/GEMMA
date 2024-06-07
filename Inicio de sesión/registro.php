<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Tienda de Relojes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Registro</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registro.php">Registro</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="registro.php" method="post" class="form-container">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrarse</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'db.php';

            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$nombre', '$email', '$password', 'usuario')";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Registro exitoso. <a href='login.php'>Inicie sesión aquí</a></p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            $conn->close();
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Tienda de joyas. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
