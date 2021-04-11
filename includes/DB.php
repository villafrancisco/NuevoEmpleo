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
        try{
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
        }catch(PDOException $e){
            return false;
        }
        
    }
    //devuelve una empresa
    public function getEmpresa($idempresa) {
        try{
            $sql = "SELECT * FROM empresas WHERE idempresa = :idempresa";
            $parametros=array(':idempresa'   =>  $idempresa);
            $resultado = self::ejecutaConsulta($sql,$parametros);
            if ($resultado) {
                $empresa=new Empresa($resultado->fetch());
            }
            return $empresa;
        }catch(PDOException $e){
            return false;
        }
        
    }
    //devuelve todas las familias
    public function getFamilias() {
        try{
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
        }catch(PDOException $e){
            return false;
        }
        
    }
    public function getFamilia($idfamilia) {
        try{
            $sql = "SELECT * FROM familia WHERE idfamilia = :idfamilia";
            $parametros=array(':idfamilia'   =>  $idfamilia);
            $resultado = self::ejecutaConsulta($sql,$parametros);
            if (isset($resultado)) {
                $familia=new Familia($resultado->fetch());
            }
            return $familia;
        }catch(PDOException $e){
            return false;
        }
        
    }

     //devuelve las ofertas de una familia de un ciclo
     public function getEmpleosFamilia($idfamilia) {
         try{
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
         }catch(PDOException $e){
            return false;
         }
        
    }

    public function getTitulosEmpleo($idempleo){
        try{
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
        }catch(PDOException $e){
            return false;
        }
    }

    public function getUsuario($email,$contrasena,$tipo){
        try{
            $sql = "SELECT * FROM usuarios t1 INNER JOIN ".$this->getTipoTabla($tipo)." as t2 ON t1.idusuario=t2.idusuario WHERE t2.email=:email AND t2.contrasena= :contrasena AND t1.idtipo = :tipo";
            $parametros=array(':email'   =>  $email,
                                ':contrasena'  => $contrasena,
                                ':tipo'  => $tipo );
            $consulta=self::ejecutaConsulta($sql, $parametros);
            while($resultado=$consulta->fetch()){
                $usuario=new Usuario($resultado);
            }
            if(isset($usuario)){
                return $usuario;
            }
            return false;
        }catch(PDOException $e){
            return false;
        }     
        
    }

    public function getEmailUsuario($email){
        try{
            $sql = "SELECT administradores.email AS email FROM administradores WHERE administradores.email=:email
                    UNION 
                    SELECT empresas.email AS email FROM empresas WHERE empresas.email=:email
                    UNION
                    SELECT titulados.email AS email FROM titulados WHERE titulados.email=:email";
            $parametros=array(':email'   =>  $email);
            $consulta=self::ejecutaConsulta($sql, $parametros);
            return $consulta->fetch();
        }catch(PDOException $e){
            return false;
        }
    }
    public function getTipoTabla($tipo){
        switch($tipo){
            case "1":
                return "administradores";
                break;
            case "2":
                return "empresas";
                break;
            case "3":
                return "titulados";
                break;
            default:
                break;
        }
    }

    public function crearNuevoUsuario($email,$contrasena,$tipo){
        

        try{
            $conexion= parent::conectar();
            $conexion->beginTransaction();
            $conexion->query('INSERT INTO usuarios (idtipo) VALUES ("'.$tipo.'")');
            $idusuario=$conexion->lastInsertId();
            $consulta='INSERT INTO '.$this->getTipoTabla($tipo).' (idusuario,email,contrasena) VALUES ('.$idusuario.','.$email.','.$contrasena.')';
            $conexion->query('INSERT INTO '.$this->getTipoTabla($tipo).' (idusuario,email,contrasena) VALUES ("'.$idusuario.'","'.$email.'","'.$contrasena.'")');
            $conexion->commit();
            $usuario=$this->getUsuario($email,$contrasena,$tipo);
            return $usuario;
        }catch(PDOException $e){
            $conexion->rollBack();
            return false;
            
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
