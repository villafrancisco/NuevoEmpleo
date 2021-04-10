<?php


 //Clase hereda de Conexion
class DB extends Conexion{
   //ejecuta consulta tipo SELECT, le pasamos la consulta
   protected static function ejecutaConsulta($sql,$parametros) {
    $conexion= parent::conectar();
        if(isset($conexion)){
            $consulta=$conexion->prepare($sql);
            $consulta->execute($parametros);
        }
    return $consulta;
    }
   

    //devuelve todos las empresas
    public function getEmpresas() {
        $sql = "SELECT * FROM empresas";
        $parametros=array();
        $resultado = self::ejecutaConsulta($sql,$parametros);
        $empresas = array();
        if ($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $empresas[] = new Empresa($row);
                $row = $resultado->fetch();
            }
        }
        return $empresas;
    }
    //devuelve una empresa
    public function getEmpresa($idempresa) {
        $sql = "SELECT * FROM empresas WHERE idempresa = :idempresa";
        $parametros=array(':idempresa'   =>  $idempresa);
        $resultado = self::ejecutaConsulta($sql,$parametros);
        if ($resultado) {
            $empresa=new Empresa($resultado->fetch());
        }
        return $empresa;
    }
    //devuelve todas las familias
    public function getFamilias() {
        $sql = "SELECT * FROM familia";
        $parametros=array();
        $resultado = self::ejecutaConsulta($sql,$parametros);
        $familias = array();
        if ($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $familias[] = new Familia($row);
                $row = $resultado->fetch();
            }
        }
        return $familias;
    }
    public function getFamilia($idfamilia) {
        $sql = "SELECT * FROM familia WHERE idfamilia = :idfamilia";
        $parametros=array(':idfamilia'   =>  $idfamilia);
        $resultado = self::ejecutaConsulta($sql,$parametros);
        if (isset($resultado)) {
            $familia=new Familia($resultado->fetch());
        }
        return $familia;
    }

     //devuelve las ofertas de una familia de un ciclo
     public function getEmpleosFamilia($idfamilia) {
        $sql = "SELECT t1.* FROM empleos t1 INNER JOIN empleotitulo t2 ON t1.idempleo = t2.idempleo INNER JOIN titulos t3 ON t2.idtitulo = t3.idtitulo INNER JOIN familia t4 ON t3.idfamilia= t4.idfamilia WHERE t4.idfamilia= :idfamilia GROUP BY t1.idempleo";
        $parametros=array(':idfamilia'   =>  $idfamilia);
        $resultado = self::ejecutaConsulta($sql,$parametros);
        $empleos=array();
        if ($resultado) {
            $row=$resultado->fetch();
            while($row!=null){
                $empleos[]=new Empleo($row);
                $row=$resultado->fetch();
            }
            
        }
        return $empleos;
    }

    public function getTitulosEmpleo($idempleo){
        $sql = "SELECT * FROM empleos t1 INNER JOIN empleotitulo t2 ON t1.idempleo=t2.idempleo
        INNER JOIN titulos t3 ON t2.idtitulo=t3.idtitulo WHERE t1.idempleo = :idempleo";
        $parametros=array(':idempleo'   =>  $idempleo);
        $resultado = self::ejecutaConsulta($sql,$parametros);
        $titulos=array();
        if ($resultado) {
            $row=$resultado->fetch();
            while($row!=null){
                $titulos[]=new Titulo($row);
                $row=$resultado->fetch();
            }
            
        }
        return $titulos;

    }

    public function login($email,$contrasena,$tipo){
        $conexion=parent::conectar();
        if(isset($conexion)){
            try{
                $sql = "SELECT * FROM ".$tipo." empresas WHERE email=:email AND contrasena= :contrasena";
                $parametros=array(':email'   =>  $email,
                                    'contrasena'  => $contrasena );
                $consulta=self::ejecutaConsulta($sql, $parametros);
                while($resultado=$consulta->fetch()){
                    $usuario=new Usuario($resultado);
                    
                }
                if(isset($usuario)){
                    return $usuario;
                    
                }
                return false;
                } catch(PDOException $e){
                    return $e->getMessage();
            }
        }
    }


        
   

    /*
    public function actualizaPrecio($vehiculo){
        $sql = 'UPDATE vehiculo SET PVP = :PVP WHERE bastidor = :bastidor';
        $parametros=array(':PVP'    =>  $vehiculo->getPVP(),
                            ':bastidor'   =>  $vehiculo->getBastidor());
        $resultado = self::ejecutaConsulta($sql,$parametros);
        
        return $resultado; //Devuelve true si fue todo

    }

   //Devuelve una reserva
    public function getReserva($bastidor) {
        $sql = 'SELECT * FROM reserva WHERE reserva.id_bastidor = :bastidor';
        $parametros=array(':bastidor'    =>  $bastidor);
        $resultado = self::ejecutaConsulta($sql,$parametros);
        if (isset($resultado)) {
            $reserva=$resultado->fetch();
            if(!$reserva){
                return $reserva; //si no encuentra la reserva devuleve false
            }else{
                return $reserva=new Reserva($reserva); //si la encuentra devuelve la reserva
            }
        }
    }
    */
}
?>
