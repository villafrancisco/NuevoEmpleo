<?php 


class Administrador extends Usuario{
    protected $idadmin;
    protected $nombre;
    protected $apellidos;
    
    function __construct($row) {
        $this->idadmin = $row['idadmin'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        parent::__construct($row);
    }

    /**
     * Get the value of idadmin
     */ 
    public function getIdadmin()
    {
        return $this->idadmin;
    }

    /**
     * Set the value of idadmin
     *
     * @return  self
     */ 
    public function setIdadmin($idadmin)
    {
        $this->idadmin = $idadmin;

        return $this;
    }

   

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
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
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }
}

?>