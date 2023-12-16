<?php
session_start(); // Iniciar la sesión

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirigir al usuario a la página de inicio de sesión o a donde desees
header('Location: index.php'); // Cambia "inicio_de_sesion.php" al archivo de inicio de sesión
exit;
?>
