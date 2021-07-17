<?php

namespace modelo;
require_once("Conexion.php");

class Pedidos{

    //PEDIDOS DEL NEGOCIO
    public function pedidosNegocio($estado,$negocio){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE estado=:A AND negociofk=:B");
        $stm->bindParam(":A",$estado);
        $stm->bindParam(":B",$negocio);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //PEDIDOS DEL CLIENTE | ESTADO != ENTREGADO
    public function pedidosEnCursoCliente($cliente){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE compradorfk=:A AND estado NOT LIKE 'entregado'");
        $stm->bindParam(":A",$cliente);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //PEDIDOS DEL CLIENTE | ESTADO = ENTREGADO
    public function pedidosEntregadosCliente($cliente){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE compradorfk=:A AND estado LIKE 'entregado'");
        $stm->bindParam(":A",$cliente);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function pedido($codigo){
        $stm = Conexion::conector()->prepare("SELECT * FROM pedido WHERE codigo_pedido=:A");
        $stm->bindParam(":A",$codigo);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}