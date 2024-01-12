<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios</title>
        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    </head>

    <body>
        <header class="page-header">
            <img src="./Media/esime.png" alt="Logo_ESIME"> 
            <div class="welcome-container">
                <h1>Usuarios registrados</h1>
            </div>
            <div class="logout">
                <a href="cerrar-sesion.php">
                    <img src="./Media/logout.png" alt="Cerrar_sesion" title="Cerrar sesión">
                </a>
            </div>
        </header>

        <div class="user-list">
            <form action="registrer.php" method="POST"> 
                <div class="form-group">
                <label>ID del usuario</label>
                <input type="text" name="id">
                </div>
            
                <div class="form-group">
                <label>Nombre del usuario</label>
                <input type="text" name="nombre">
                </div>

                <div class="form-group">
                <label>Correo del usuario</label>
                <input type="text" name="correo">
                </div>

                <div class="form-group">
                <label>Contraseña del usuario</label>
                <input type="text" name="contraseña">
                </div>

                <div class="form-group">
                <label>Tipo de usuario</label>
                <input type="text" name="tipo_usuario">
                </div>

                <input type="submit" name="insertar" value="INSERTAR">
                <input type="submit" name="consultar" value="CONSULTAR">
                <input type="submit" name="eliminar" value="ELIMINAR">
            </form>
            
        </div>
        
    </body>
</html>