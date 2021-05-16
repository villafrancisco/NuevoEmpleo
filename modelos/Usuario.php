<?php

class Usuario extends Tipousuario
{
    protected $idusuario;
    protected $email;
    protected $contrasena;
    protected $nombre;


    function __construct($row)
    {
        $this->idusuario = isset($row['idusuario']) ? $row['idusuario'] : false;
        $this->email = isset($row['email']) ? $row['email'] : false;
        $this->contrasena = isset($row['contrasena']) ? $row['contrasena'] : false;
        $this->nombre = isset($row['nombre']) ? $row['nombre'] : false;
        parent::__construct($row);
    }
    /**
     * Get the value of idusuario
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     *
     * @return  self
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
