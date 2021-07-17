<?php

namespace controladores;

require_once("../modelo/Usuario.php");
use modelo\Usuario as Usuario;
require_once("../modelo/Negocio.php");
use modelo\Negocio as Negocio;

class NuevoVendedor{
    //datos negocio
    public $rut_negocio;
    public $nombreNegocio;
    public $direccionNegocio;
    public $tipoNegocio;
    public $vendedorfk;

    //datos vendedor
    public $codigo_usuario ;
    public $email;
    public $nombre;
    public $apellidos;
    public $contrasena;
    public $telefono;
    public $fechaCreacion;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        //negocio
        $this->rut_negocio = $_POST['rut_negocio'];
        $this->nombreNegocio = $_POST['nombreNegocio'];
        $this->direccionNegocio = $_POST['direccionNegocio'];
        $this->tipoNegocio = $_POST['tipoNegocio'];
        $this->vendedorfk = $_POST['vendedorfk'];

        //vendedor
        $this->codigo_usuario = $_POST['codigo_usuario'];
        $this->email = $_POST['email'];
        $this->nombre = $_POST['nombre'];
        $this->apellidos = $_POST['apellidos'];
        $this->contrasena = $_POST['contrasena'];
        $this->telefono = $_POST['telefono'];
        $this->fechaCreacion = $_POST['fechaCreacion'];

    }

    public function insertar(){
        //nuevo vendedor
        $vendedor = new Usuario();
        $dataVendedor = [
            'codigo_usuario'=>$this->codigo_usuario,
            'email'=>$this->email,
            'nombre'=>$this->nombre,
            'apellidos'=>$this->apellidos,
            'contrasena'=>md5($this->contrasena),
            'telefono'=>$this->telefono,
            'estado'=>0,
            'direccion'=>"Sin asignar",
            'tipo'=>2,
            'imagen'=>"https://localhost/BECMarket/img/noimg.png",
            'fechaCreacion'=>$this->fechaCreacion,
        ];

        //nuevo negocio
        $negocio = new Negocio();
        $dataNegocio = [
            'rut_negocio'=>$this->rut_negocio,
            'nombreNegocio'=>$this->nombreNegocio,
            'direccionNegocio'=>$this->direccionNegocio,
            'imagenNegocio'=>"https://localhost/BECMarket/img/noimg.png",
            'estadoNegocio'=>0,
            'costoEnvio'=>0,
            'tipoNegocio'=>$this->tipoNegocio,
            'horarioAtencion'=>"0",
            'diasAtencion'=>"0",
            'abierto_cerrado'=>"cerrado",
            'emailNegocio'=>"Sin asignar",
            'telefonoNegocio'=>"Sin asignar",
            'vendedorfk'=>$this->vendedorfk,
        ];
        $countV = $vendedor->crearUsuarios($dataVendedor);
        if($countV == 1){
            $countN = $negocio->nuevoNegocio($dataNegocio);
            if($countN == 1){
                echo json_encode(["msg"=>"si"]);
            }else{
                $vendedor->quitarUsuario($this->codigo_usuario);
                echo json_encode(["msg"=>"negocio"]);
            }
        }else{
            echo json_encode(["msg"=>"vendedor"]);
        }

    }
}
$obj = new NuevoVendedor();
$obj->insertar();