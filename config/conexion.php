<?php
// Datos de conexión
$servername = "sql10.freesqldatabase.com";
$username = "sql10707887";
$password = "Vg5I2wvYzs";
$database = "sql10707887";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Seleccionar la base de datos
if (!$conn->select_db($database)) {
    die("Database selection failed: " . $conn->error);
}

// Establecer la codificación de caracteres
$conn->set_charset("utf8");
?>
