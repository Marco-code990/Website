<?php
include 'scripts/conection.php';

// Obtener el correo del usuario, esto puede variar según tu implementación
$correo = $_GET['correo'];

// Consulta SQL para obtener los datos del usuario
$sentencia = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
$sentencia->bind_param("s",$correo);
$sentencia->execute();

$resultado = $sentencia->get_result();

while($fila= $resultado->fetch_assoc()){
    $usuario[]= array_map('utf8_encode',$fila);
}

echo json_encode($usuario);
$sentencia->close();
?>
