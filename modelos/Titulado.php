<?php

class Titulado extends Usuario
{
    protected $idtitulado;
    protected $email;
    protected $contrasena;
    protected $nombre;
    protected $apellidos;
    protected $direccion;
    protected $dni;
    protected $telefono;
    protected $curriculum;
    protected $foto;
    protected $fecha_registro;


    function __construct($row)
    {
        $this->idtitulado = $row['idtitulado'];
        $this->email = $row['email'];
        $this->contrasena = $row['contrasena'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        $this->direccion = $row['direccion'];
        $this->dni = $row['dni'];
        $this->telefono = $row['telefono'];
        $this->curriculum = $row['curriculum'];
        $this->foto = $row['foto'];
        $this->fecha_registro = $row['fecha_registro'];
        parent::__construct($row);
    }

    public function getIdtitulado()
    {
        return $this->idtitulado;
    }

    public function setIdtitulado($idtitulado)
    {
        $this->idtitulado = $idtitulado;
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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getCurriculum()
    {
        return $this->curriculum;
    }

    public function setCurriculum($curriculum)
    {
        $this->curriculum = $curriculum;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFecha_registro()
    {
        return $this->fecha_registro;
    }

    public function setFecha_registro($fecha_registro)
    {
        $this->fecha_registro = $fecha_registro;
    }
}
