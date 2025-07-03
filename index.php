<?php
session_start();
require_once "Controlador/Controlador.php";
require_once "Modelo/Conexion.php";
require_once "Modelo/GestorVentas.php";
require_once "Modelo/Producto.php";
require_once "Modelo/Usuario.php";
$controlador = new Controlador();
if (!isset($_SESSION["usuario"])) {

    if (isset($_GET["accion"])) {
        if ($_GET["accion"] == "verLogin") {
            $controlador->verPagina("Vista/html/login.php");
        } elseif ($_GET["accion"] == "login") {
            $controlador->login(
                $_POST["email"],
                $_POST["password"]
            );
        } elseif ($_GET["accion"] == "productos") {
            $controlador->verProductos();
        } elseif ($_GET["accion"] == "verAgregar") {
            $controlador->verAgregarProducto();
        } elseif ($_GET["accion"] == "agregarProducto") {
            $ruta_indexphp = "imagenes";
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            $imagen = $_FILES['imagen']['name'];
            $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
            $ruta_nuevo_destino = $ruta_indexphp . '/' . $_FILES['imagen']['name'];
            if (in_array($_FILES['imagen']['type'], $extensiones)) {
                echo 'Es una imagen';
                if ($_FILES['imagen']['size'] < $max_tamanyo) {
                    echo 'Pesa menos de 1 MB';
                    if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                        echo 'Fichero guardado con éxito';
                    }
                }
            }
            $controlador->agregarProducto(

                $_POST["marcaProducto"],
                $_POST["modeloProducto"],
                $_POST["tipo"],
                $_POST["especificaciones"],
                $_POST["Precio"],
                $_POST["categoria"],
                $imagen
            );
        } elseif ($_GET["accion"] == "verEditar") {
            $controlador->verEditarProducto(
                $_GET["id"]
            );
        } elseif ($_GET["accion"] == "editarProducto") {
            $ruta_indexphp = "imagenes";
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            $imagen = $_FILES['imagen']['name'];
            $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
            $ruta_nuevo_destino = $ruta_indexphp . '/' . $_FILES['imagen']['name'];
            if (in_array($_FILES['imagen']['type'], $extensiones)) {
                echo 'Es una imagen';
                if ($_FILES['imagen']['size'] < $max_tamanyo) {
                    echo 'Pesa menos de 1 MB';
                    if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                        echo 'Fichero guardado con éxito';
                    }
                }
            }
            $controlador->editarProducto(
                $_POST["id"],
                $_POST["nombreProducto"],
                $_POST["precio"],
                $_POST["talla"],
                $_POST["descripcion"],
                $_POST["categoria"],
                $imagen
            );
        } elseif ($_GET["accion"] == "eliminar") {
            $controlador->eliminar(
                $_GET["id"]
            );
        } elseif ($_GET["accion"] == "simulacion") {
            $controlador->mensaje("Debe de iniciar sesion");
        } elseif ($_GET["accion"] == "verRegistro") {
            $controlador->verPagina("Vista/html/registro.php");
        } elseif ($_GET["accion"] == "registro") {
            $controlador->registro(
                $_POST["nombre"],
                $_POST["email"],
                $_POST["password"]
            );
        } elseif ($_GET["accion"] == "catalogoClientes") {
            $controlador->catalogoClientes(
                null
            );   
        } 
        elseif ($_GET["accion"] == "catalogoClientes2") {
            $controlador->catalogoClientes(
                $_REQUEST["pos"]
            );   
        } 
        elseif ($_GET["accion"] == "pedido") {
            $controlador->pedido(
                $_POST["id"]
            );
        } elseif ($_GET["accion"] == "realizarPedido") {
            $controlador->realizarPedido(
                $_POST["cantidad"],
                $_GET["idProducto"]
            );
        } elseif ($_GET["accion"] == "verCategorias") {
            $controlador->verCategorias();
        } elseif ($_GET["accion"] == "agregarCategoria") {
            $controlador->agregarCategoria(
                $_POST["nombreCategoria"]
            );
        } elseif ($_GET["accion"] == "eliminarCategoria") {
            $controlador->eliminarCategoria(
                $_GET["idCategoria"]
            );
        } elseif ($_GET["accion"] == "verPedidos") {
            $controlador->verPedidos();
        } elseif ($_GET["accion"] == "cerrarSesion") {
            $controlador->cerrarSesion();
        }
        elseif($_GET["accion"]=="ordenar"){
            $controlador->ordenar(
                $_POST["categoria"]
            );
        }
        elseif($_GET["accion"]=="ordenarClientes"){
            $controlador->ordenarClientes(
                $_POST["categoria"]
            );
        }
        elseif($_GET["accion"]=="catalogo"){
            $controlador->catalogo2(
                $_REQUEST["pos"]
            );
        }
    }
    else{
        $controlador->catalogo(
                null
            );
        }
        
    }
 else {
    $controlador->catalogo(
                null
            );
}
