<?php

namespace controladores;

require_once("../modelo/Producto.php");
use modelo\Producto as Producto;

class TablaProductos{
    private $editar;
    private $eliminar;

    public function __construct(){
        $this->editar = $_POST['editar'];
        $this->eliminar = $_POST['eliminar'];
    }

    public function procesar(){
        if (isset($this->editar)) {
            session_start();
            $producto = new Producto();
            $p = $producto->buscarCodigo($this->editar);
            $_SESSION['producto'] = $p[0];
            header("Location: ../vistas/vendedor/vendedor-editar-producto.php");
        }else{
            $producto = new Producto();
            $producto->eliminarProducto($this->eliminar);
            header("Location: ../vistas/vendedor/vendedor-productos.php");
        }
    }
}
$obj = new TablaProductos();
$obj->procesar();