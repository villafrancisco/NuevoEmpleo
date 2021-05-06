<?php

abstract class Usuario
{
    protected $idusuario;
    protected $idtipo;
    protected $email;
    protected $contrasena;
    protected $nombre;


    function __construct($row)
    {
        $this->idusuario = isset($row['idusuario']) ? $row['idusuario'] : false;
        $this->idtipo = isset($row['idtipo']) ? $row['idtipo'] : false;
        $this->email = isset($row['email']) ? $row['email'] : false;
        $this->contrasena = isset($row['contrasena']) ? $row['contrasena'] : false;
        $this->nombre = isset($row['nombre']) ? $row['nombre'] : false;
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

    /**
     * Get the value of idtipo
     */
    public function getIdtipo()
    {
        return $this->idtipo;
    }

    /**
     * Set the value of idtipo
     *
     * @return  self
     */
    public function setIdtipo($idtipo)
    {
        $this->idtipo = $idtipo;

        return $this;
    }


    public function getNameTipo()
    {
        switch ($this->getIdtipo()) {
            case 1:
                return "administrador";
                break;
            case 2:
                return "empresa";
                break;
            case 3:
                return "titulado";
                break;
            default:
                break;
        }
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
