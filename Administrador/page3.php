<!DOCTYPE html>
<html>
<head>
    <title>Laboratorios</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="scripts/Modal.js"></script>
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
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Incluir el archivo lab_manager.php
                    include 'lab_manager.php';

                    // Obtener la lista de laboratorios
                    $laboratorios = obtenerLaboratorios();
                    // ... (código PHP para obtener y mostrar laboratorios)
                    foreach ($laboratorios as $lab) {
                        echo '<tr id="lab-' . $lab["id"] . '">';
                        echo '<td>' . $lab["id"] . '</td>';
                        echo '<td>' . $lab["nombre"] . '</td>';
                        echo '<td>' . $lab["capacidad"] . '</td>';
                        echo '<td class="estado">' . $lab["estado"] . '</td>';
                        echo '<td><button class="Edit-button" onclick="cambiarEstado(
                        ' . $lab["id"] . ')">Cambiar Estado</button></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div id="modalContent" class="modal-content"></div>
    </div>
</body>
</html>


