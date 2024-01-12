<?php
   include 'scripts/conection.php';
   $user= $_POST['correo'];
   $pass= $_POST['contraseña'];

   /*$user= "Tonymagnastar@gmail.com";
   $pass= "12345";*/

   $sent= $conn->prepare("SELECT * FROM usuarios WHERE correo=? AND contraseña=?");
   $sent->bind_param("ss", $user, $pass);
   $sent->execute();

   $result= $sent->get_result();
   if($fila = $result->fetch_assoc()) {
    echo json_encode($fila, JSON_UNESCAPED_UNICODE); 
   }
   $sent->close();
   $conn->close();
?>




