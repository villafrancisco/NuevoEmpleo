<?php 

class Usuario{
    
    protected $idusuario;
    protected $tipousuario;
   
    function __construct($row) {
       
        $this->idusuario = $row['idusuario'];
        $this->tipousuario = $row['tipousuario'];
     
    }
    /**
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set the value of idusuario
     *
     * @return  self
     */ 
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }
    
    /**
     * Get the value of idtipo
     */ 
    public function getIdtipo()
    {
        return $this->tipousuario;
    }

    /**
     * Set the value of idtipo
     *
     * @return  self
     */ 
    public function setIdtipo($tipousuario)
    {
        $this->tipousuario = $tipousuario;

        return $this;
    }
    

    public function getNameTipo(){
        switch ($this->getIdtipo()){
            case 1:
                return "administrador";
                break;
            case 2:
                return "empresa";
                break;
            case 3:
                return "titulado";
                break;
            default:
                break;
        }
        
    }

}

?>