<?php
    namespace AtividadeFinal;

    class Elevador{
        private $andarAtual;
        private $andarPretendido;
        private $andarFinal;
        private $estadoPortas;

        public function __construct(int $andarAtual){
            $this->andarAtual = $andarAtual;
            $this->estadoPortas = "Portas Fechadas";
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $valor){
            $this->$name = $valor;
        }

    }
?>