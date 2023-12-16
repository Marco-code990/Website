<?php
    include("scripts/conection.php");

    // Función para obtener la lista de laboratorios
    function obtenerReportes() {
        global $conn;
        $sql = "SELECT id, id_laboratorio, fecha_reporte, descripcion, estado FROM Reportes";
        $result = $conn->query($sql);

        $reportes = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $reportes[] = $row;
            }
        }

        return $reportes;
    }
?>