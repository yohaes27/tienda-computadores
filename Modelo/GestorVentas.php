<?php
    class GestorVentas{
        public function login($email, $password){
            $conexion=new Conexion();
            $conexion->abrir();
            $sql="SELECT * from usuarios where correo='$email' and contrasena='$password'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function cargarCategorias(){
            $conexion=new Conexion();
            $conexion->abrir();
            $sql="SELECT * from categorias";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function agregarProducto(Producto $producto){
            $conexion= new Conexion();
            $conexion->abrir();
            $nombre=$producto->obtenerNombre();
            $precio=$producto->obtenerPrecio();
            $talla=$producto->obtenerTalla();
            $descripcion=$producto->obtenerDescripcion();
            $categoria=$producto->obtenerCategoria();
            $imagen=$producto->obtenerImagen();
            $sql="INSERT into productos values(null, '$nombre', '$descripcion', '$precio', '$imagen', '$categoria','$talla')";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function verProductos($inicio ){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT *, categorias.nombre as nombre_categorias, productos.marca as marca_productos, productos.id as id , productos.modelo as modelo_producto , productos.tipo , productos.especificaciones  AS especificaciones_producto , productos.precio AS precio_produdto , categorias.id as id_categorias from categorias join productos on categorias.id=productos.id_categoria limit $inicio, 6";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function verEditarProducto($id)  {
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT *, categorias.nombre as nombre_categoria, productos.nombre as nombre_producto, categorias.id as id_categoria from categorias join productos on categorias.id=productos.id_categoria where productos.id='$id'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function editarProducto($id, $nombreProducto, $descripcion, $precio, $imagen, $categoria, $talla){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="UPDATE productos set nombre='$nombreProducto', descripcion='$descripcion', precio='$precio', imagen='$imagen', id_categoria='$categoria', talla='$talla' where id='$id'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function eliminar($id){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="DELETE from productos where id = '$id'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function registro(Usuario $usuario){
            $conexion= new Conexion();
            $conexion->abrir();
            $nombre=$usuario->obtenerNombre();
            $email=$usuario->obtenerEmail();
            $password=$usuario->obtenerPassword();
            $sql="INSERT into usuarios values(null, '$nombre', '$email', '$password', 'cliente')";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function pedido($id){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="INSERT into usuarios values(null, '$_SESSION[id]', '$id', 1, '', '')";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function productoPorId($id){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT * from productos where id='$id'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function realizarPedido($cantidad, $idProducto){
            $conexion= new Conexion();
            $conexion->abrir();
            $fecha=date('Y-m-d H:i:s');
            $sql="INSERT into pedidos values(null, '$_SESSION[id]', '$idProducto', '$cantidad', '$fecha', 'pendiente')";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function verCategorias(){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT * from categorias";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function agregarCategoria($nombreCategoria){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="INSERT into categorias values(null, '$nombreCategoria')";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function eliminarCategoria($idCategoria){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="DELETE from categorias where id='$idCategoria'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
            return $result;
        }
        public function verPedidos(){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT *, usuarios.nombre as nombre_usuario, productos.nombre as nombre_producto, pedidos.id as id_pedido from pedidos join usuarios on pedidos.id_usuario=usuarios.id join productos on pedidos.id_producto=productos.id";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
        public function ordenar($categoria){
            $conexion= new Conexion();
            $conexion->abrir();
            $sql="SELECT *, categorias.nombre as nombre_categorias, productos.nombre as nombre_productos, categorias.id as id_categorias from categorias join productos on categorias.id=productos.id_categoria where id_categoria='$categoria'";
            $conexion->consulta($sql);
            $result=$conexion->obtenerResult();
            $conexion->cerrar();
            return $result;
        }
    }
?>