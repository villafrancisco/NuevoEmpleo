<?php 
/**
 * Administrador
 */
class Administrador extends Usuario{
    protected $idadmin;
    protected $email;
    protected $contrasena;
    protected $nombre;
    protected $apellidos;
        
    /**
     * __construct
     *
     * @param  mixed $row
     * @return void
     */
    function __construct($row) {
        $this->idadmin = $row['idadmin'];
        $this->email = $row['email'];
        $this->contrasena = $row['contrasena'];
        $this->nombre = $row['nombre'];
        $this->apellidos = $row['apellidos'];
        parent::__construct($row);
    }

    /**
     * Get the value of idadmin
     * 
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
     * Set the value of email
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

     /**
     * Get the value of contrasena
     */ 
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */ 
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    

    
}

?>