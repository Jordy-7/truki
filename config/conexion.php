<?php
// Datos de conexión mysql
$servername = "localhost";
$username = "root";
$password = "";
$database = "Truki";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

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
