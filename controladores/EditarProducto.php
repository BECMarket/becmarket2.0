<?php

namespace controladores;

require_once("../modelo/Producto.php");
use modelo\Producto as Producto;

class EditarProducto{
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

    public function editar(){ 
        $nombre_foto = $_FILES['foto']['name'];
        $temp = $_FILES['foto']['tmp_name'];

        $extension = end(explode('.', $nombre_foto));
        $nuevoNombre = $_POST['nombre'] . "_" . date("Y-m-d_H:i:s", time()) . "." . $extension;

        if (move_uploaded_file($temp, '../uploads/' . $nuevoNombre)) {
            $foto = 'http://localhost/BECMarket/uploads/' . $nuevoNombre;
        } else {
            $foto = 'http://localhost/BECMarket/img/noimg.png';
        }

        session_start();
        $codigo = $_SESSION['producto']['codigo_producto'];

        $producto = new Producto();
        $data = [
            'nombre'=>$this->nombre,
            'precio'=>$this->precio,
            'stock'=>$this->stock,
            'descripcion'=>$this->descripcion,
            'imagen'=>$foto
        ];
        $count = $producto->editarProducto($data,$codigo);
        if ($count == 1) {
            unset($_SESSION['producto']);
            header("Location: ../vistas/vendedor/vendedor-productos.php");
        }else{
            $_SESSION['error'] = 'Hubo un error';
        }
    
    }
}
$obj = new EditarProducto();
$obj->editar();