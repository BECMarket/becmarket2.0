<?php

namespace modelo;
require_once("Conexion.php");

class Negocio{
    public function nuevoNegocio($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO negocio VALUES(:A,:B,:C,:D,:E,:F,:G,:H,:I,:J,:K,:L,:M)");
        $stm->bindParam(":A",$data['rut_negocio']);
        $stm->bindParam(":B",$data['nombreNegocio']);
        $stm->bindParam(":C",$data['direccionNegocio']);
        $stm->bindParam(":D",$data['imagenNegocio']);
        $stm->bindParam(":E",$data['estadoNegocio']);
        $stm->bindParam(":F",$data['costoEnvio']);
        $stm->bindParam(":G",$data['tipoNegocio']);
        $stm->bindParam(":H",$data['horarioAtencion']);
        $stm->bindParam(":I",$data['diasAtencion']);
        $stm->bindParam(":J",$data['abierto_cerrado']);
        $stm->bindParam(":K",$data['emailNegocio']);
        $stm->bindParam(":L",$data['telefonoNegocio']);
        $stm->bindParam(":M",$data['vendedorfk']);
        return $stm->execute();
    }

    public function buscarNegocioVendedor($codeUser){
        $stm = Conexion::conector()->prepare("SELECT * FROM negocio WHERE vendedorfk=:A");
        $stm->bindParam(":A",$codeUser);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarNegocio($negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM negocio WHERE rut_negocio=:A");
        $stm->bindParam(":A",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarNegocioNombre($negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM negocio WHERE nombre=:A");
        $stm->bindParam(":A",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function editarDatos($data,$negocio){
        $stm = Conexion::conector()->prepare("UPDATE negocio SET diasAtencion=:A, horarioAtencion=:B, telefono=:C, email=:D, costoEnvio=:E WHERE rut_negocio=:F");
        $stm->bindParam(":A",$data['diasAtencion']);
        $stm->bindParam(":B",$data['horarioAtencion']);
        $stm->bindParam(":C",$data['telefono']);
        $stm->bindParam(":D",$data['email']);
        $stm->bindParam(":E",$data['costoEnvio']);
        $stm->bindParam(":F",$negocio);
        return $stm->execute();
    }

    public function cambiarAtencion($atencion,$rut){
        $stm = Conexion::conector()->prepare("UPDATE negocio SET abierto_cerrado=:A WHERE rut_negocio=:B");
        $stm->bindParam(":A",$atencion);
        $stm->bindParam(":B",$rut);
        return $stm->execute();
    }

    public function getAllNegocio(){
        $stm = Conexion::conector()->prepare("SELECT * FROM negocio");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function buscarNombre($nombre){
        $stm = Conexion::conector()->prepare("SELECT * FROM producto WHERE nombre LIKE '%' :A '%'");
        $stm->bindParam(":A",$nombre);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}