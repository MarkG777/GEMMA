<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tienda de joyas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="login.php">
    <link rel="stylesheet" href="registro.php">
</head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registro.php">Registro</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="login.php" method="post" class="form-container">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Ingresar</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'db.php';

            $email = $_POST['email'];
            $password = md5($_POST['password']);

            $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                session_start();
                $row = $result->fetch_assoc();
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['email'] = $row['email'];

                if ($row['rol'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: usuario.php");
                }
            } else {
                echo "<p>Correo o contraseña incorrectos</p>";
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
