<?php
include "includes/header.php";
require_once "includes/database.php";

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario y sanitizarlos (eliminar espacios innecesarios y caracteres especiales)
    $titulo = htmlspecialchars(trim($_POST['titulo']));  // Sanitizamos y eliminamos espacios innecesarios
    $autor = htmlspecialchars(trim($_POST['autor']));  // Sanitizamos y eliminamos espacios innecesarios
    $precio = floatval($_POST['precio']);  // Convertimos el precio a número flotante
    $cantidad = intval($_POST['cantidad']);  // Convertimos la cantidad a número entero

    // Validación de los campos
    if (empty($titulo) || empty($autor)) {
        // Verificamos que los campos Título y Autor no estén vacíos
        $mensaje = "Los campos Título y Autor son obligatorios.";
    } elseif ($precio <= 0) {
        // Verificamos que el precio sea un valor positivo
        $mensaje = "El precio debe ser un valor positivo.";
    } elseif ($cantidad <= 0) {
        // Verificamos que la cantidad sea un valor positivo
        $mensaje = "La cantidad debe ser un valor positivo.";
    } else {
        // Si las validaciones pasan, procederemos a insertar el libro en la base de datos
        $stmt = $conn->prepare("INSERT INTO libros (titulo, autor, precio, cantidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $titulo, $autor, $precio, $cantidad);  // Vinculamos los parámetros con la consulta
        if ($stmt->execute()) {  // Ejecutamos la consulta para insertar el libro
            // Si el libro se guarda correctamente, vaciamos los campos del formulario para permitir un nuevo registro
            $titulo = $autor = $precio = $cantidad = '';  // Limpiamos las variables después de guardar
            $mensaje = "Libro registrado con éxito. Ahora puedes ingresar otro libro.";  // Mensaje de éxito
        } else {
            $mensaje = "Error al registrar el libro. Intenta nuevamente.";  // Mensaje de error en caso de fallo
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Libro</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <main>
        <h1>Registrar Nuevo Libro</h1>

        <?php if (isset($mensaje)): ?>
            <!-- Mostrar el mensaje de éxito o error -->
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <!-- Formulario para registrar un nuevo libro -->
        <form action="" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required value="<?php echo isset($titulo) ? $titulo : ''; ?>"> <!-- Campo Título con valor anterior si hubo error -->

            <label for="autor">Autor:</label>
            <input type="text" name="autor" required value="<?php echo isset($autor) ? $autor : ''; ?>"> <!-- Campo Autor con valor anterior si hubo error -->

            <label for="precio">Precio:</label>
            <input type="number" name="precio" step="0.01" required value="<?php echo isset($precio) ? $precio : ''; ?>" min="0.01"> <!-- Campo Precio con validación para ser mayor a 0 -->

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required value="<?php echo isset($cantidad) ? $cantidad : ''; ?>" min="1"> <!-- Campo Cantidad con validación para ser mayor a 0 -->

            <button type="submit">Registrar</button> <!-- Botón para enviar el formulario -->
        </form>
    </main>
</body>
</html>
