<?php
include "includes/header.php";
require_once "includes/database.php";

// Obtener los datos del libro para editarlo
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM libros WHERE id = $id");
    $book = $result->fetch_assoc();
}

// Verificar si se ha enviado el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = htmlspecialchars($_POST['titulo']);
    $autor = htmlspecialchars($_POST['autor']);
    $precio = max(0, floatval($_POST['precio']));
    $cantidad = max(0, intval($_POST['cantidad']));

    // Actualizar el libro en la base de datos
    $stmt = $conn->prepare("UPDATE libros SET titulo = ?, autor = ?, precio = ?, cantidad = ? WHERE id = ?");
    $stmt->bind_param("ssdis", $titulo, $autor, $precio, $cantidad, $id);
    $stmt->execute();
    
    header("Location: listado.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main>
        <h1>Editar Libro</h1>

        <form action="" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $book['titulo']; ?>" required>

            <label for="autor">Autor:</label>
            <input type="text" name="autor" value="<?php echo $book['autor']; ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" value="<?php echo $book['precio']; ?>" step="0.01" required>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" value="<?php echo $book['cantidad']; ?>" required>

            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>
</html>
