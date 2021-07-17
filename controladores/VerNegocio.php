<?php
namespace controladores;

require_once("../modelo/Negocio.php");
use modelo\Negocio as Negocio;

class VerNegocio{
    public $rutNegocio;
    
    public function __construct()
    {
        $this->rutNegocio = $_POST['rutNegocio'];
    }

    public function verNegocio(){
        session_start();
        $negocio = new Negocio();
        $rut = $this->rutNegocio;
        $n = $negocio->buscarNegocio($rut);
        if($n == 0){
            $_SESSION['error'] = "NO SEEEEEEEEEEEEEEE";
            header("Location: ../vistas/cliente/cliente-negocio.php");
        }else{
            $_SESSION['ne'] = $n[0];
            header("Location: ../vistas/cliente/cliente-ver-negocio.php");
        }
        
    }
}
$obj = new VerNegocio();
$obj->verNegocio();