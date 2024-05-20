<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Resultados</title>
    <link rel="stylesheet" href="com.config.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
</head>
<body>
    <div class="WriteProfilePhoto"></div>

    <form class="SelectFilter" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="filter">
            <option value="Todos">Mostrar Todos</option>
            <option value="Tested_Error">Con Error</option>
            <option value="Tested">Probados</option>
            <option value="Audited">Auditados</option>
        </select>
        <input type="submit" value="Filtrar" class="button" style="background-color:#7668AF; margin-left:10px;">
    </form>

    <form class="SearchBox" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <ion-icon name="search-outline"></ion-icon>
        <input type="text" name="search" placeholder="Buscar por serie o TestID" autocomplete="off" class="TextSearchBox">
        <input type="submit" value="">
        <ion-icon name="close-outline" class="SendSearchIcon"></ion-icon>
    </form>

    <div class="TableContainer">
        <?php
        $username = 'root';
        $password = '';
        $server = 'localhost';
        $database = 'Projects';

        $connection = mysqli_connect($server, $username, $password, $database);

        if (!$connection) {
            die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM DevTestResults";

        if (isset($_POST["filter"])) {
            $filter = $_POST["filter"];
            if ($filter !== "Todos") {
                $query .= " WHERE TestStatus = '$filter'";
            }
        }

        if (isset($_POST["search"])) {
            $search = mysqli_real_escape_string($connection, $_POST["search"]);
            $query .= " WHERE TestID LIKE '%$search%' OR Serial LIKE '%$search%'";
        }

        $result = mysqli_query($connection, $query);

        $columnNames = array();
        while ($fieldInfo = mysqli_fetch_field($result)) {
            $columnNames[] = $fieldInfo->name;
        }

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th></th><th></th>";
            foreach ($columnNames as $columnName) {
                echo "<th>$columnName</th>";
            }
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><button onclick='eliminarRegistro({$row['TestID']})' style='background: none; border: none; color: #e61920; cursor: pointer;' title='Eliminar Registro'><ion-icon name='remove-circle-outline' style='font-size:20px'></ion-icon></button></td>";
                echo "<td><a href='EditLog.php?testID={$row['TestID']}' style='text-decoration: none; color: #7668AF;' title='Editar Registro'><ion-icon name='create-outline' style='font-size:20px'></ion-icon></a></td>";
                foreach ($columnNames as $columnName) {
                    echo "<td>{$row[$columnName]}</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay resultados para este filtro.</p>";
        }

        mysqli_close($connection);
        ?>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        function eliminarRegistro(testID) {
            if (confirm('¿Estás seguro que deseas eliminar este registro? Al hacerlo se podrá volver a ejecutar el test en esa máquina, también, la información se eliminará de todas las bases de datos, incluyendo la del certificado.')) {
                window.location.href = 'DeleteLog.php?testID=' + testID;
            }
        }
    </script>
</body>
</html>
