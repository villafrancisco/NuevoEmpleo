<?php

/**
 * Usuario
 */
abstract class Usuario extends Tipousuario
{
    /**
     * idusuario
     *
     * @var int
     */
    protected $idusuario;
    /**
     * email
     *
     * @var string
     */
    protected $email;
    /**
     * contrasena
     *
     * @var string
     */
    protected $contrasena;
    /**
     * nombre
     *
     * @var string
     */
    protected $nombre;
    /**
     * fecha_registro
     *
     * @var mixed
     */
    protected $fecha_registro;
    /**
     * __construct
     *
     * @param  mixed $row
     * @return void
     */
    function __construct($row)
    {
        $this->idusuario = isset($row['idusuario']) ? $row['idusuario'] : null;
        $this->email = isset($row['email']) ? $row['email'] : null;
        $this->contrasena = isset($row['contrasena']) ? $row['contrasena'] : null;
        $this->nombre = isset($row['nombre']) ? $row['nombre'] : null;
        $this->fecha_registro = isset($row['fecha_registro']) ? $row['fecha_registro'] : null;
        parent::__construct($row);
    }

    /**
     * getIdusuario
     *
     * @return void
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * setIdusuario
     *
     * @param  string $idusuario
     * @return void
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * getEmail
     *
     * @return void
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * setEmail
     *
     * @param  string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * getContrasena
     *
     * @return void
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * setContrasena
     *
     * @param  string $contrasena
     * @return void
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * getNombre
     *
     * @return void
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * setNombre
     *
     * @param  string $nombre
     * @return void
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * getFecha_registro
     *
     * @return void
     */
    public function getFecha_registro()
    {

        $date = date_create($this->$this->fecha_registro);
        return date_format($date, "d/m/Y");
    }

    /**
     * setFecha_registro
     *
     * @param  mixed $fecha_registro
     * @return void
     */
    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }
}
