<?php

/**
 * DB
 */
class DB extends Conexion{
   
   /**
    * ejecutaConsulta
    *
    *ejecuta consulta tipo SELECT, le pasamos la consulta   
    *
    * @param  mixed $sql
    * @param  mixed $parametros
    * @return mixed
    */
   protected static function ejecutaConsulta($sql,$parametros) {
    $conexion= parent::conectar();
        if(isset($conexion)){
            $consulta=$conexion->prepare($sql);
            $consulta->execute($parametros);
        }
    return $consulta;
    }
   

      
    /**
     * getEmpresas
     * 
     * devuelve todas las empresas  
     *
     * @return mixed
     */
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
      
    /**
     * getEmpresa
     * 
     * //devuelve una empresa  
     *
     * @param  mixed $idempresa
     * @return mixed
     */
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
    
    /**
     * getFamilias
     * 
     * //devuelve todas las familias    
     *
     * @return mixed
     */
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
    
    /**
     * getAllEmpleos
     * 
     * devuelve todos los empleos
     *
     * @return mixed
     */
    public function getAllEmpleos(){
        try{
            $sql = "SELECT * FROM empleos";
            $parametros=array();
            $resultado = self::ejecutaConsulta($sql,$parametros);
            $empleos = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $empleos[] = new Empleo($row);
                    $row = $resultado->fetch();
                }
            }
            return $empleos;

        }catch(PDOException $e){
            $e->getMessage();
        }
    }    
    /**
     * getFamilia
     * 
     * devuelve la familia profesional
     *
     * @param  mixed $idfamilia
     * @return mixed
     */
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

      
     /**
      * getEmpleosFamilia
      *
      *devuelve los empleos publicados de una familia de un ciclo    
      *
      * @param  mixed $idfamilia
      * @return mixed
      */
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
    
    /**
     * getTitulosEmpleo
     * 
     * devuelve los titulos necesarios para un empleo
     *
     * @param  mixed $idempleo
     * @return mixed
     */
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
    
    /**
     * getUsuario
     * 
     * devuelve el usuario
     *
     * @param  mixed $email
     * @param  mixed $contrasena
     * @param  mixed $tipo
     * @return mixed
     */
    public function getUsuario($email,$contrasena,$tipo){
        try{
            // $sql = "SELECT * FROM usuarios t1 INNER JOIN ".$this->getTipoTabla($tipo)." as t2 ON t1.idusuario=t2.idusuario WHERE t2.email=:email AND t2.contrasena= :contrasena AND t1.idtipo = :tipo";

            $sql="SELECT t1.idusuario,t1.tipousuario  FROM usuarios AS t1 INNER JOIN (SELECT administradores.email AS email, administradores.idusuario AS idusuario, administradores.contrasena AS contrasena  FROM administradores 
                UNION 
            SELECT empresas.email AS email,  empresas.idusuario AS idusuario, empresas.contrasena AS contrasena  FROM empresas 
                UNION
            SELECT titulados.email AS email,  titulados.idusuario AS idusuario, titulados.contrasena AS contrasena FROM titulados) AS t2 ON t1.idusuario=t2.idusuario
            WHERE  email= :email AND contrasena=:contrasena AND tipousuario=:tipo";
            $parametros=array(':email'   =>  $email,
                                ':contrasena'  => hash('sha512',$contrasena),
                                ':tipo'  => $tipo );
            $consulta=self::ejecutaConsulta($sql, $parametros);
            while($resultado=$consulta->fetch()){
                $usuario=new Usuario($resultado);
            }
            //Si ha encontrado a un usuario devuelve el usuario
            if(isset($usuario)){
                return $usuario;
            }
            return false;
        }catch(PDOException $e){
            return false;
        }     
    }

  

    
    /**
     * getEmailUsuario
     * 
     * devuelve si el email esta registrado
     *
     * @param  mixed $email
     * @return miexed
     */
    public function getEmailUsuario($email,$tipo){
        try{
            // $sql = "SELECT administradores.email AS email FROM administradores WHERE administradores.email=:email
            //         UNION 
            //         SELECT empresas.email AS email FROM empresas WHERE empresas.email=:email
            //         UNION
            //         SELECT titulados.email AS email FROM titulados WHERE titulados.email=:email";
            $sql="SELECT t1.idusuario,t1.tipousuario  FROM usuarios AS t1 INNER JOIN (SELECT administradores.email AS email, administradores.idusuario AS idusuario FROM administradores 
                UNION 
            SELECT empresas.email AS email,  empresas.idusuario AS idusuario FROM empresas 
                UNION
            SELECT titulados.email AS email,  titulados.idusuario AS idusuario FROM titulados) AS t2 ON t1.idusuario=t2.idusuario
            WHERE  email= :email AND tipousuario=:tipo";
            $parametros=array(':email'      =>  $email,
                                ':tipo'     =>  $tipo);
            $consulta=self::ejecutaConsulta($sql, $parametros);
            return $consulta->fetch();
        }catch(PDOException $e){
            return false;
        }
    }    
    /**
     * getTipoTabla
     * 
     * 
     *
     * @param  mixed $tipo
     * @return mixed
     */
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
    
    /**
     * crearNuevoUsuario
     *
     * @param  mixed $email
     * @param  mixed $contrasena
     * @param  mixed $tipo
     * @return mixed
     */
    public function crearNuevoUsuario($email,$contrasena,$tipo){
        
        try{
            $conexion= parent::conectar();
            $conexion->beginTransaction();
            $conexion->query('INSERT INTO usuarios (tipousuario) VALUES ("'.$tipo.'")');
            $idusuario=$conexion->lastInsertId();
            
            $conexion->query('INSERT INTO '.$this->getTipoTabla($tipo).' (idusuario,email,contrasena) VALUES ("'.$idusuario.'","'.$email.'","'.hash('sha512',$contrasena).'")');
            $conexion->commit();
            $usuario=$this->getUsuario($email,$contrasena,$tipo);
            return $usuario;
        }catch(PDOException $e){
            $conexion->rollBack();
            return false;
            
        }
        
    }
    
    /**
     * getAdministrador
     * 
     * devuelve los datos del administrador
     *
     * @param  mixed $idusuario
     * @return void
     */
    public function getAdministrador($idusuario){
        try{
            $sql = "SELECT * FROM administradores WHERE idusuario = :idusuario";
            $parametros=array(':idusuario'   =>  $idusuario);
            $consulta=self::ejecutaConsulta($sql, $parametros);
            while($resultado=$consulta->fetch()){
                $administrador=new Administrador($resultado);
            }
            if(isset($administrador)){
                return $administrador;
            }
            return false;
        }catch(PDOException $e){
            return false;
        }     
    }
}
?>
