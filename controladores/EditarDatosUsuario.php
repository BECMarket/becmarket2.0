<?php

namespace controladores;

require_once("../modelo/Usuario.php");
use modelo\Usuario as Usuario;

class EditarDatosUsuario{
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        $this->nombre = $_POST['nombre'];
        $this->apellidos = $_POST['apellidos'];
        $this->direccion = $_POST['direccion'];
        $this->telefono = $_POST['telefono'];
    }

    public function editar(){
        session_start(); 
        //if(isset($_SESSION['user'])){
            $codigo = $_SESSION['user']['codigo_usuario'];
            $usuario = new Usuario();
            $data = [
                'nombre'=>$this->nombre,
                'apellidos'=>$this->apellidos,
                'direccion'=>$this->direccion,
                'telefono'=>$this->telefono
            ];
            $c = $usuario->editarDatos($data,$codigo);
            if ($c == 1) {
                $n = $usuario->actualizar($codigo);
                $_SESSION['user'] = $n[0];
                echo json_encode(["msg"=>"si"]);
            }else{
                echo json_encode(["msg"=>"no"]);
            }
        //}else{
        //    echo json_encode(["msg"=>"acceso denegado"]);
        //}

    }

}
$obj = new EditarDatosUsuario();
$obj->editar();