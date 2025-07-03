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
    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <h3>Productos</h3>
            <form action="index.php?accion=agregarProducto" class="form-admin" method="post" enctype="multipart/form-data">
                <input name="nombreProducto" type="text" placeholder="Nombre del producto" required>
                <input name="precio" type="number" placeholder="Precio" required>
                <input name="talla" type="text" placeholder="Talla" required>
                <input name="descripcion" type="text" placeholder="Descripcion" required>
                <select name="categoria" required>
                    <option value="">Seleccionar categoría</option>
                    <?php
                    while ($fila = $result->fetch_object()) {
                    ?>
                        <option value="<?php echo $fila->id ?>"><?php echo $fila->nombre ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input name="imagen" type="file" required>
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </section>
</body>

</html>