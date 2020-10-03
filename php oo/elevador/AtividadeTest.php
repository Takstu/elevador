<?php
    use PHPUnit\Framework\TestCase;
    use AtividadeFinal\ElevadorController;

    class AtividadeTest extends TestCase{
        public function testPessoa(){
            $controlador = new ElevadorController(8, 0, 15);
            $this->assertEquals(8, $controlador->pessoa->andarAtual);
            $this->assertEquals(0, $controlador->pessoa->andarPretendido);
            $this->assertEquals("Fora do elevador", $controlador->pessoa->estadoAtual);
            $this->assertEquals(15, $controlador->elevador->andarAtual);
            $this->assertEquals(8, $controlador->movimentaElevador());
            $this->assertEquals("Portas Abertas", $controlador->modificaElevador());
            $this->assertEquals("Dentro do elevador", $controlador->movimentarPessoa());
            $this->assertEquals("Portas Fechadas", $controlador->modificaElevador());
            $this->assertEquals(0, $controlador->movimentaElevador());
            $this->assertEquals("Portas Abertas", $controlador->modificaElevador());
            $this->assertEquals("Fora do elevador", $controlador->movimentarPessoa());
            
        }

    }
?>