<?php


class Empresa extends Usuario implements JsonSerializable
{
    protected $idempresa;
    protected $telefono;
    protected $direccion;
    protected $logo;


    function __construct($row = false)
    {
        $this->idempresa = isset($row['idempresa']) ? $row['idempresa'] : null;
        $this->telefono = isset($row['telefono']) ? $row['telefono'] : null;
        $this->direccion = isset($row['direccion']) ? $row['direccion'] : null;

        $this->logo = isset($row['logo']) ? $row['logo'] : null;

        parent::__construct($row);
    }
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    public function getIdempresa()
    {
        return $this->idempresa;
    }

    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;

        return $this;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }


    public function getLogo()
    {
        if (empty($this->logo) || !isset($this->logo)) {
            $this->setLogo('no-imagen.svg');
        }
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
}
