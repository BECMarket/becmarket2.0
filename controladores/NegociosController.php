<?php 

namespace controladores;

use modelo\Negocio as Negocio;

require_once("../modelo/Negocio.php");

class Negocios{

    public function getNegocios(){
        $modelo = new Negocio();
        echo json_encode($modelo->getAllNegocio());
    }
}

$obj = new Negocios();
$obj->getNegocios();