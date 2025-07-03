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
                <input name="marcaProducto" type="text" placeholder="Marca del computador" required>
                <input name="modeloProducto" type="text" placeholder="Modelo del computador" required>
                <!-- tipo mediante selec -->
                <select name="tipo" id="tipo">
                    <option value="">Selecione un tipo</option>
                    <option value="computadores">computadores</option>
                    <option value="repuesto">repuesto</option>
                </select>

                <input name="especificaciones" type="text" placeholder="Especificaciones del computador" required>
                <input name="Precio" type="text" placeholder="precio" required>
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
<<<<<<< HEAD
                <input name="imagen" type="file" required>
=======
                <input name="imagen" input type="file" multiple required>
>>>>>>> 61e54e9 (canbios en el pormulario y la presentasion)
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </section>
</body>

</html>