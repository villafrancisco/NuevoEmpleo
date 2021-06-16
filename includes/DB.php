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

    public function getCamposInsertar($usuario)
    {
        switch ($usuario->getTipoUsuario()) {
            case "administrador":
                $campos = 'idusuario, email, contrasena,nombre,apellidos';
                return $campos;
                break;
            case "empresa":
                $campos = 'idusuario, email, contrasena,nombre,telefono,direccion,logo';
                return $campos;
                break;
            case "titulado":
                $campos = 'idusuario, idtitulo, email, contrasena, nombre, apellidos, direccion, dni, telefono, curriculum, foto';
                return $campos;
                break;
            default:
                break;
        }
    }
    public function getParametrosInsertar($usuario)
    {
        switch ($usuario->getTipousuario()) {
            case "administrador":
                $campos = ':idusuario, :email, :contrasena, :nombre, :apellidos';
                return $campos;
                break;
            case "empresa":
                $campos = ':idusuario, :email, :contrasena, :nombre, :telefono, :direccion, :logo';
                return $campos;
                break;
            case "titulado":
                $campos = ':idusuario, :idtitulo, :email, :contrasena, :nombre, :apellidos, :direccion, :dni, :telefono, :curriculum, :foto';
                return $campos;
                break;
            default:
                break;
        }
    }

    public function getValoresInsertar($usuario)
    {
        switch ($usuario->getTipousuario()) {
            case "administrador":
                $parametros = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':email' => $usuario->getEmail(),
                    ':contrasena' => password_hash($usuario->getContrasena(), PASSWORD_DEFAULT),
                    ':nombre' => $usuario->getNombre(),
                    ':apellidos' => $usuario->getApellidos()
                );
                return $parametros;
                break;
            case "empresa":
                $parametros = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':email' => $usuario->getEmail(),
                    ':contrasena' => password_hash($usuario->getContrasena(), PASSWORD_DEFAULT),
                    ':nombre' => $usuario->getNombre(),
                    ':telefono' => $usuario->getTelefono(),
                    ':direccion' => $usuario->getDireccion(),
                    ':logo' => $usuario->getLogo()
                );
                return $parametros;
                break;
            case "titulado":
                $parametros = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':idtitulo' => $usuario->getIdtitulo(),
                    ':email' => $usuario->getEmail(),
                    ':contrasena' => password_hash($usuario->getContrasena(), PASSWORD_DEFAULT),
                    ':nombre' => $usuario->getNombre(),
                    ':apellidos' => $usuario->getApellidos(),
                    ':direccion' => $usuario->getDireccion(),
                    ':dni' => $usuario->getDNI(),
                    ':telefono' => $usuario->getTelefono(),
                    ':curriculum' => $usuario->getCurriculum(),
                    ':foto' => $usuario->getFoto()
                );
                return $parametros;
                break;
            default:
                break;
        }
    }
    public function getCamposActualizar($usuario)
    {
        switch ($usuario->getTipoUsuario()) {
            case "administrador":
                $campos = 'idusuario= :idusuario, email= :email, nombre= :nombre, apellidos= :apellidos';
                return $campos;
                break;
            case "empresa":
                $campos = 'idusuario= :idusuario, email= :email, nombre= :nombre, telefono= :telefono, direccion= :direccion, logo= :logo';
                return $campos;
                break;
            case "titulado":
                $campos = 'idusuario= :idusuario, idtitulo= :idtitulo, email= :email, nombre= :nombre, apellidos= :apellidos, direccion= :direccion, dni= :dni, telefono= :telefono, curriculum= :curriculum, foto= :foto, registro_completo= :registro_completo';
                return $campos;
                break;
            default:
                break;
        }
    }

    public function getParametrosActualizar($usuario)
    {
        switch ($usuario->getTipoUsuario()) {
            case "administrador":
                $campos = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':email'        =>  $usuario->getEmail(),
                    ':nombre'       =>  $usuario->getNombre(),
                    ':apellidos'    =>  $usuario->getApellidos()
                );
                return $campos;
                break;
            case "empresa":
                $campos = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':email'        =>  $usuario->getEmail(),
                    ':nombre'       =>  $usuario->getNombre(),
                    ':telefono'    =>  $usuario->getTelefono(),
                    ':direccion'    =>  $usuario->getDireccion(),
                    ':logo'    =>  $usuario->getLogo()
                );

                return $campos;
                break;
            case "titulado":
                $campos = array(
                    ':idusuario'    =>  $usuario->getIdusuario(),
                    ':idtitulo'     =>  $usuario->getIdtitulo(),
                    ':email'        =>  $usuario->getEmail(),
                    ':nombre'       =>  $usuario->getNombre(),
                    ':apellidos'       =>  $usuario->getApellidos(),
                    ':direccion'    =>  $usuario->getDireccion(),
                    ':dni'    =>  $usuario->getDNI(),
                    ':telefono'    =>  $usuario->getTelefono(),
                    ':curriculum'    =>  $usuario->getCurriculum(),
                    ':foto'    =>  $usuario->getFoto(),
                    ':registro_completo'    => $usuario->getRegistro_completo()
                );
                return $campos;
                break;
            default:
                break;
        }
    }

    /**
     * 
     * devuelve el usuario
     *
     * @param  mixed $usuario
     * @return mixed
     */
    public function getUsuario($idusuario)
    {
        try {
            $sql = "SELECT * FROM usuarios as t1 INNER JOIN tipousuario as t2 ON t1.idtipo=t2.idtipo  WHERE t1.idusuario=:idusuario";
            $parametros = array(':idusuario'   =>  $idusuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {

                $sql2 = "SELECT * FROM " . $this->getTipoTabla($resultado['tipousuario']) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON t2.idtipo=t3.idtipo WHERE t1.idusuario = :idusuario AND t2.idtipo=:idtipo";
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
    public function createUsuario($usuario)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql1 = "INSERT INTO usuarios (idtipo,fecha_registro) VALUES(:idtipo,:fecha_registro)";
            $parametros1 = array(
                ":idtipo"           =>  $usuario->getIdtipo(),
                ":fecha_registro"   =>  date("Y-m-d H:i:s")
            );
            $consulta1 = $conexion->prepare($sql1);
            $consulta1->execute($parametros1);
            $usuario->setIdusuario($conexion->lastInsertId());

            $sql2 = "INSERT INTO " . $this->getTipoTabla($usuario->getTipousuario()) . " (" . $this->getCamposInsertar($usuario) . ") VALUES (" . $this->getParametrosInsertar($usuario) . ")";
            $parametros2 = $this->getValoresInsertar($usuario);
            $consulta2 = $conexion->prepare($sql2);
            $consulta2->execute($parametros2);
            $conexion->commit();
            return $usuario->getIdusuario();
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }
    public function updateUsuario($usuario)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "UPDATE " . $this->getTipoTabla($usuario->getTipousuario()) . " SET " . $this->getCamposActualizar($usuario) . " WHERE idusuario = :idusuario";
            $parametros = $this->getParametrosActualizar($usuario);
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }

    public function deleteUsuario($usuario)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "DELETE FROM usuarios WHERE idusuario = :idusuario";
            $parametros = array(':idusuario' =>  $usuario->getIdusuario());
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }



    public function getAllTipoUsuario($tipousuario)
    {
        try {
            $sql = "SELECT * FROM " . $this->getTipoTabla($tipousuario) . "  as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON t3.idtipo=t2.idtipo WHERE t3.tipousuario= :tipousuario";
            $parametros = array(':tipousuario'  => $tipousuario);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $usuarios = [];
            while ($resultado = $consulta->fetch()) {
                $nombreClase = $this->getNombreClase($tipousuario);
                $usuarios[] = new $nombreClase($resultado);
            }
            return $usuarios;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getAdministrador($idadmin)
    {
        try {
            $sql = "SELECT * FROM administradores WHERE idadmin = :idadmin";
            $parametros = array(':idadmin'   =>  $idadmin);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                $administrador = new Administrador($resultado);
            }
            return isset($administrador) ? $administrador : false;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getEmpresa($idempresa)
    {
        try {
            $sql = "SELECT * FROM empresas WHERE idempresa = :idempresa";
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

    public function getTitulado($idtitulado)
    {
        try {
            $sql = "SELECT * FROM titulados WHERE idtitulado = :idtitulado";
            $parametros = array(':idtitulado'   =>  $idtitulado);
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                $titulado = new Titulado($resultado);
            }
            return isset($titulado) ? $titulado : false;
        } catch (PDOException $e) {
            return false;
        }
    }


    public function login($usuario)
    {
        try {
            $sql = "SELECT t1.contrasena,t1.idusuario FROM " . $this->getTipoTabla($usuario->getTipousuario()) . " as t1 INNER JOIN usuarios as t2 ON t1.idusuario=t2.idusuario INNER JOIN tipousuario as t3 ON t2.idtipo=t3.idtipo WHERE t1.email=:email AND t3.tipousuario = :tipousuario";
            $parametros = array(
                ':email'   => $usuario->getEmail(),
                ':tipousuario' =>   $usuario->getTipousuario()
            );
            $consulta = self::ejecutaConsulta($sql, $parametros);
            if ($resultado = $consulta->fetch()) {
                if (password_verify($usuario->getContrasena(), $resultado["contrasena"])) {
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
            $sql = "SELECT * FROM familia order by nombre";
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

    public function getEmpleo($idempleo)
    {
        try {
            $sql = "SELECT * FROM empleos WHERE idempleo = :idempleo";
            $parametros = array(':idempleo'   =>  $idempleo);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $empleo = new Empleo($resultado->fetch());
            }
            return isset($empleo) ? $empleo : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createEmpleo($empleo)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "INSERT INTO empleos (idempresa,idfamilia,descripcion,fecha_publicacion) VALUES (:idempresa,:idfamilia,:descripcion,:fecha_publicacion)";
            $parametros = array(
                ":idempresa"  => $empleo->getIdempresa(),
                ":idfamilia"    => $empleo->getIdfamilia(),
                ":descripcion"  => $empleo->getDescripcion(),
                ":fecha_publicacion"    =>  date("Y-m-d H:i:s")
            );
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            $conexion->rollBack();
            return false;
        }
    }
    public function updateEmpleo($empleo)
    {
        $conexion = parent::conectar();
        $conexion->beginTransaction();
        $sql = "UPDATE empleos SET descripcion = :descripcion, idfamilia=:idfamilia WHERE idempleo=:idempleo";
        $parametros = array(
            ":descripcion"  => $empleo->getDescripcion(),
            ":idfamilia"  => $empleo->getIdfamilia(),
            ":idempleo"  => $empleo->getIdempleo(),


        );
        $consulta = $conexion->prepare($sql);
        $consulta->execute($parametros);
        $conexion->commit();
        return true;
    }

    public function deleteEmpleo($empleo)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "DELETE FROM empleos WHERE idempleo=:idempleo";
            $parametros = array(
                ":idempleo"  => $empleo->getIdempleo()

            );
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);


            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllEmpleos()
    {
        try {
            $sql = "SELECT * FROM empleos order by fecha_publicacion DESC";
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

    public function getInscripcion($idinscripcion)
    {

        try {
            $sql = "SELECT * FROM inscripciones as t1
            WHERE t1.idinscripcion = :idinscripcion";
            $parametros = array(':idinscripcion'   => $idinscripcion);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $inscripcion = new Inscripcion($resultado->fetch());
            }
            return isset($inscripcion) ? $inscripcion : false;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function createInscripcion($inscripcion)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "INSERT INTO inscripciones (idempleo,idtitulado,fecha_inscripcion) VALUES (:idempleo,:idtitulado,:fecha_inscripcion)";
            $parametros = array(
                ":idempleo"   => $inscripcion->getIdempleo(),
                ":idtitulado"   => $inscripcion->getIdtitulado(),
                ":fecha_inscripcion"    => date("Y-m-d H:i:s")
            );

            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteInscripcion($inscripcion)
    {
        try {
            $conexion = parent::conectar();
            $conexion->beginTransaction();
            $sql = "DELETE FROM inscripciones WHERE idinscripcion = :idinscripcion";
            $parametros = array(
                ":idinscripcion"  => $inscripcion->getIdinscripcion()

            );
            $consulta = $conexion->prepare($sql);
            $consulta->execute($parametros);
            $conexion->commit();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getAllInscripciones()
    {

        try {
            $sql = "SELECT * FROM inscripciones";
            $parametros = array();
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $inscripciones = [];
            while ($resultado = $consulta->fetch()) {
                $inscripciones[] = new Inscripcion($resultado);
            }
            return $inscripciones;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getInscripcionesTitulado($titulado)
    {
        try {
            $sql = "SELECT * FROM inscripciones as t1 INNER JOIN titulados as t2 ON t1.idtitulado=t2.idtitulado WHERE t1.idtitulado=:idtitulado";
            $parametros = array(':idtitulado'   =>  $titulado->getIdtitulado());
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $inscripciones = [];
            while ($resultado = $consulta->fetch()) {
                $inscripciones[] = new Inscripcion($resultado);
            }
            return $inscripciones;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getInscritosEmpleo($empleo)
    {
        try {
            $sql = "SELECT * FROM inscripciones as t1
                INNER JOIN empleos as t2 ON t1.idempleo=t2.idempleo
                INNER JOIN titulados as t3 ON t1.idtitulado=t3.idtitulado
                INNER JOIN usuarios as t5 ON t5.idusuario=t3.idusuario
                INNER JOIN tipousuario as t6 ON t6.idtipo=t5.idtipo
             WHERE t1.idempleo = :idempleo AND t6.tipousuario= :tipousuario";
            $parametros = array(
                ':idempleo'   => $empleo->getIdempleo(),
                ':tipousuario'  => 'titulado'
            );
            $consulta = self::ejecutaConsulta($sql, $parametros);
            $inscritos = [];
            while ($resultado = $consulta->fetch()) {
                $inscritos[] = new Titulado($resultado);
            }
            return $inscritos;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getTitulo($idtitulo)
    {
        try {
            $sql = "SELECT * FROM titulos WHERE idtitulo = :idtitulo";
            $parametros = array(':idtitulo'   =>  $idtitulo);
            $resultado = self::ejecutaConsulta($sql, $parametros);
            if (isset($resultado)) {
                $titulo = new Titulo($resultado->fetch());
            }
            return isset($titulo) ? $titulo : false;
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
            $titulos = [];
            while ($resultado = $consulta->fetch()) {
                $titulos[] = new Titulo($resultado);
            }
            return $titulos;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

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
    public function getEmpleosFamilia($familia)
    {
        try {

            $sql = "SELECT * FROM empleos t1 INNER JOIN familia t2 ON t2.idfamilia= t1.idfamilia WHERE t1.idfamilia= :idfamilia";
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

    public function getEmpleosEmpresa($empresa)
    {
        try {

            $sql = "SELECT * FROM empleos WHERE idempresa =:idempresa Order by fecha_publicacion";
            $parametros = array(':idempresa'    =>  $empresa->getIdempresa());
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
}
