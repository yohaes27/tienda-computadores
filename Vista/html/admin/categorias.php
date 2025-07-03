<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/css/styles.css">
</head>

<body>
    <header>
        <h1>Tienda de Tenis</h1>
        <nav>
            <a href="index.php?accion=productos">Productos</a>
            <a href="index.php?accion=verPedidos">Pedidos</a>
            <a href="index.php?accion=cerrarSesion">Cerrar Sesion</a>
        </nav>
    </header>

    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <h3>Categorías</h3>
            <form action="index.php?accion=agregarCategoria" class="form-admin" method="post">
                <input name="nombreCategoria" type="text" placeholder="Nombre de la categoría">
                <button type="submit">Guardar Categoría</button>
            </form>
            <ul>
                <?php
                while ($fila = $result->fetch_object()) {
                ?>
                    <li><?php echo $fila->nombre ?><button><a href="index.php?accion=eliminarCategoria&idCategoria=<?php echo $fila->id ?>">Eliminar</a></button></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </section>
</body>

</html>