<?php

namespace controladores;

require_once("../modelo/Usuario.php");
use modelo\Usuario as Usuario;

class CambiarContrasena{
    private $cactual;
    private $cnueva;
    private $cconfirmar;

    public function __construct(){
        $this->cactual = $_POST['ca'];
        $this->cnueva = $_POST['cn'];
        $this->cconfirmar = $_POST['cc'];
    }

    public function cambiarContrasena(){
        session_start();
        $codigo = $_SESSION['user']['codigo_usuario'];
        $actual = $_SESSION['user']['contrasena'];
        $ca = md5($this->cactual);
        if($ca == $actual){
            if($this->cnueva == $this->cconfirmar){
                $usuario = new Usuario();
                $nueva = md5($this->cconfirmar);
                $count = $usuario->cambiarContrasena($nueva,$codigo);
                if($count == 1){
                    $u = $usuario->actualizar($codigo);
                    $_SESSION['user'] = $u[0];
                    $_SESSION['msg'] = "Contraseña actualizada correctamente";
                    if($_SESSION['user']['tipo']==2){
                        header("Location: ../vistas/vendedor/vendedor-datos.php");
                    }else{
                        header("Location: ../vistas/cliente/cliente-datos.php");
                    }
                }else{
                    $_SESSION['error'] = "Hubo un error";
                    header("Location: ../vistas/cambiarcontrasenia.php");
                }
            }else{
                $_SESSION['error'] = "Las contraseñas no coinciden";
                header("Location: ../vistas/cambiarcontrasenia.php");
            }
        }else{
            $_SESSION['error'] = "Revise la contraseña actual";
            header("Location: ../vistas/cambiarcontrasenia.php");
        }
    }

}
$obj = new CambiarContrasena();
$obj->cambiarContrasena();