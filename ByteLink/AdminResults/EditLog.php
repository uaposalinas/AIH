<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="com.config.css">
    <link rel="stylesheet" href="../Fonts/IndexFontsCaviarDreams.css">
</head>
<body>

<div class="WriteProfilePhoto"></div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos
    $usuario = 'root';
    $contrasena = '';
    $servidor = 'localhost';
    $basededatos = 'Projects';

    // Conexión a la base de datos
    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

    // Verificar la conexión
    if (!$conexion) {
        die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
    }

    // Obtener los valores de los campos editados
    $testID = $_POST['TestID'];
    $brand = $_POST['Brand'];
    $model = $_POST['Model'];
    $serial = $_POST['Serial'];
    $errorType = $_POST['ErrorType'];
    $errorNote = $_POST['ErrorNote'];

    // Actualizar el registro en la base de datos
    $query = "UPDATE DevTestResults SET Brand='$brand', Model='$model', Serial='$serial', ErrorType='$errorType', ErrorNote='$errorNote' WHERE TestID='$testID'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        echo "El registro se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Obtener el TestID a editar
    if (isset($_GET['testID'])) {
        $testID = $_GET['testID'];

        // Datos de conexión a la base de datos
        $usuario = 'root';
        $contrasena = '';
        $servidor = 'localhost';
        $basededatos = 'Projects';

        // Conexión a la base de datos
        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

        // Verificar la conexión
        if (!$conexion) {
            die("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
        }

        // Consulta SQL para obtener el registro a editar
        $query = "SELECT Brand, Model, Serial, ErrorType, ErrorNote FROM DevTestResults WHERE TestID='$testID'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 1) {
            // Obtener los valores del registro
            $fila = mysqli_fetch_assoc($resultado);
            $brand = $fila['Brand'];
            $model = $fila['Model'];
            $serial = $fila['Serial'];
            $errorType = $fila['ErrorType'];
            $errorNote = $fila['ErrorNote'];

            // Mostrar un formulario para editar los campos
            echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
            echo '<input type="hidden" name="TestID" value="'.$testID.'">';
            echo 'Brand: <input type="text" name="Brand" value="'.$brand.'"><br>';
            echo 'Model: <input type="text" name="Model" value="'.$model.'"><br>';
            echo 'Serial: <input type="text" name="Serial" value="'.$serial.'"><br>';
            echo 'ErrorType: <input type="text" name="ErrorType" value="'.$errorType.'"><br>';
            echo 'ErrorNote: <input type="text" name="ErrorNote" value="'.$errorNote.'"><br>';
            echo '<input type="submit" value="Guardar">';
            echo '</form>';
        } else {
            echo "No se encontró el registro a editar.";
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        echo "No se proporcionó el TestID a editar.";
    }
}
?>
</body>
</html>
