<?php

class Titulado extends Usuario
{
    protected $idtitulado;
    protected $direccion;
    protected $dni;
    protected $telefono;
    protected $curriculum;
    protected $foto;
    protected $fecha_registro;
    protected $lista_titulos;
    protected $lista_ofertas_inscrito;


    function __construct($row)
    {
        $this->idtitulado = isset($row['idtitulado']) ? $row['idtitulado'] : false;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : false;
        $this->dni = isset($row['dni']) ? $row['dni'] : false;
        $this->telefono = isset($row['telefono']) ? $row['telefono'] : false;
        $this->curriculum = isset($row['curriculum']) ? $row['curriculum'] : false;
        $this->foto = isset($row['foto']) ? $row['foto'] : false;
        $this->fecha_registro = isset($row['fecha_registro']) ? $row['fecha_registro'] : false;
        $this->lista_titulos = isset($row['lista_titulos']) ? $row['lista_titulos'] : false;
        $this->lista_ofertas_inscrito = isset($row['lista_ofertas_inscrito']) ? $row['lista_ofertas_inscrito'] : false;
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

    public function getListaTitulos()
    {
        return $this->lista_titulos;
    }
    public function getFamiliasTitulado()
    {
        $familias = [];
        if ($this->lista_titulos) {
            foreach ($this->lista_titulos as $titulo) {
                $familias[] = $titulo->getIdFamilia();
            }
        }
        return array_unique($familias);
    }

    public function setListaTitulos($lista_titulos)

    {
        $this->lista_titulos = $lista_titulos;
    }

    public function getOfertasInscrito()
    {
        return $this->lista_ofertas_inscrito;
    }

    public function setOfertasInscrito($lista_ofertas_inscrito)
    {
        $this->lista_ofertas_inscrito = $lista_ofertas_inscrito;
    }
}
