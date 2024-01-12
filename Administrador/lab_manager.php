<?php
    include("scripts/conection.php");

    // Función para obtener la lista de laboratorios
    function obtenerLaboratorios() {
        global $conn;
        $sql = "SELECT id, nombre, capacidad, estado FROM Laboratorios";
        $result = $conn->query($sql);

        $laboratorios = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $laboratorios[] = $row;
            }
        }

        return $laboratorios;
    }

    // Función para actualizar el estado de un laboratorio
    function actualizarEstado($id, $nuevoEstado) {
        global $conn;
        $sql = "UPDATE Laboratorios SET estado='$nuevoEstado' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
?>