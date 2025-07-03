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

            <form action="index.php?accion=editarProducto" class="form-admin" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $fila->id ?>">
                <input name="nombreProducto" type="text" placeholder="Nombre del producto" value="<?php echo $fila->nombre_producto ?>" required>
                <input name="precio" type="number" placeholder="Precio" value="<?php echo $fila->precio ?>" required>
                <input name="talla" type="text" placeholder="Talla" value="<?php echo $fila->talla ?>" required>
                <input name="descripcion" type="text" placeholder="Descripcion" value="<?php echo $fila->descripcion ?>" required>
                <select name="categoria" required>
                    <option value="<?php echo $fila->id_categoria ?>"><?php echo $fila->nombre_categoria ?></option>
                    <?php
                    while ($fila2 = $result2->fetch_object()) {
                        if ($fila->id_categoria == $fila2->id) {
                            continue;
                        } else {
                    ?>
                            <option value="<?php echo $fila2->id ?>"><?php echo $fila2->nombre ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <h3>Imagen Actual:</h3>
                <br>
                <img src="imagenes/<?php echo $fila->imagen ?>" alt="Tenis Ejemplo">
                <input name="imagen" type="file" value="<?php echo $fila->imagen ?>" required>
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </section>
</body>

</html>