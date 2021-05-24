 <?php
    /**
     * @abstract Tipousuario
     */

    abstract class Tipousuario
    {
        protected $idtipo;
        protected $tipousuario;

        /**
         * __construct
         *
         * @param  mixed $row
         * @return void
         */
        function __construct($row)
        {
            $this->idtipo = isset($row['idtipo']) ? $row['idtipo'] : null;
            $this->tipousuario = isset($row['tipousuario']) ? $row['tipousuario'] : null;
        }


        /**
         * getIdtipo
         *
         * @return void
         */
        public function getIdtipo()
        {
            return $this->idtipo;
        }

        /**
         * setIdtipo
         *
         * @param  int $idtipo
         * @return void
         */
        public function setIdtipo($idtipo)
        {
            $this->idtipo = $idtipo;
        }

        /**
         * getTipousuario
         *
         * @return void
         */
        public function getTipousuario()
        {
            return $this->tipousuario;
        }

        /**
         * setTipousuario
         *
         * @param  int $tipousuario
         * @return void
         */
        public function setTipousuario($tipousuario)
        {
            $this->tipousuario = $tipousuario;
        }
    }
