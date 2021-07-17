<?php

namespace controladores;

require_once("../modelo/Producto.php");
use modelo\Producto as Producto;

class NuevoProducto{
    private $nombre;
    private $precio;
    private $stock;
    private $descripcion;

    public function __construct(){
        $this->nombre = $_POST['nombre'];
        $this->precio = $_POST['precio'];
        $this->stock = $_POST['stock'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function agregar(){
        $nombre_foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $extension = end(explode('.', $nombre_foto));
        $nuevoNombre = $_POST['nombre'] . "_" . date("Y-m-d_H:i:s", time()) . "." . $extension;

        if (move_uploaded_file($temp, '../uploads/' . $nuevoNombre)) {
            $foto = 'http://localhost/BECMarket/uploads/' . $nuevoNombre;
        } else {
            $foto = 'http://localhost/BECMarket/img/noimg.png';
        }

        $a = substr($this->nombre,0,3);
        $pt1 = strtoupper($a);
        $pt2 = rand(100,999);
        $codigo = $pt1.$pt2;

        session_start();
        $negocio = $_SESSION['negocio']['rut_negocio'];

        $producto = new Producto();
        $data = [
            'codigo_producto'=>$codigo,
            'nombre'=>$this->nombre,
            'precio'=>$this->precio,
            'stock'=>$this->stock,
            'descripcion'=>$this->descripcion,
            'imagen'=>$foto,
            'negociofk'=>$negocio
        ];
        $count = $producto->nuevoProducto($data);
        if ($count == 1) {
            header("Location: ../vistas/vendedor/vendedor-productos.php");
        }else{
            $_SESSION['error'] = 'Hubo un error';
        }
    }
}
$obj = new NuevoProducto();
$obj->agregar();