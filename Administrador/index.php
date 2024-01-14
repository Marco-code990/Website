<!DOCTYPE html>
<html>
    <head>
        <title>GestionLab</title>
        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    </head>

    <body>
        <div class="log-container">
            <img src="./Media/esime.png" alt="Logo_ESIME">
            <h1>Administración GestionLab ESIMEZ</h1>
            <form action="procesar_login.php" method="post" onsubmit="return validarCredenciales();">
                <input type="text" name="user" placeholder="Correo electronico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>
    </body>
</html>