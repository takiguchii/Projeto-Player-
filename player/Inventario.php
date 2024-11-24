<?php 

require_once("Item.php");

class Inventario {
    private array $itens = []; 
    private float $capacidadeMaxima;

    public function __construct() {
        $this->atualizarCapacidade(); 
    }

    public function atualizarCapacidade(int $nivel): void {
        $this->capacidadeMaxima = 20 + ($this->nivel * 3);
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
            echo "<li>O item ( {$itens->getNome()} ) ultrapassou o limite máximo </li>";
        }
    }

    public function remover(string $nome): void {
        foreach ($this->itens as $indice => $item) {
            if ($item->getNome() === $nome) { 
                unset($this->itens[$indice]);
                $this->itens = array_values($this->itens); 
                echo "Item ( {$nome} ) foi removido com sucesso.<br>";
                return; 
            }
        }
        echo "Item ( {$nome} ) não encontrado no inventário.<br>";
    }

    private function calcPesoAtual(): float {
        $pesoTotal = 0;
        foreach ($this->itens as $item) {
            $pesoTotal += $item->getPeso(); 
        }
        return $pesoTotal; 
    }
}
