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
            <a href="index.php?accion=verCategorias">Categorias</a>
            <a href="index.php?accion=cerrarSesion">Cerrar Sesion</a>
        </nav>
    </header>

    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <h3>Pedidos</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = $result->fetch_object()) {


                    ?>
                        <tr>
                            <td><?php echo $fila->id_pedido ?></td>
                            <td><?php echo $fila->nombre_usuario ?></td>
                            <td><?php echo $fila->nombre_producto ?></td>
                            <td><?php echo $fila->cantidad ?></td>
                            <td><?php echo $fila->fecha ?></td>
                            <td><?php echo $fila->estado ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>