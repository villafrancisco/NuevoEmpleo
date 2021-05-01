<?php

/**
 * DB
 */
class DB extends Conexion
{

    /**
     * ejecutaConsulta
     *
     *ejecuta consulta tipo SELECT, le pasamos la consulta   
     *
     * @param  mixed $sql
     * @param  mixed $parametros
     * @return mixed
     */
    protected static function ejecutaConsulta($sql, $parametros)
    {
        $conexion = parent::conectar();
        if (isset($conexion)) {
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
        }
        return $consulta;
    }
    protected static function ejecutaConsultaUID($sql, $parametros)
    {
        $conexion = parent::conectar();
        if (isset($conexion)) {
            $consulta = $conexion->prepare($sql);
            $resultado = $consulta->execute($parametros);
        }
        return $resultado;
    }

    /**
     * getEmpresas
     * 
     * devuelve todas las empresas  
     *
     * @return mixed
     */
    public function getEmpresas()
    {
        try {
            $sql = "SELECT * FROM empresas";
            $parametros = array();
            $resultado = self::ejecutaConsulta($sql, $parametros);
            $empresas = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $empresas[] = new Empresa($row);
                    $row = $resultado->fetch();
                }
            }
            return $empresas;
        } catch (PDOException $e) {
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
    public function getFamilias()
    {
        try {
            $sql = "SELECT * FROM familia";
            $parametros = array();
            $resultado = self::ejecutaConsulta($sql, $parametros);
            $familias = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $familias[] = new Familia($row);
                    $row = $resultado->fetch();
                }
            }
            return $familias;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getFamiliasTitulo
     * 
     * //devuelve la familia profesional de un titulo  
     *
     * @return mixed
     */
    public function getFamiliasTitulo($idtitulo)
    {
        try {
            $sql = "SELECT * FROM familia as t1 INNER JOIN titulos as t2 ON t1.idfamilia=t2.idfamilia WHERE t2.idtitulo=:idtitulo";
            $parametros = array(':idtitulo' =>  $idtitulo);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $familia = new Familia($resultado->fetch());
            }
            return $familia;
        } catch (PDOException $e) {
            return false;
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
    public function getFamilia($idfamilia)
    {
        try {
            $sql = "SELECT * FROM familia WHERE idfamilia = :idfamilia";
            $parametros = array(':idfamilia'   =>  $idfamilia);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $familia = new Familia($resultado->fetch());
            }
            return $familia;
        } catch (PDOException $e) {
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
    public function getAllEmpleos()
    {
        try {
            $sql = "SELECT * FROM empleos";
            $parametros = array();
            $resultado = self::ejecutaConsulta($sql, $parametros);
            $empleos = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $empleos[] = new Empleo($row);
                    $row = $resultado->fetch();
                }
            }
            return $empleos;
        } catch (PDOException $e) {
            $e->getMessage();
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
    public function getEmpleosFamilia($idfamilia)
    {
        try {
            $sql = "SELECT t1.* FROM empleos t1 INNER JOIN empleotitulo t2 ON t1.idempleo = t2.idempleo INNER JOIN titulos t3 ON t2.idtitulo = t3.idtitulo INNER JOIN familia t4 ON t3.idfamilia= t4.idfamilia WHERE t4.idfamilia= :idfamilia GROUP BY t1.idempleo";
            $parametros = array(':idfamilia'   =>  $idfamilia);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            $empleos = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $empleos[] = new Empleo($row);
                    $row = $resultado->fetch();
                }
            }
            return $empleos;
        } catch (PDOException $e) {
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
    public function getTitulosEmpleo($idempleo)
    {
        try {
            $sql = "SELECT * FROM empleos t1 INNER JOIN empleotitulo t2 ON t1.idempleo=t2.idempleo
            INNER JOIN titulos t3 ON t2.idtitulo=t3.idtitulo WHERE t1.idempleo = :idempleo";
            $parametros = array(':idempleo'   =>  $idempleo);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            $titulos = array();
            if ($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $titulos[] = new Titulo($row);
                    $row = $resultado->fetch();
                }
            }
            return $titulos;
        } catch (PDOException $e) {
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
    public function getUsuario($email, $contrasena, $tipo)
    {
        try {
            $sql = "SELECT * FROM usuarios t1 INNER JOIN " . $this->getTipoTabla($tipo) . " as t2 ON t1.idusuario=t2.idusuario WHERE t2.email=:email AND t2.contrasena= :contrasena AND t1.tipousuario = :tipousuario";
            $parametros = array(
                ':email'   =>  $email,
                ':contrasena'  => hash('sha512', $contrasena),
                ':tipousuario'  => $tipo
            );
            $consulta = self::ejecutaConsulta($sql, $parametros);
            while ($resultado = $consulta->fetch()) {
                $usuario = new Usuario($resultado);
            }
            //Si ha encontrado a un usuario devuelve el usuario
            if (isset($usuario)) {
                return $usuario;
            }
            return false;
        } catch (PDOException $e) {
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
    public function existeEmail($email)
    {
        try {

            $sql = "SELECT administradores.email AS email FROM administradores 
            WHERE  email= :email1
            UNION 
            SELECT empresas.email AS email FROM empresas 
            WHERE  email= :email2
            UNION
            SELECT titulados.email AS email FROM titulados
            WHERE  email= :email3";
            $parametros = array(
                ':email1'      =>  $email,
                ':email2'      =>  $email,
                ':email3'      =>  $email
            );
            $consulta = self::ejecutaConsulta($sql, $parametros);

            while ($resultado = $consulta->fetch()) {
                $emailbuscado = $resultado['email'];
            }
            //Si ha encontrado a un usuario devuelve el usuario
            if (isset($emailbuscado)) {
                return $emailbuscado;
            }
            return false;
        } catch (PDOException $e) {
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
    public function getTipoTabla($tipo)
    {
        switch ($tipo) {
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
     * getNombreClase
     * 
     * 
     *
     * @param  mixed $tipousuario
     * @return mixed
     */
    public function getNombreClase($tipousuario)
    {
        switch ($tipousuario) {
            case "1":
                return "Administrador";
                break;
            case "2":
                return "Empresa";
                break;
            case "3":
                return "Titulado";
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
    public function crearNuevoUsuario($email, $contrasena, $tipo)
    {

        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $conexion->query('INSERT INTO usuarios (tipousuario) VALUES ("' . $tipo . '")');
            $idusuario = $conexion->lastInsertId();

            $conexion->query('INSERT INTO ' . $this->getTipoTabla($tipo) . ' (idusuario,email,contrasena) VALUES ("' . $idusuario . '","' . $email . '","' . hash('sha512', $contrasena) . '")');
            $conexion->commit();
            $usuario = $this->getUsuario($email, $contrasena, $tipo);
            return $usuario;
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }

    /**
     * getUsuariosTipo
     * 
     * devuelve todos los usuarios de un tipousuario
     *
     
     * @return void
     */
    public function getUsuariosTipo($tipousuario)
    {
        try {
            $sql = "SELECT * FROM " . $this->getTipoTabla($tipousuario) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario AND t2.tipousuario=:tipousuario";
            $parametros = array(':tipousuario' => $tipousuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listaUsuarios = [];
            while ($resultado = $consulta->fetch()) {
                $nombreClase = $this->getNombreClase($tipousuario);
                $listaUsuarios[] = new Titulado($resultado);
            }

            return $listaUsuarios;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * getAdministradores
     * 
     * devuelve todos los  administradores
     *
     
     * @return void
     */
    public function getAdministradores()
    {
        try {
            $sql = "SELECT * FROM administradores as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario 
                    WHERE t2.tipousuario= 1";
            $parametros = array('');
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listaadministradores = [];
            while ($resultado = $consulta->fetch()) {
                $listaadministradores[] = (new Administrador($resultado));
            }

            return $listaadministradores;
        } catch (PDOException $e) {
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
    public function getAdministrador($idusuario)
    {
        try {
            $sql = "SELECT * FROM administradores as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario 
                    WHERE t1.idusuario = :idusuario AND t2.tipousuario= 1";
            $parametros = array(':idusuario'  =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            while ($resultado = $consulta->fetch()) {
                $administrador = new Administrador($resultado);
            }
            if (isset($administrador)) {
                return $administrador;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getTitulado
     * 
     * devuelve los datos del titulado
     *
     * @param  mixed $idusuario
     * @return void
     */
    public function getTitulado($idusuario)
    {
        try {
            $sql = "SELECT * FROM titulados as t1 INNER JOIN usuarios as t2 
                    WHERE t2.idusuario = :idusuario AND t2.tipousuario= 3";
            $parametros = array(':idusuario'  =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            while ($resultado = $consulta->fetch()) {
                $titulado = new Titulado($resultado);
            }
            if (isset($titulado)) {
                return $titulado;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getEmpresa
     * 
     * devuelve los datos del empresa
     *
     * @param  mixed $idusuario
     * @return void
     */
    public function getEmpresa($idusuario)
    {
        try {
            $sql = "SELECT * FROM empresas as t1 INNER JOIN usuarios as t2 
                    WHERE t2.idusuario = :idusuario AND t2.tipousuario= 3";
            $parametros = array(':idusuario'  =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            while ($resultado = $consulta->fetch()) {
                $empresa = new Empresa($resultado);
            }
            if (isset($empresa)) {
                return $empresa;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateAdministrador($row)
    {
        try {


            $sql = "UPDATE administradores SET nombre= :nombre, apellidos= :apellidos, email= :email WHERE idusuario = :idusuario ";
            $parametros = array(
                ":idusuario" =>  $row['idusuario'],
                ":nombre" =>  $row['nombre'],
                ":apellidos" => $row['apellidos'],
                ":email" =>  $row['email']
            );
            $resultado = self::ejecutaConsultaUID($sql, $parametros);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getTitulacionUsuario
     * 
     * devuelve la titulacion de un usuario
     *
     * @param  mixed $idusuario
     * @return void
     */
    public function getTitulacionUsuario($idusuario)
    {
        try {
            $sql = "SELECT t4.* FROM usuarios as t1 INNER JOIN titulados as t2 ON t1.idusuario=t2.idusuario INNER JOIN tituladostitulacion as t3 ON t2.idtitulado=t3.idtitulado 
            INNER JOIN titulos as t4 ON t3.idtitulacion=t4.idtitulo
            WHERE t1.idusuario=:idusuario";
            $parametros = array(':idusuario'  =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listatitulos = [];
            while ($resultado = $consulta->fetch()) {
                $listatitulos[] = new Titulo($resultado);
            }

            return $listatitulos;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAlltitulos()
    { {
            try {
                $sql = "SELECT * FROM titulos";
                $parametros = array();
                $consulta = self::ejecutaConsulta($sql, $parametros);
                $listatitulos = [];
                while ($resultado = $consulta->fetch()) {
                    $listatitulos[] = new Titulo($resultado);
                }
                return $listatitulos;
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
}
