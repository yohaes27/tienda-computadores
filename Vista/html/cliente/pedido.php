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
    </header>
    <section id="admin">
        <h2>Pedido</h2>
        <p><strong>Ingrese los datos para realizar su pedido</strong></p>
        <?php
        if ($fila = $result->fetch_object()) {
        ?>
            <form action="index.php?accion=realizarPedido&idProducto=<?php echo $id ?>" method="post">
                <input name="cantidad" type="number" placeholder="Cantidad" required>
                <button type="submit">Ingresar</button>
            </form>
        <?php
        }
        ?>
    </section>
</body>

</html>