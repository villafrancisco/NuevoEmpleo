<?php

class Titulado extends Usuario
{
    protected $idtitulado;
    protected $apellidos;
    protected $direccion;
    protected $dni;
    protected $telefono;
    protected $curriculum;
    protected $foto;
    protected $fecha_registro;
    protected $idtitulo;
    protected $lista_empleos_inscrito;


    function __construct($row)
    {
        $this->idtitulado = isset($row['idtitulado']) ? $row['idtitulado'] : false;
        $this->apellidos = isset($row['apellidos']) ? $row['apellidos'] : false;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : false;
        $this->dni = isset($row['dni']) ? $row['dni'] : false;
        $this->telefono = isset($row['telefono']) ? $row['telefono'] : false;
        $this->curriculum = isset($row['curriculum']) ? $row['curriculum'] : false;
        $this->foto = isset($row['foto']) ? $row['foto'] : false;
        $this->fecha_registro = isset($row['fecha_registro']) ? $row['fecha_registro'] : false;
        $this->idtitulo = isset($row['idtitulo']) ? $row['idtitulo'] : false;
        $this->lista_empleos_inscrito = isset($row['lista_empleos_inscrito']) ? $row['lista_empleos_inscrito'] : false;

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

    public function getIdtitulo()
    {
        return $this->idtitulo;
    }


    public function setIdtitulo($idtitulo)

    {
        $this->idtitulo = $idtitulo;
    }

    public function getLista_empleos_inscrito()
    {
        return $this->lista_empleos_inscrito;
    }

    public function setLista_empleos_inscrito($lista_empleos_inscrito)
    {
        $this->lista_empleos_inscrito = $lista_empleos_inscrito;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
}
