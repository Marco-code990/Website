<!DOCTYPE html>
<html>
    <head>
        <title>Reportes</title>
        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    </head>

    <body>
    <header class="page-header">
        <img src="./Media/esime.png" alt="Logo_ESIME"> 
        <div class="welcome-container">
            <h1>Laboratorios</h1>
        </div>
        <div class="logout">
            <a href="cerrar-sesion.php">
                <img src="./Media/logout.png" alt="Cerrar_sesion" title="Cerrar sesión">
            </a>
        </div>
    </header>

    <div id="lab-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha de envio</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Incluir el archivo lab_manager.php
                    include 'report_manager.php';

                    // Obtener la lista de laboratorios
                    $reportes = obtenerReportes();
                    // ... (código PHP para obtener y mostrar laboratorios)
                    foreach ($reportes as $rep) {
                        echo '<tr id="lab-' . $rep["id"] . '">';
                        echo '<td>' . $rep["id"] . '</td>';
                        echo '<td>' . $rep["fecha_reporte"] . '</td>';
                        echo '<td>' . $rep["descripcion"] . '</td>';
                        echo '<td>' . $rep["estado"].   '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    </body>
</html>