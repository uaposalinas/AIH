<?php

# require "../../Spent/config/com.local.config.php";
# require "../../Spent/config/com.server.config.php";
# require "../../Spent/config/com.aih.config.php";

$Connection->set_charset("utf8");


if ($Connection->connect_error) {
    die("Conexión fallida: " . $Connection->connect_error);
}

$sql = "SELECT * FROM logs";
$result = $Connection->query($sql);

$backup_folder = 'C:/Network/htdocs/Backups/Spent/';

$backup_date = date('d-m-Y');

$backup_date_folder = $backup_folder . $backup_date . '/';

if (!file_exists($backup_date_folder)) {
    mkdir($backup_date_folder, 0777, true);
}

$filename = 'Backup' . getNextBackupVersion($backup_date_folder) . '.sql';
$file_path = $backup_date_folder . $filename;

if ($result->num_rows > 0) {
    $sql_content = "";

    $sql_content .= "CREATE TABLE IF NOT EXISTS logs (";
    $columns = $result->fetch_fields();
    $col_count = count($columns);
    foreach ($columns as $index => $column) {
        $sql_content .= $column->name . " " . getColumnType($column);
        if ($index < $col_count - 1) {
            $sql_content .= ", ";
        }
    }
    $sql_content .= ");\n";

    while($row = $result->fetch_assoc()) {
        $sql_content .= "INSERT INTO logs (";
        $i = 0;
        foreach ($row as $key => $value) {
            $sql_content .= $key;
            if ($i < count($row) - 1) {
                $sql_content .= ", ";
            }
            $i++;
        }
        $sql_content .= ") VALUES (";
        $i = 0;
        foreach ($row as $value) {
            $sql_content .= "'" . $Connection->real_escape_string($value) . "'";
            if ($i < count($row) - 1) {
                $sql_content .= ", ";
            }
            $i++;
        }
        $sql_content .= ");\n";
    }

    file_put_contents($file_path, $sql_content);
    echo "<script> window.close(); </script>";
} else {
    echo "No se encontraron resultados.";
}

$Connection->close();

function getColumnType($column) {
    switch ($column->type) {
        case 3: return 'INT';
        case 253: return 'VARCHAR(' . $column->length . ')';
        case 254: return 'CHAR(' . $column->length . ')';
        case 252: return 'TEXT';
        case 10: return 'DATE';
        case 12: return 'DATETIME';
        default: return 'VARCHAR(' . $column->length . ')';
    }
}

function getNextBackupVersion($backup_date_folder) {
    $counter_file = $backup_date_folder . 'counter.txt';

    if (!file_exists($counter_file)) {
        file_put_contents($counter_file, '1');
        return '01';
    }

    $counter = (int)file_get_contents($counter_file);
    $counter++;

    file_put_contents($counter_file, str_pad($counter, 2, '0', STR_PAD_LEFT));

    return str_pad($counter, 2, '0', STR_PAD_LEFT);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>com.backup.spent</title>
</head>
<body>
    
    <script> 

        window.addEventListener('load', InitBackupProcess);

        function InitBackupProcess(){

            console.log("Archivo de Backup se inició correctamente.")

            setTimeout(() => {
            
                window.location.reload();

            }, 3600000);

        }

    </script>

</body>
</html>