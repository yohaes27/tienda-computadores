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
            <a href="index.php?accion=verCategorias">Categorias</a>
            <a href="index.php?accion=verPedidos">Pedidos</a>
            <a href="index.php?accion=cerrarSesion">Cerrar Sesion</a>
        </nav>
    </header>
    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <a href="index.php?accion=verAgregar">Agregar Producto</a>
            <h3>Productos</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Talla</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php
                while ($fila = $result->fetch_object()) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $fila->id ?></td>
                            <td><?php echo $fila->nombre_productos ?></td>
                            <td><?php echo $fila->nombre_categorias ?></td>
                            <td><?php echo $fila->precio ?></td>
                            <td><?php echo $fila->talla ?></td>
                            <td>
                                <button><a href="index.php?accion=verEditar&id=<?php echo $fila->id ?>">Editar</a></button>
                                <button><a href="index.php?accion=eliminar&id=<?php echo $fila->id ?>">Eliminar</a></button>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </section>
</body>

</html>