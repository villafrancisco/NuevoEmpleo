<?php

class Titulado extends Usuario
{
    protected $idtitulado;
    protected $idtitulo;
    protected $apellidos;
    protected $direccion;
    protected $dni;
    protected $telefono;
    protected $curriculum;
    protected $foto;

    function __construct($row = false)
    {
        $this->idtitulado = isset($row['idtitulado']) ? $row['idtitulado'] : null;
        $this->idtitulo = isset($row['idtitulo']) ? $row['idtitulo'] : null;
        $this->apellidos = isset($row['apellidos']) ? $row['apellidos'] : null;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : null;
        $this->dni = isset($row['dni']) ? $row['dni'] : null;
        $this->telefono = isset($row['telefono']) ? $row['telefono'] : null;
        $this->curriculum = isset($row['curriculum']) ? $row['curriculum'] : null;
        $this->foto = isset($row['foto']) ? $row['foto'] : null;
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
    public function getIdtitulo()
    {
        return $this->idtitulo;
    }

    public function setIdtitulo($idtitulo)
    {
        $this->idtitulo = $idtitulo;
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
        if (empty($this->foto) || !isset($this->foto)) {
            return 'no-perfil.png';
        } else {
            return $this->foto;
        }
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
}
