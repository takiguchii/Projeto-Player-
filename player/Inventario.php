<?php 

require_once("Item.php");

class Inventario {
    private array $itens = []; 
    private float $capacidadeMaxima;

    public function __construct(float $capacidadeMaxima = 30) {
        $this->setCapacidadeMaxima($capacidadeMaxima);
    }

    public function setCapacidadeMaxima(float $capacidadeMaxima): void {
        $this->capacidadeMaxima = $capacidadeMaxima;
    }

    public function getCapacidadeMaxima(): float {
        return $this->capacidadeMaxima;
    }

    public function adicionar(Item $itens): void {
        $pesoAtual = $this->calcPesoAtual(); 
        if ($pesoAtual + $itens->getPeso() <= $this->capacidadeMaxima) { 
            array_push($this->itens, $itens); 
            echo "<li>O item ( {$itens->getNome()} ) foi adicionado com sucesso </li>";
        } else {
            echo "<li> O item ( {$itens->getNome()} ) ultrapassou o limite máximo </li>";
        }
    }

    public function remover(string $nome) {
        for ($i = 0; $i < count($this->itens); $i++) {
            if ($this->itens[$i]->getNome() === $nome) { 
                unset($this->itens[$i]);
                $this->itens = array_values($this->itens); 
                echo "Item ( {$nome} ) foi removido com sucesso.<br>";
                return; 
            }
        }        
    }
    private function calcPesoAtual(): float {
        $pesoTotal = 0;
        foreach ($this->itens as $item) {
            $pesoTotal += $item->getPeso(); 
        }
        return $pesoTotal; 
    }

}
