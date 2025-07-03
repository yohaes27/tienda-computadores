<?php
class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function mensaje($mensaje)
    {
        echo "<script>alert('Necesita iniciar sesion');
                window.location= 'index.php'</script>";
    }
    public function login($email, $password)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->login($email, $password);
        $result = $result->fetch_object();
        if ($result) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            $_SESSION["id"] = $result->id;
            if ($result->rol == "admin") {
                header("location: index.php?accion=productos");
            } else {
                header("location: index.php?accion=catalogoClientes");
            }
        } else {
            echo "<script>alert('Correo o contraseña incorrectos');
                window.location= 'index.php?accion=verLogin'</script>";
        }
    }
    public function verAgregarProducto()
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->cargarCategorias();

        require_once "Vista/html/admin/agregarProducto.php";
    }
<<<<<<< HEAD
    public function agregarProducto($nombreProducto, $precio, $talla, $descripcion, $categoria, $imagen)
=======
    public function agregarProducto($marcaProducto, $modeloProducto, $tipo, $especificaciones, $Precio, $)
>>>>>>> 61e54e9 (canbios en el pormulario y la presentasion)
    {
        $producto = new Producto($nombreProducto, $precio, $talla, $descripcion, $categoria, $imagen);
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->agregarProducto($producto);

        if ($result > 0) {
            echo "<script>alert('Producto ingresado exitosamente');
                window.location= 'index.php?accion=productos'</script>";
        } else {
            echo "<script>alert('Error al ingresar el producto');
                window.location= 'index.php?accion=verAgregar'</script>";
        }
    }
    public function verProductos()
    {
        if (isset($_REQUEST['pos'])) {
            $inicio = $_REQUEST['pos'];
        } else {
            $inicio = 0;
        }
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->verProductos($inicio);
        require_once "Vista/html/admin/productos.php";
    }
    public function verEditarProducto($id)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->verEditarProducto($id);
        $fila = $result->fetch_object();
        $result2 = $gestorVentas->verCategorias();
        require_once "Vista/html/admin/editarProducto.php";
    }
    public function editarProducto($id, $nombreProducto, $precio, $talla, $descripcion, $categoria, $imagen)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->editarProducto($id, $nombreProducto, $descripcion, $precio, $imagen, $categoria, $talla);
        if ($result > 0) {
            echo "<script>alert('Producto editado exitosamente');
            window.location= 'index.php?accion=productos'</script>";
        } else {
            echo "<script>alert('Error al editar el producto');
            window.location= 'index.php?accion=verEditar&id=$id'</script>";
        }
    }
    public function eliminar($id)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->eliminar($id);
        echo "<script>alert('El producto se elimino exitosamente');
                window.location= 'index.php?accion=productos'</script>";
    }
    public function catalogo($accion)
    {
        $gestorVentas = new GestorVentas();
        if (isset($_REQUEST['pos'])) {
            $inicio = $_REQUEST['pos'];
        } else {
            $inicio = 0;
        }
        $result = $gestorVentas->verProductos($inicio);
        $result2 = $gestorVentas->verCategorias();
        require_once "Vista/html/catalogo.php";
    }
    public function registro($nombre, $email, $password)
    {
        $usuario = new Usuario($nombre, $email, $password);
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->registro($usuario);
        if ($result > 0) {
            echo "<script>alert('Se ha registrado exitosamente');
                window.location= 'index.php'</script>";
        } else {
            echo "<script>alert('Ha ocurrido un error');
                window.location= 'index.php?verRegistro'</script>";
        }
    }
    public function catalogoClientes($accion)
    {
        $gestorVentas = new GestorVentas();
        if (isset($_REQUEST['pos'])) {
            $inicio = $_REQUEST['pos'];
        } else {
            $inicio = 0;
        }
        $result = $gestorVentas->verProductos($inicio);
        $result2 = $gestorVentas->verCategorias();
        require_once "Vista/html/cliente/catalogo.php";
    }
    public function pedido($id)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->productoPorId($id);
        require_once "Vista/html/cliente/pedido.php";
    }
    public function realizarPedido($cantidad, $idProducto)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->realizarPedido($cantidad, $idProducto);
        if ($result > 0) {
            echo "<script>alert('Pedido realizado exitosamente');
            window.location= 'index.php?accion=catalogoClientes'</script>";
        } else {
            echo "<script>alert('El pedido no se logro realizar');
            window.location= 'index.php?accion=pedido'</script>";
        }
    }
    public function verCategorias()
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->verCategorias();
        require_once "Vista/html/admin/categorias.php";
    }
    public function agregarCategoria($nombreCategoria)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->agregarCategoria($nombreCategoria);
        if ($result > 0) {
            echo "<script>alert('Categoria agregada exitosamente');
            window.location= 'index.php?accion=verCategorias'</script>";
        } else {
            echo "<script>alert('Error al agregar la categoria');
            window.location= 'index.php?accion=verCategorias'</script>";
        }
    }
    public function eliminarCategoria($idCategoria)
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->eliminarCategoria($idCategoria);
        if ($result > 0) {
            echo "<script>alert('Categoria eliminada exitosamente');
            window.location= 'index.php?accion=verCategorias'</script>";
        } else {
            echo "<script>alert('Error al eliminar la categoria');
            window.location= 'index.php?accion=verCategorias'</script>";
        }
    }
    public function verPedidos()
    {
        $gestorVentas = new GestorVentas();
        $result = $gestorVentas->verPedidos();
        require_once "Vista/html/admin/pedidos.php";
    }
    public function cerrarSesion()
    {
        if (isset($_SESSION["email"]) && $_SESSION["password"] && $_SESSION["id"]) {
            unset($_SESSION["usuario"]);
            unset($_SESSION["password"]);
            unset($_SESSION["id"]);
        }
        session_destroy();
        header("Location: index.php");
    }
    public function ordenar($categoria)
    {
        $gestorVentas = new GestorVentas();
        if ($categoria == null) {
            if (isset($_REQUEST['pos'])) {
                $inicio = $_REQUEST['pos'];
            } else {
                $inicio = 0;
            }
            $result = $gestorVentas->verProductos($inicio);
            $result2 = $gestorVentas->verCategorias();
            require_once "Vista/html/catalogo.php";
        } else {
            $result = $gestorVentas->ordenar($categoria);
            $result2 = $gestorVentas->verCategorias();
            if (isset($result)) {
                require_once "Vista/html/catalogo.php";
            } else {
                if (isset($_REQUEST['pos'])) {
                    $inicio = $_REQUEST['pos'];
                } else {
                    $inicio = 0;
                }
                $result = $gestorVentas->verProductos($inicio);
                require_once "Vista/html/catalogo.php";
            }
        }
    }
    public function ordenarClientes($categoria)
    {
        $gestorVentas = new GestorVentas();
        if (isset($_REQUEST['pos'])) {
            $inicio = $_REQUEST['pos'];
        } else {
            $inicio = 0;
        }
        if ($categoria == null) {
            $result = $gestorVentas->verProductos($inicio);
            $result2 = $gestorVentas->verCategorias();
            require_once "Vista/html/cliente/catalogo.php";
        } else {
            $result = $gestorVentas->ordenar($categoria);
            $result2 = $gestorVentas->verCategorias();
            if (isset($result)) {
                require_once "Vista/html/cliente/catalogo.php";
            } else {
                $result = $gestorVentas->verProductos($inicio);
                require_once "Vista/html/cliente/catalogo.php";
            }
        }
    }
    public function catalogo2($accion){
        $gestorVentas = new GestorVentas();
        if (isset($_REQUEST['pos'])) {
            $inicio = $_REQUEST['pos'];
        } else {
            $inicio = 0;
        }
        $result = $gestorVentas->verProductos($inicio);
        $result2 = $gestorVentas->verCategorias();
        require_once "Vista/html/catalogo.php";
    }
}
