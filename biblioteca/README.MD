# Gestión de Libros

Este proyecto es un sistema web en PHP para la gestión de libros y autores.

## Funcionalidades:
- Registro de libros con título, autor, precio y cantidad.
- Edición y eliminación de libros.
- Listado de libros con opciones de gestión.
- Menú de navegación en todas las páginas.

## Instalación

1. **Clona este repositorio** en tu máquina local.
2. **Importa la base de datos**:
   - Accede a `http://localhost/phpmyadmin/`.
   - Crea una nueva base de datos llamada `biblioteca`.
   - Importa el archivo SQL correspondiente (puedes crear las tablas manualmente si no tienes el archivo `.sql`).
3. **Configura la conexión** en `includes/database.php` con los datos de tu servidor de base de datos.
4. **Inicia XAMPP**:
   - Asegúrate de que Apache y MySQL están corriendo en el panel de control de XAMPP.
5. **Accede al proyecto**:
   - Abre `http://localhost/proyecto/index.php` en tu navegador.

## Estructura del Proyecto
- `index.php`: Página de inicio.
- `registro.php`: Formulario para registrar libros.
- `listado.php`: Muestra todos los libros registrados.
- `editar.php`: Permite editar libros.
- `eliminar.php`: Elimina libros.
- `css/styles.css`: Estilos generales.