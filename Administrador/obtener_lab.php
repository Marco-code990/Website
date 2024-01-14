<?php
include("scripts/conection.php");

// Función para reservar los laboratorios
function reservarLaboratorio($idLaboratorio) {
    global $conn;
    $sql = "UPDATE Laboratorios SET estado = 'No disponible' WHERE id = $idLaboratorio";

    if ($conn->query($sql) === TRUE) {
        echo "Laboratorio reservado con éxito";
    } else {
        echo "Error al reservar el laboratorio: " . $conn->error;
    }

    $conn->close();
}

// Función para obtener la lista de laboratorios
function obtenerLaboratorios() {
    global $conn;
    $sql = "SELECT id, nombre, capacidad, estado FROM Laboratorios";
    $result = $conn->query($sql);

    $laboratorios = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $laboratorios[] = $row;
        }
    }

    // Devolver los resultados en formato JSON
    echo json_encode($laboratorios);

    $conn->close();
}

if (isset($_GET['reservar'])) {
    $idLaboratorio = $_GET['reservar'];
    reservarLaboratorio($idLaboratorio);
} else {
    obtenerLaboratorios();
}
?>
