<?php
abstract class Tipousuario
{
    protected $idtipo;
    protected $tipousuario;

    function __construct($row)
    {
        $this->idtipo = $row['idtipo'] ? $row['idtipo'] : false;
        $this->tipousuario = $row['tipousuario'] ? $row['tipousuario'] : false;
    }


    public function getIdtipo()
    {
        return $this->idtipo;
    }

    public function setIdtipo($idtipo)
    {
        $this->idtipo = $idtipo;
    }

    public function getTipousuario()
    {
        return $this->tipousuario;
    }

    public function setTipousuario($tipousuario)
    {
        $this->tipousuario = $tipousuario;
    }
}
