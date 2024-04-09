<?php
$servername = "sql10.freesqldatabase.com";
$database = "sql10697264";
$username = "sql10697264";
$password = "nCihHeqJX2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer la codificación de caracteres
$conn->set_charset("utf8");
?>