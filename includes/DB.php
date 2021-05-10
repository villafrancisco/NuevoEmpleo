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

    /**
     * getTipoTabla
     *
     * @param  mixed $tipo
     * @return mixed
     */
    public function getTipoTabla($tipo)
    {
        switch ($tipo) {
            case "administrador":
                return "administradores";
                break;
            case "empresa":
                return "empresas";
                break;
            case "titulado":
                return "titulados";
                break;
            default:
                break;
        }
    }

    /**
     * getNombreClase
     *
     * @param  mixed $tipousuario
     * @return mixed
     */
    public function getNombreClase($tipousuario)
    {
        switch ($tipousuario) {
            case "administrador":
                return "Administrador";
                break;
            case "empresa":
                return "Empresa";
                break;
            case "titulado":
                return "Titulado";
                break;
            default:
                break;
        }
    }

    /**
     * getUsuario
     * 
     * devuelve el usuario
     *
     * @param  mixed $idempresa
     * @return mixed
     */
    public function getUsuario____($idusuario)
    {
        try {
            $sql = "SELECT * FROM usuarios as t1 INNER JOIN tipousuario as t2 ON t1.idtipo=t2.idtipo  WHERE t1.idusuario=:idusuario";
            $parametros = array(':idusuario'   =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {

                $sql2 = "SELECT * FROM " . $this->getTipoTabla($resultado['tipousuario']) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario WHERE t1.idusuario = :idusuario AND t2.idtipo=:idtipo";
                $parametros2 = array(
                    ':idusuario' => $resultado['idusuario'],
                    ':idtipo' => $resultado['idtipo']
                );
                $consulta2 = self::ejecutaConsulta($sql2, $parametros2);
                if ($resultado2 = $consulta2->fetch()) {
                    $nombreClase = $this->getNombreClase($resultado['tipousuario']);
                    $usuario = new $nombreClase($resultado2);
                }
            }
            return isset($usuario) ? $usuario : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getUsuario
     * 
     * devuelve el usuario
     *
     * @param  mixed $idempresa
     * @return mixed
     */
    public function getUsuario($idusuario)
    {
        try {
            $sql = "SELECT * FROM usuarios as t1 INNER JOIN tipousuario as t2 ON t1.idtipo=t2.idtipo  WHERE t1.idusuario=:idusuario";
            $parametros = array(':idusuario'   =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {

                $sql2 = "SELECT * FROM " . $this->getTipoTabla($resultado['tipousuario']) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario WHERE t1.idusuario = :idusuario AND t2.idtipo=:idtipo";
                $parametros2 = array(
                    ':idusuario' => $resultado['idusuario'],
                    ':idtipo' => $resultado['idtipo']
                );
                $consulta2 = self::ejecutaConsulta($sql2, $parametros2);
                if ($resultado2 = $consulta2->fetch()) {
                    $nombreClase = $this->getNombreClase($resultado['tipousuario']);
                    $usuario = new $nombreClase($resultado2);
                }
                if (isset($usuario)) {
                    if ($usuario instanceof Titulado) {
                        $usuario->setListaTitulos($this->getTitulacionUsuario($usuario));
                        $usuario->setLista_empleos_inscrito($this->getEmpleosInscritos($usuario));
                    }
                }
            }
            return isset($usuario) ? $usuario : false;
        } catch (PDOException $e) {
            return false;
        }
    }



    /**
     * getAllUsuarios
     * 
     * devuelve todos los usuarios
     *
     * @return mixed
     */
    public function getAllUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuarios as t1 INNER JOIN tipousuario as t2 ON t1.idtipo=t2.idtipo";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listausuarios = [];
            while ($resultado = $consulta->fetch()) {
                $sql2 = "SELECT * FROM " . $this->getTipoTabla($resultado['tipousuario']) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON t2.idtipo=t3.idtipo WHERE t1.idusuario= :idusuario AND t2.idtipo=:idtipo";
                $parametros2 = array(
                    ':idusuario' => $resultado['idusuario'],
                    ':idtipo' => $resultado['idtipo']
                );
                $consulta2 = self::ejecutaConsulta($sql2, $parametros2);
                if ($resultado2 = $consulta2->fetch()) {
                    $nombreClase = $this->getNombreClase($resultado['tipousuario']);
                    $usuario = new $nombreClase($resultado2);
                    if ($usuario instanceof Titulado) {
                        $usuario->setListaTitulos($this->getTitulacionUsuario($usuario));
                        $usuario->setLista_empleos_inscrito($this->getEmpleosInscritos($usuario));
                    }
                    $listausuarios[] = $usuario;
                }
            }

            return $listausuarios;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function login($email, $contrasena, $tipo)
    {
        try {
            $sql = "SELECT t1.contrasena,t1.idusuario FROM " . $this->getTipoTabla($tipo) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON t2.idtipo=t3.idtipo WHERE t1.email=:email AND t3.tipousuario = :tipousuario";
            $parametros = array(
                ':email'   => $email,
                ':tipousuario' =>   $tipo
            );
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                if (password_verify($contrasena, $resultado["contrasena"])) {
                    return $resultado["idusuario"];
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function existeEmail($email)
    {
        try {
            $sql = "SELECT * FROM usuarios as t1 INNER JOIN tipousuario as t2 ON t1.idtipo=t2.idtipo";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $emailencontrado = false;
            while ($resultado = $consulta->fetch()) {
                $sql2 = "SELECT t1.email FROM " . $this->getTipoTabla($resultado['tipousuario']) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario WHERE t1.email= :email";
                $parametros2 = array(
                    ':email' => $email
                );
                $consulta2 = self::ejecutaConsulta($sql2, $parametros2);
                if ($resultado2 = $consulta2->fetch()) {
                    $emailencontrado = true;
                }
            }

            return $emailencontrado;
        } catch (PDOException $e) {
            return false;
        }
    }




    /**
     * getUsuariosTipo
     * 
     * devuelve todos los usuarios de un tipousuario
     *
     
     * @return object
     */
    public function getAllUsuariosTipo($tipousuario)
    {
        try {
            $sql = "SELECT * FROM " . $this->getTipoTabla($tipousuario) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON  t2.idtipo=t3.idtipo WHERE t3.tipousuario = :tipousuario";
            $parametros = array(':tipousuario' => $tipousuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listaUsuarios = [];
            while ($resultado = $consulta->fetch()) {
                $nombreClase = $this->getNombreClase($tipousuario);
                $usuario = new $nombreClase($resultado);
                if ($usuario instanceof Titulado) {
                    $usuario->setListaTitulos($this->getTitulacionUsuario($usuario));
                    $usuario->setLista_empleos_inscrito($this->getEmpleosInscritos($usuario));
                }
                $listaUsuarios[] = $usuario;
            }
            return $listaUsuarios;
        } catch (PDOException $e) {
            return false;
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
    public function crearNuevoUsuario($usuario)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $conexion->query('INSERT INTO usuarios (idtipo) VALUES ("' . $usuario->getIdtipo() . '")');
            $idusuario = $conexion->lastInsertId();

            $conexion->query('INSERT INTO ' . $this->getTipoTabla($usuario->getNameTipo()) . ' (idusuario,email,contrasena) VALUES ("' . $idusuario . '","' . $usuario->getEmail() . '","' . password_hash($usuario->getContrasena(), PASSWORD_DEFAULT) . '")');
            $conexion->commit();
            $usuario = $this->getUsuario($idusuario);
            return $usuario;
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }

    public function updateUsuario($usuario)
    {
        try {
            switch ($usuario->getNametipo()) {
                case 'administrador':
                    $sql = "UPDATE administradores SET 
                        nombre= :nombre,
                        apellidos= :apellidos,
                        email= :email, 
                        contrasena= :contrasena 
                    WHERE idadmin = :idadmin ";
                    $parametros = array(
                        ":idadmin"    =>  $usuario->getIdadmin(),
                        ":nombre"       =>  $usuario->getNombre(),
                        ":apellidos"    =>  $usuario->getApellidos(),
                        ":email"        =>  $usuario->getEmail(),
                        ":contrasena"    =>  $usuario->getContrasena()
                    );
                    break;
                case 'empresa':
                    break;
                case 'titulado':
                    break;
                default:
                    break;
            }
            $resultado = self::ejecutaConsulta($sql, $parametros);
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * getEmpresa
     * 
     * devuelve la empresa
     *
     * @param  mixed $idempresa
     * @return mixed
     */
    public function getEmpresa($idempresa)
    {
        try {
            $sql = "SELECT * FROM empresas as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario WHERE t1.idempresa = :idempresa";
            $parametros = array(':idempresa'   =>  $idempresa);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                $empresa = new Empresa($resultado);
            }
            return isset($empresa) ? $empresa : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * getEmpresas
     * 
     * devuelve todas las empresas  
     *
     * @return mixed
     */
    public function getAllEmpresas()
    {
        try {
            $sql = "SELECT * FROM empresas as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $empresas = [];
            while ($resultado = $consulta->fetch()) {
                $empresas[] = new Empresa($resultado);
            }
            return $empresas;
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
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                $familia = new Familia($resultado);
            }
            return isset($familia) ? $familia : false;
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
    public function getAllFamilias()
    {
        try {
            $sql = "SELECT * FROM familia";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $familias = [];
            while ($resultado = $consulta->fetch()) {
                $familias[] = new Familia($resultado);
            }
            return $familias;
        } catch (PDOException $e) {
            return false;
        }
    }


    /**
     * getEmpleo
     * 
     * devuelve un empleo
     *
     * @param  mixed $idempleo
     * @return mixed
     */
    public function getEmpleo($idempleo)
    {
        try {
            $sql = "SELECT * FROM empleo WHERE idempleo = :idempleo";
            $parametros = array(':idempleo'   =>  $idempleo);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                $empleo = new Empleo($resultado->fetch());
            }
            return isset($empleo) ? $empleo : false;
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
            $sql = "SELECT * FROM empleos as t1 INNER JOIN empresas as t2 ON t1.idempresa=t2.idempresa";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $empleos = [];
            while ($resultado = $consulta->fetch()) {
                $empleos[] = new Empleo($resultado);
            }
            return $empleos;
        } catch (PDOException $e) {
            $e->getMessage();
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
    public function getTitulacionUsuario($usuario)
    {
        try {
            $sql = "SELECT t4.* FROM usuarios as t1 INNER JOIN titulados as t2 ON t1.idusuario=t2.idusuario INNER JOIN tituladostitulacion as t3 ON t2.idtitulado=t3.idtitulado 
            INNER JOIN titulos as t4 ON t3.idtitulacion=t4.idtitulo
            WHERE t1.idusuario=:idusuario";
            $parametros = array(':idusuario'  =>  $usuario->getIdusuario());
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

    /**
     * getFamiliasTitulo
     * 
     * //devuelve la familia profesional de un titulo  
     *
     * @return mixed
     */
    public function getFamiliaTitulo($titulo)
    {
        try {
            $sql = "SELECT * FROM familia as t1 INNER JOIN titulos as t2 ON t1.idfamilia=t2.idfamilia WHERE t2.idtitulo=:idtitulo";
            $parametros = array(':idtitulo' =>  $titulo->getIdtitulo());
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $familia = new Familia($resultado->fetch());
            }
            return isset($familia) ? $familia : false;
        } catch (PDOException $e) {
            return false;
        }
    }



    public function getAlltitulos()
    {
        try {
            $sql = "SELECT * FROM titulos ORDER BY grado,nombre";
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

    public function getEmpleosInscritos($titulado)
    {
        try {
            $sql = "SELECT * FROM inscripciones as t1
                INNER JOIN empleos as t2 ON t1.idempleo=t2.idempleo
                INNER JOIN titulados as t3 ON t1.idtitulado=t3.idtitulado
                INNER JOIN empresas as t4 ON t2.idempresa=t4.idempresa
            WHERE t1.idtitulado = :idtitulado";
            $parametros = array(':idtitulado'   => $titulado->getIdtitulado());
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $listaempleosinscrito = [];
            while ($resultado = $consulta->fetch()) {
                $listaempleosinscrito[] = new Empleo($resultado);
            }
            return $listaempleosinscrito;
        } catch (PDOException $e) {
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
    public function getEmpleosFamilia($familia)
    {
        try {

            $sql = "SELECT * FROM empleos t1 INNER JOIN empleotitulo t2 ON t1.idempleo = t2.idempleo INNER JOIN titulos t3 ON t2.idtitulo = t3.idtitulo INNER JOIN familia t4 ON t3.idfamilia= t4.idfamilia WHERE t4.idfamilia= :idfamilia GROUP BY t1.idempleo";
            $parametros = array(':idfamilia'   =>  $familia->getIdfamilia());
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $empleos = [];
            while ($resultado = $consulta->fetch()) {
                $empleos[] = new Empleo($resultado);
            }
            return $empleos;
        } catch (PDOException $e) {
            return false;
        }
    }







    /********************************************
     * 
     * CAMBIOS HASTA AQUI
     * 
     * 
     * ********************************************
     */








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
}
