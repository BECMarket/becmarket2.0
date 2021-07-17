<?php

namespace controladores;

require_once("../modelo/Negocio.php");
use modelo\Negocio as Negocio;

class EditarDatosNegocio{
    private $dias;
    private $h1;
    private $h2;
    private $tele;
    private $email;
    private $costo;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        $this->dias = $_POST['dias'];
        $this->h1 = $_POST['h1'];
        $this->h2 = $_POST['h2'];
        $this->tele = $_POST['tele'];
        $this->email = $_POST['email'];
        $this->costo = $_POST['costo'];
    }

    public function editar(){
        session_start();
        //if (isset($_SESSION['user'])) {
            if($_SESSION['user']['tipo'] == 2){
                $rut = $_SESSION['negocio']['rut_negocio'];
                $horario = $this->h1 . " a " . $this->h2;
                $negocio = new Negocio();
                $data = [
                    'diasAtencion'=>$this->dias,
                    'horarioAtencion'=>$horario,
                    'telefono'=>$this->tele,
                    'email'=>$this->email,
                    'costoEnvio'=>$this->costo
                ];
                $c = $negocio->editarDatos($data,$rut);
                if($c == 1){
                    $a = $negocio->buscarNegocio($rut);
                    $update = $a[0];
                    $_SESSION['negocio'] = $update;
                    echo json_encode(["msg"=>"si"]);
                }else{
                    echo json_encode(["msg"=>"si"]);
                }       
            }else{
                echo json_encode(["msg"=>"Usuario no autorizado"]);
            }
        //}else{
        //    echo json_encode(["msg"=>"Acceso denegado"]);
        //}
            
    }

}
$obj = new EditarDatosNegocio();
$obj->editar();