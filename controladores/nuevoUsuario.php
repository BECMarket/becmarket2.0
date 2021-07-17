<?php

namespace controladores;

require_once("../modelo/Usuario.php");

use modelo\Usuario as Usuario;


class nuevoUsuario
{
    public $email;
    public $nombre;
    public $apellidos;
    public $contrasena;
    public $telefono;
    public $direccion;
    public $fechaCreacion;
    public $rand;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->apellidos = $_POST['apellidos'];
        $this->contrasena = $_POST['contrasena'];
        $this->telefono = $_POST['telefono'];
        $this->direccion = $_POST['direccion'];
        $this->fechaCreacion = $_POST['fechaCreacion'];
        $this->rand = rand(1, 30000000000);

    }

    public function agregar()
    {
        $comprador = new Usuario();
        $dataCompra = [
            'codigo_usuario'=> $this->rand,
            'email'=>$this->email,
            'nombre'=>$this->nombre,
            'apellidos'=>$this->apellidos,
            'contrasena'=>md5($this->contrasena),
            'telefono'=>$this->telefono,
            'direccion'=>$this->direccion,
            'estado'=>1,
            'tipo'=>1,
            'imagen'=>"https://localhost/BECMarket/img/noimg.png",
            'fechaCreacion'=>$this->fechaCreacion,
        ];
        
        $countC = $comprador->crearUsuarios($dataCompra);
        if($countC == 1){
            //$a = $comprador->actualizar($this->rand);
            //$_SESSION['user'] = $a[0];
            echo json_encode(["msg"=>"si"]);
        }else{
            echo json_encode(["msg"=>"no"]);
        }
    }
}

$obj = new nuevoUsuario();
$obj->agregar();
