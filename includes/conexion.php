<?php
//Clase abstracta para conectar a la bd


/**
 * Conexion
 */
abstract class Conexion
{
    /**
     * conectar
     *
     * @return mixed
     */
    protected static function conectar()
    {
        //Hacemos la conexion dentro de un bloque try para comprobar que se conecta
        try {
            $conexion = new PDO(MYSQL_HOST, USUARIO, CONTRASENA, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            $error = $ex->getMessage();
        }
        return $conexion;
    }
}
