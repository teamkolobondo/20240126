<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>

<h2>Registro de Usuario</h2>

<form action="" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required><br>

    <input type="submit" value="Registrar">
</form>

<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (ajusta las credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    // Insertar datos en la tabla
    $sql = "INSERT INTO usuarios (nombre, contraseña) VALUES ('$nombre', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='index.php'>Volver al formulario</a>";
    } else {
        echo "Error al registrar: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

</body>
</html>