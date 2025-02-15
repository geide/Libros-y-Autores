<?php
require_once "includes/database.php";

// Verificar si se pasó un ID para eliminar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM libros WHERE id = $id");
}

header("Location: listado.php");
exit();
?>
