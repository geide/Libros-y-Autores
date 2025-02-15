# GERMAN ALVARADO GEIDE MICHELL

# Actividad Gestión de Libros

Este proyecto es un sistema web en PHP para la gestión de libros y autores.

## Funcionalidades:
- Registro de libros con título, autor, precio y cantidad.
- Edición y eliminación de libros.
- Listado de libros con opciones de gestión.
- Menú de navegación en todas las páginas.

## Instalación

1. **Clone este repositorio** en su máquina local.
2. **Importe la base de datos**:
   - Acceda a `http://localhost/phpmyadmin/`.
   - Cree una nueva base de datos llamada `biblioteca`.
   - Importe el archivo SQL, este se encuentra en la carpeta sql y lleva como nombre biblioteca.sql
3. **Configure la conexión** en `includes/database.php` con los datos de su servidor de base de datos.
4. **Inicie XAMPP**:
   - Asegúrese de que Apache y MySQL están corriendo en el panel de control de XAMPP.
5. **Acceda al proyecto**:
   - Abra `http://localhost/proyecto/index.php` e su navegador.

## Estructura del Proyecto
- `index.php`: Página de inicio.
- `registro.php`: Formulario para registrar libros.
- `listado.php`: Muestra todos los libros registrados.
- `editar.php`: Permite editar los datos de los libros registrados.
- `eliminar.php`: Elimina los libros registrados.
- `contacto.php`: Contacto con la biblioteca.
- `css/styles.css`: Estil general.
