<?php
 class Usuario{
    private $nombre;
    private $email;
    private $password;
    public function __construct($nombre, $email, $password){
        $this->nombre=$nombre;
        $this->email=$email;
        $this->password=$password;
    }
    public function obtenerNombre(){
        return $this->nombre;
    }
    public function obtenerEmail(){
        return $this->email;
    }
    public function obtenerPassword(){
        return $this->password;
    }
 }
 
?>