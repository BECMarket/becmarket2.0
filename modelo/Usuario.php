<?php

namespace modelo;
require_once("Conexion.php");

class Usuario{

    public function inicarSesion($email, $contrasena){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE email=:A AND contrasena=:C");
        $stm->bindParam(":A",$email);
        $stm->bindParam(":C",$contrasena);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function crearUsuarios($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D,:E,:F,:G,:H,:I,:J,:K)");
        $stm->bindParam(":A",$data['codigo_usuario']);
        $stm->bindParam(":B",$data['email']);
        $stm->bindParam(":C",$data['nombre']);
        $stm->bindParam(":D",$data['apellidos']);
        $stm->bindParam(":E",$data['contrasena']);
        $stm->bindParam(":F",$data['telefono']);
        $stm->bindParam(":G",$data['estado']);
        $stm->bindParam(":H",$data['direccion']);
        $stm->bindParam(":I",$data['tipo']);
        $stm->bindParam(":J",$data['imagen']);
        $stm->bindParam(":K",$data['fechaCreacion']);
        return $stm->execute();
    }
    
    public function quitarUsuario($codigo){
        $stm = Conexion::conector()->prepare("DELETE FROM usuario WHERE codigo_usuario=:A");
        $stm->bindParam(":A",$codigo);
        return $stm->execute();
    }

    public function editarDatos($data,$codigo){
        $stm = Conexion::conector()->prepare("UPDATE usuario SET nombre=:A, apellidos=:B, direccion=:C, telefono=:D WHERE codigo_usuario=:E");
        $stm->bindParam(":A",$data['nombre']);
        $stm->bindParam(":B",$data['apellidos']);
        $stm->bindParam(":C",$data['direccion']);
        $stm->bindParam(":D",$data['telefono']);
        $stm->bindParam(":E",$codigo);
        return $stm->execute();
    }

    public function cambiarContrasena($nueva,$codigo){
        $stm = Conexion::conector()->prepare("UPDATE usuario SET contrasena=:A WHERE codigo_usuario=:B");
        $stm->bindParam(":A",$nueva);
        $stm->bindParam(":B",$codigo);
        return $stm->execute();
    }

    public function actualizar($codigo){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE codigo_usuario=:A");
        $stm->bindParam(":A",$codigo);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function nombreCliente($codigo){
        $stm = Conexion::conector()->prepare("SELECT nombre, apellidos FROM usuario WHERE codigo_usuario=:A");
        $stm->bindParam(":A",$codigo);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}
