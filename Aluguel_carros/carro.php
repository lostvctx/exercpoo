<?php
require_once 'Veiculo.php';

class carro extends Veiculo {
    private $portas;

    public function __construct($marca, $modelo, $precoDiaria, $portas, $disponivel = true) {
        parent::__construct($marca, $modelo, $precoDiaria, $disponivel);
        $this->portas = $portas;
    }

    public function calcularCusto($dias) {
        $total = $this->precoDiaria * $dias;
        return $total * 1.10; // +10% taxa
    }
}
