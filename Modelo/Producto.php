<?php
    class Producto{
        private $nombre;
        private $precio;
        private $talla;
        private $descripcion;
        private $categoria;
        private $imagen;
        public function __construct($nombre, $precio, $talla, $descripcion, $categoria, $imagen){
            $this->nombre=$nombre;
            $this->precio=$precio;
            $this->talla=$talla;
            $this->descripcion=$descripcion;
            $this->categoria=$categoria;
            $this->imagen=$imagen;
        }
        public function obtenerNombre(){
            return $this->nombre;
        }
        public function obtenerPrecio(){
            return $this->precio;
        }
        public function obtenerTalla(){
            return $this->talla;
        }
        public function obtenerDescripcion(){
            return $this->descripcion;
        }
        public function obtenerCategoria(){
            return $this->categoria;
        }
        public function obtenerImagen(){
            return $this->imagen;
        }
    }
?>