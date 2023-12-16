<?php
    include ("scripts/concection.php");

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Convertir resultados a formato JSON y enviar al cliente
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // No se encontraron resultados
        echo "Usuario no encontrado";
    }

    // Cerrar conexión
    $conn->close();
?>