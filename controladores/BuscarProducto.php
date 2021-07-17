<?php

namespace controladores;

require_once("../modelo/Producto.php");
use modelo\Producto as Producto;

class BuscarProducto{
    private $nombre;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
    }

    public function buscar(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['estado']==1){
                if($_SESSION['user']['tipo']==2){
                    $negocio = $_SESSION['negocio']['rut_negocio'];
                    $p = new Producto();
                    $productos = $p->buscarNombre($this->nombre,$negocio);
                    if($productos == null){
                        $_SESSION['error']='Producto no encontrado';
                        header("Location: ../vistas/vendedor/vendedor-productos.php");
                    }else{
                        $_SESSION['buscar']=$this->nombre;
                        header("Location: ../vistas/vendedor/vendedor-productos.php");
                    }
                }else{
                    $_SESSION['error'] ="Acceso denegado";
                    header("Location: ../vistas/vendedor/vendedor-productos.php");
                }
            }else{
                $_SESSION['error'] ="Acceso denegado";
                header("Location: ../vistas/vendedor/vendedor-productos.php");
            }
        }else{
            $_SESSION['error'] ="Acceso denegado";
            header("Location: ../vistas/vendedor/vendedor-productos.php");
        }
        
    }

}
$obj = new BuscarProducto();
$obj->buscar();