<?php 

namespace controladores;
use modelo\Usuario as Usuario;
require_once("../modelo/Usuario.php");
use modelo\Negocio as Negocio;
require_once("../modelo/Negocio.php");

class ControlLogin{
    public $email;
    public $contrasena;

    public function __construct()
    {
        $this->email = $_POST['email'];
        $this->contrasena = $_POST['contrasena'];
    }

    public function iniciarSesion(){
        session_start();
        $usuario = new Usuario();
        $array = $usuario->inicarSesion($this->email, md5($this->contrasena));
        if(count($array) == 0){
            $_SESSION['error'] = 'Datos incorrectos';
            header("Location: ../login.php");
            return;
        }
        $a = $array[0];
        $_SESSION['user'] = $a;
        
        //if($_SESSION['user']['estado']==1){
            if($_SESSION['user']['tipo'] == 1){
                header("Location: ../vistas/cliente/cliente-inicio.php");
            }else if($_SESSION['user']['tipo']==2){
                $codeUser = $_SESSION['user']['codigo_usuario'];
                $negocio = new Negocio();
                $arreglo = $negocio->buscarNegocioVendedor($codeUser);
                $r = $arreglo[0];
                $_SESSION['negocio'] = $r;
                header("Location: ../vistas/vendedor/vendedor-inicio.php");
            }
        //}else{
        //    $_SESSION['error'] = 'Usuario no habilitado';
        //    header("Location: ../login.php");
        //}
    }
}
$obj = new ControlLogin();
$obj->iniciarSesion();
