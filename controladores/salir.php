<?php
    require_once("../modelo/Negocio.php");
    use modelo\Negocio as Negocio;

    session_start();
    if($_SESSION['user']['tipo']==2){
        if($_SESSION['negocio']['abierto_cerrado'] == 'abierto'){
            $negocio = new Negocio();
            $at = 'cerrado';
            $rut = $_SESSION['negocio']['rut_negocio'];
            $negocio->cambiarAtencion($at,$rut);
        }
    }
    session_destroy();
    header("Location: ../login.php");
?>