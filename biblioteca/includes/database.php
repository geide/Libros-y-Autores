<?php
// Datos de la base de datos
$host = "localhost";  // Dirección del servidor de base de datos
$user = "root";  // Usuario de MySQL
$pass = "";  // Contraseña de MySQL
$db = "biblioteca";  // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hay error en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
