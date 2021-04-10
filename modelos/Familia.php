<?php 

class Familia{
    protected $idfamilia;
    protected $familia;
    protected $nombre_imagen;

    
    function __construct($row) {
        $this->idfamilia = $row['idfamilia'];
        $this->familia = $row['familia'];
        $this->nombre_imagen = $row['nombre_imagen'];
        
    }
    /**
     * Get the value of idfamilia
     */ 
    public function getIdfamilia()
    {
        return $this->idfamilia;
    }

    /**
     * Set the value of idfamilia
     *
     * @return  self
     */ 
    public function setIdfamilia($idfamilia)
    {
        $this->idfamilia = $idfamilia;

        return $this;
    }

    /**
     * Get the value of familia
     */ 
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * Set the value of familia
     *
     * @return  self
     */ 
    public function setFamilia($familia)
    {
        $this->familia = $familia;

        return $this;
    }

    /**
     * Get the value of nombre_imagen
     */ 
    public function getNombre_imagen()
    {
        return $this->nombre_imagen;
    }

    /**
     * Set the value of nombre_imagen
     *
     * @return  self
     */ 
    public function setNombre_imagen($nombre_imagen)
    {
        $this->nombre_imagen = $nombre_imagen;

        return $this;
    }
}

?>
