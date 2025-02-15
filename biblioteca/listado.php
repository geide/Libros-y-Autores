<?php
include "includes/header.php";
require_once "includes/database.php";

// Obtener todos los libros de la base de datos
$result = $conn->query("SELECT * FROM libros");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main>
        <h1>Listado de Libros</h1>
        <table border="1">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['autor']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>
</html>
