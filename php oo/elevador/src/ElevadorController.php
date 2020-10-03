<?php
    namespace AtividadeFinal;

    use AtividadeFinal\Pessoa;
    use AtividadeFinal\Elevador;

    class ElevadorController{

        private $pessoa;
        private $elevador;

        public function __construct($andarAtualPessoa, $andarDestinoPessoa, $andarAtualElevador){
            $this->pessoa = new Pessoa($andarAtualPessoa, $andarDestinoPessoa);
            $this->elevador = new Elevador($andarAtualElevador);
            echo("\nA pessoa está ".$this->pessoa->estadoAtual." no andar ".$this->pessoa->andarAtual.". O elevador está no andar ".$this->elevador->andarAtual."\n");
        }

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $valor){
            $this->$name = $valor;
        }

        public function subir($atual, $futuro, $movimentarPessoa = false){
            for($i = $atual+1; $i <= $futuro; $i++){
                $this->elevador->andarAtual = $i;
                if($movimentarPessoa)
                {
                    $this->pessoa->andarAtual = $i;
                }
                echo("\nA pessoa está ".$this->pessoa->estadoAtual." no andar ".$this->pessoa->andarAtual.". O elevador está no andar ".$this->elevador->andarAtual."\n");
            }
        }

        public function descer($atual, $futuro, $movimentarPessoa = false){
            for($i = $atual-1; $i >= $futuro; $i--){
                $this->elevador->andarAtual = $i;
                if($movimentarPessoa)
                {
                    $this->pessoa->andarAtual = $i;
                }
                echo("\nA pessoa está ".$this->pessoa->estadoAtual." no andar ".$this->pessoa->andarAtual.". O elevador está no andar ".$this->elevador->andarAtual."\n");
            }
        }

        public function movimentaElevador(){
            echo("Pessoa chama elevador\n");
            if($this->elevador->andarAtual < $this->pessoa->andarAtual)
            {
                $this->subir($this->elevador->andarAtual, $this->pessoa->andarAtual);

            }
            else if($this->elevador->andarAtual > $this->pessoa->andarAtual)
            {
                $this->descer($this->elevador->andarAtual, $this->pessoa->andarAtual);
            }
            else if($this->elevador->andarAtual == $this->pessoa->andarAtual && $this->pessoa->estadoAtual == "Dentro do elevador"){
                if($this->elevador->andarAtual < $this->pessoa->andarPretendido)
                {
                    $this->subir($this->elevador->andarAtual, $this->pessoa->andarPretendido, true);
                }
                else
                {
                    $this->descer($this->elevador->andarAtual, $this->pessoa->andarPretendido, true);
                }
            }
            return $this->elevador->andarAtual;
        }

        public function modificaElevador(){
            if($this->elevador->estadoPortas == "Portas Fechadas")
            {
                $this->elevador->estadoPortas = "Portas Abertas";
            }
            else{
                $this->elevador->estadoPortas = "Portas Fechadas";
            }
            echo("O elevador agora está com as ".$this->elevador->estadoPortas."\n");
            return $this->elevador->estadoPortas;
        }

        public function movimentarPessoa(){
            if($this->pessoa->estadoAtual == "Fora do elevador")
            {
                $this->pessoa->estadoAtual = "Dentro do elevador";
            }
            else{
                $this->pessoa->estadoAtual = "Fora do elevador";
            }
            echo("A pessoa está ".$this->pessoa->estadoAtual."\n");
            return $this->pessoa->estadoAtual;
        }
    }
?>