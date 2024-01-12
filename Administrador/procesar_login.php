<?php
require('scripts/conection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Utilizar consultas preparadas para evitar la inyección SQL
    $sql = "SELECT * FROM Usuarios WHERE correo = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: page1.html");
    } else {
        echo "Credenciales incorrectas";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
}
?>

