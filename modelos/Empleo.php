<?php 

class Empleo{
    protected $idempleo;
    protected $idempresa;
    protected $descripcion;
    
    function __construct($row) {
        $this->idempleo = $row['idempleo'];
        $this->idempresa = $row['idempresa'];
        $this->descripcion = $row['descripcion'];
        
    }

    /**
     * Get the value of idoferta
     */ 
    public function getIdempleo()
    {
        return $this->idempleo;
    }

    /**
     * Set the value of idoferta
     *
     * @return  self
     */ 
    public function setIdempleo($idempleo)
    {
        $this->idempleo = $idempleo;

        return $this;
    }

    /**
     * Get the value of idempresa
     */ 
    public function getIdempresa()
    {
        return $this->idempresa;
    }

    /**
     * Set the value of idempresa
     *
     * @return  self
     */ 
    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}

?>