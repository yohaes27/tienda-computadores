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
        <h2>Zona Administrador</h2>
        <p><strong>Iniciar sesión:</strong></p>
        <form action="index.php?accion=login" method="post">
            <input name="email" type="email" placeholder="Correo" required>
            <input name="password" type="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </section>
</body>

</html>