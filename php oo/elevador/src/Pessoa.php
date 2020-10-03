<?php
    namespace AtividadeFinal;

    class Pessoa{
        private $andarAtual;
        private $andarPretendido;
        private $estadoAtual;

        public function __construct(int $andarAtual, int $andarPretendido){
            $this->andarAtual = $andarAtual;
            $this->andarPretendido = $andarPretendido;
            $this->estadoAtual = "Fora do elevador";
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $valor){
            $this->$name = $valor;
        }
    }
?>