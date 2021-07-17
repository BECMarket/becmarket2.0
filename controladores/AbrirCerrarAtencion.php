<?php

namespace controladores;

require_once("../modelo/Negocio.php");
use modelo\Negocio as Negocio;

class AbrirCerrarAtencion{
    private $atencion;

    public function __construct()
    {
        $this->atencion = $_POST['cambiar'];
    }

    public function cambiarAtencion(){
        session_start();
        $negocio = new Negocio();
        if($this->atencion == 'cerrado'){
            $at = 'abierto';
            $rut = $_SESSION['negocio']['rut_negocio'];
            $c = $negocio->cambiarAtencion($at,$rut);
            if($c == 1){
                $a = $negocio->buscarNegocio($rut);
                $update = $a[0];
                $_SESSION['negocio'] = $update;
                $_SESSION['msg'] = "listo";
                header("Location: ../vistas/vendedor/vendedor-inicio.php");
            }else{
                $_SESSION['msg'] = "casi";
            }
        }else{
            $at = 'cerrado';
            $rut = $_SESSION['negocio']['rut_negocio'];
            $c = $negocio->cambiarAtencion($at,$rut);
            if($c == 1){
                $a = $negocio->buscarNegocio($rut);
                $update = $a[0];
                $_SESSION['negocio'] = $update;
                $_SESSION['msg'] = "listo";
                header("Location: ../vistas/vendedor/vendedor-inicio.php");
            }else{
                $_SESSION['msg'] = "casi";
            }
        }
    }
}
$obj = new AbrirCerrarAtencion();
$obj->cambiarAtencion();