<?php 

class Usuario{
    
    protected $idusuario;
    
    protected $idtipo;
    
    function __construct($row) {
        $this->idusuario = $row['idusuario'];
        $this->idtipo = $row['idtipo'];
     
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
        return $this->idtipo;
    }

    /**
     * Set the value of idtipo
     *
     * @return  self
     */ 
    public function setIdtipo($idtipo)
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    public function getTipo(){
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