<?php
require_once 'Veiculo.php';

class moto extends Veiculo {
    private $cilindradas;

    public function __construct($marca, $modelo, $precoDiaria, $cilindradas, $disponivel = true) {
        parent::__construct($marca, $modelo, $precoDiaria, $disponivel);
        $this->cilindradas = $cilindradas;
    }

    public function calcularCusto($dias) {
        $total = $this->precoDiaria * $dias;
        return $total * 1.05; // +5% taxa
    }
}
