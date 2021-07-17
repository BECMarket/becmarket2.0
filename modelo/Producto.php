<?php

namespace modelo;
require_once("Conexion.php");

class Producto{
    public function nuevoProducto($data){
        $stm = Conexion::conector()->prepare("INSERT INTO producto VALUES(:A,:B,:C,:D,:E,:F,:G)");
        $stm->bindParam(":A",$data['codigo_producto']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['precio']);
        $stm->bindParam(":D",$data['stock']);
        $stm->bindParam(":E",$data['descripcion']);
        $stm->bindParam(":F",$data['imagen']);
        $stm->bindParam(":G",$data['negociofk']);
        return $stm->execute();
    }
    
    public function buscarProductos($negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM producto WHERE negociofk=:A");
        $stm->bindParam(":A",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarNombre($nombre,$negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM producto WHERE nombre LIKE '%' :A '%' AND negociofk=:B");
        $stm->bindParam(":A",$nombre);
        $stm->bindParam(":B",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarCodigo($codigo){
        $stm = Conexion::conector()->prepare("SELECT * FROM producto WHERE codigo_producto=:A");
        $stm->bindParam(":A",$codigo);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarProducto($codigo){
        $stm = Conexion::conector()->prepare("DELETE FROM producto where codigo_producto=:A");
        $stm->bindParam(":A", $codigo);
        return $stm->execute();
    }

    public function editarProducto($data, $codigo){ 
        $stm = Conexion::conector()->prepare("UPDATE producto SET nombre=:A, precio=:B, stock=:C, descripcion=:D, imagen=:E WHERE codigo_producto=:F");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['precio']);
        $stm->bindParam(":C", $data['stock']);
        $stm->bindParam(":D", $data['descripcion']);
        $stm->bindParam(":E", $data['imagen']);
        $stm->bindParam(":F", $codigo);
        return $stm->execute();
    }

}