<?php
//Clase abstracta para conectar a la bd


/**
 * Conexion
 */
abstract class Conexion{
    private const MYSQL_HOST=SGDB;
    private const USUARIO=USER;
    private const PASSWORD=PASS;
    private const OPC = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    
      
    /**
     * conectar
     *
     * @return mixed
     */
    protected static function conectar(){
        //Hacemos la conexion dentro de un bloque try para comprobar que se conecta
        try{
            $conexion=new PDO(Conexion::MYSQL_HOST, Conexion::USUARIO,Conexion::PASSWORD,Conexion::OPC);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            $error=$ex->getMessage();
        }
        return $conexion;
    }
}


?>