<?php

namespace controladores;

require_once("../modelo/Negocio.php");
use modelo\Negocio as Negocio;

class BuscarNegocio{
    private $nombre;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
    }

    public function buscar(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['estado']==1){
                if($_SESSION['user']['tipo']==1){
                    $n = new Negocio();
                    $negocios = $n->buscarNombre($this->nombre);
                    if($negocios == null){
                        $_SESSION['error']='Negocio no encontrado';
                        header("Location: ../vistas/cliente/cliente-negocio.php");
                    }else{
                        $_SESSION['buscar']=$this->nombre;
                        header("Location: ../vistas/cliente/cliente-negocio.php");
                    }
                }else{
                    $_SESSION['error'] ="Acceso denegado";
                    header("Location: ../vistas/cliente/cliente-negocio.php");
                }
            }else{
                $_SESSION['error'] ="Acceso denegado";
                header("Location: ../vistas/cliente/cliente-negocio.php");
            }
        }else{
            $_SESSION['error'] ="Acceso denegado";
            header("Location: ../vistas/cliente/cliente-negocio.php");
        }
        
    }

}
$obj = new BuscarNegocio();
$obj->buscar();