<?php
    include("scripts/conection.php");
    
    $id_laboratorio = $_POST['id_laboratorio'];
    $id_docente = $_POST['id_docente'];
    $fecha_reporte = $_POST['fecha_reporte'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    //Utilizamos una consulta preparada para prevenir inyecciones de SQL
    $insertar = "INSERT INTO reportes (id_laboratorio, fecha_reporte, descripcion) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertar);

    // Verificamos si la preparación de la consulta fue exitosa
    if ($stmt) {
        // Unimos los parámetros a la consulta preparada
        mysqli_stmt_bind_param($stmt, "sss", $id_laboratorio, $fecha_reporte, $descripcion);

        // Ejecutamos la consulta preparada
        $sql = mysqli_stmt_execute($stmt);

        // Verificamos si la ejecución fue exitosa
        if ($sql) {
            echo"reporte enviado";
        } else {
            echo "Error al registrar usuario: " . mysqli_error($conn);
        }

        // Cerramos la consulta preparada
        mysqli_stmt_close($stmt);
    } 
    else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conn);
    }
    $conn->close();
?>