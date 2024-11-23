<?php
class Item {
    private string $nome;
    private float $peso;

    public function __construct(string $nome, float $peso) {
        $this->setNome($nome);
        $this->setPeso($peso);
    }
    public function setNome(string $nome): void {
        $this->nome = $nome;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setPeso(float $peso): void {
        $this->peso = $peso;
    }
    public function getPeso(): float {
        return $this->peso;
    }
}