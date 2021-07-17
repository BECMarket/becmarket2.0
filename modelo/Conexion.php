<?php

namespace modelo;

class Conexion
{
    public static $user = "root";
    public static $pass = "root";
    public static $URL = "mysql:host=localhost;dbname=bec_market";


    public static function conector()
    {
        try {
            return new \PDO(Conexion::$URL, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}
