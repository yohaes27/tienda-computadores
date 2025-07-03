Proyecto: Tienda de Tenis - Sistema de Gestión de Ventas

Descripción:
-------------
Este proyecto es una aplicación web desarrollada en PHP para la gestión de una tienda de tenis. Permite a los administradores gestionar productos, categorías y pedidos, y a los clientes visualizar el catálogo, registrarse, iniciar sesión y realizar pedidos.

Estructura de Carpetas:
-----------------------
- index.php: Archivo principal y punto de entrada.
- Controlador/Controlador.php: Lógica del controlador principal.
- Modelo/: Contiene las clases para la conexión a la base de datos y la lógica de negocio (usuarios, productos y pedidos).
- Vista/: Incluye los archivos de interfaz, tanto para el administrador como para los clientes, así como los estilos CSS.
- imagenes/: Carpeta para almacenar imágenes subidas de productos.

Funcionalidades:
----------------
- Registro e inicio de sesión de usuarios.
- Panel de administración para agregar, listar y eliminar productos.
- Gestión de categorías (interfaz estática).
- Visualización de catálogo para usuarios y clientes.
- Realización de pedidos (funcionalidad básica).
- Subida de imágenes de productos.

Notas:
------
- El sistema utiliza sesiones para la autenticación.
- Algunas vistas de administración y pedidos son estáticas y pueden requerir desarrollo adicional.
- El archivo "Vista/html/cliente/pedido.php" está vacío y puede ser implementado para mostrar detalles de