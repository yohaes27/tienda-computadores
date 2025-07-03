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
      <a href="index.php?accion=verRegistro">Registrarse</a>
      <a href="index.php?accion=verLogin">Iniciar sesion</a>
    </nav>
  </header>
  <section id="catalogo">
    <div>
      <h2>Catálogo de Productos</h2>
    </div>
    <div>
      <form action="index.php?accion=ordenar" method="post">
        <select name="categoria">
          <option value="">Todas</option>
          <?php
          while ($fila2 = $result2->fetch_object()) {
          ?>
            <option value="<?php echo $fila2->id ?>"><?php echo $fila2->nombre ?></option>
          <?php
          }
          ?>
        </select>
        <input type="submit" value="Seleccionar categoria">
      </form>
    </div>



    <div class="productos">
      <!-- Aquí se llenan los productos dinámicamente -->

      <?php
      $impresos=0;
      while ($fila = $result->fetch_object()) {
        $impresos++;
      ?>
        <div class="producto">
          <img src="imagenes/<?php echo $fila->imagen ?>" alt="Tenis Ejemplo">
          <h3><?php echo $fila->nombre ?></h3>
          <p>Categoría: <?php echo $fila->nombre_categorias ?></p>
          <p>Talla: <?php echo $fila->talla ?></p>
          <p>$<?php echo $fila->precio ?></p>
          <button><a href="index.php?accion=simulacion">Solicitar Compra</a></button>
        </div>
      <?php
      }
      
      ?>
    </div>
  </section>
  <?php
    if($inicio==0){
            echo "Anteriores ";
        }
        else{
            $anterior=$inicio-6;
            echo "<a href='index.php?accion=catalogo&pos=$anterior'>Anteriores </a>";
        }
        if($impresos==6){
            $proximo=$inicio+6;
            echo "<a href='index.php?accion=catalogo&pos=$proximo'>Siguientes</a>";
        }
        else{
            echo "Siguientes";
        }
  ?>
  <footer>
    <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
  </footer>
</body>

</html>