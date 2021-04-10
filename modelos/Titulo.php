<?php 

class Titulo{
    protected $idtitulo;
    protected $nombre;
    protected $grado;
    protected $idfamilia;


    
    function __construct($row) {
        $this->idtitulo = $row['idtitulo'];
        $this->nombre = $row['nombre'];
        $this->grado = $row['grado'];
        $this->idfamilia = $row['idfamilia'];
        
    }

    /**
     * Get the value of idtitulo
     */ 
    public function getIdtitulo()
    {
        return $this->idtitulo;
    }

    /**
     * Set the value of idtitulo
     *
     * @return  self
     */ 
    public function setIdtitulo($idtitulo)
    {
        $this->idtitulo = $idtitulo;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        if($this->grado=="superior"){
            return "Grado Superior en ".$this->nombre;
        }elseif($this->grado=="medio"){
            return "Grado Medio en ".$this->nombre;
        }
        
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of grado
     */ 
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set the value of grado
     *
     * @return  self
     */ 
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
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
}

?>