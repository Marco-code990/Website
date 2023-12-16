<?php
    include("scripts/conection.php");
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['contraseña'];
    $tipo = $_POST['tipo_usuario'];

    if (isset($_POST['insertar'])) {
        // Utilizamos una consulta preparada para prevenir inyecciones de SQL
        $insertar = "INSERT INTO Usuarios (nombre, correo, contraseña, tipo_usuario) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertar);

        // Verificamos si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Unimos los parámetros a la consulta preparada
            mysqli_stmt_bind_param($stmt, "ssss", $nombre, $correo, $password, $tipo);

            // Ejecutamos la consulta preparada
            $sql = mysqli_stmt_execute($stmt);

            // Verificamos si la ejecución fue exitosa
            if ($sql) {
                header("Location: page2.php");
            } else {
                echo "Error al registrar usuario: " . mysqli_error($conn);
            }

            // Cerramos la consulta preparada
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['consultar'])) {
        $consultar = "SELECT * FROM Usuarios";
        $sql = mysqli_query($conn, $consultar);

        if($sql){
            while($ver= mysqli_fetch_array($sql)) {
                echo $ver['id'];
                echo " ";
                echo $ver['nombre'];
                echo " ";
                echo $ver['correo'];
                echo " ";
                echo $ver['contraseña'];
                echo " ";
                echo $ver['tipo_usuario'];
                echo "<br><hr>";
            }
        }
        else{
            echo "Error en la consulta: " . mysqli_error($conn);
        }   
    }

    if (isset($_POST['eliminar'])) {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    
        if ($id > 0) {
            // Consulta preparada para evitar la inyección de SQL
            $eliminar = "DELETE FROM Usuarios WHERE id=?";
            $stmt = mysqli_prepare($conn, $eliminar);
    
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                $sql = mysqli_stmt_execute($stmt);
    
                if ($sql) {
                    echo "Usuario eliminado correctamente";
                } else {
                    echo "Error al eliminar usuario: " . mysqli_error($conn);
                }
    
                mysqli_stmt_close($stmt);
            } else {
                echo "Error en la preparación de la consulta: " . mysqli_error($conn);
            }
        } else {
            echo "ID de usuario no válido";
        }
    }
    $conn->close();
?>

