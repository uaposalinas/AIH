<?php
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

// Recibir el parámetro testID de la URL
if (isset($_GET['testID'])) {
    $testID = $_GET['testID'];
    
    // Consulta SQL para eliminar el registro
    $query = "DELETE FROM DevTestResults WHERE TestID = $testID";
    
    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado) {
        // Éxito en la eliminación
        // Redirigir a la página principal después de un breve retraso
        echo "<script>
 
        window.location.href = '../Show';

        </script>";
    } else {
        // Error en la eliminación
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
} else {
    echo "Falta el parámetro testID en la URL.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
