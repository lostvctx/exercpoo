<?php
abstract class Veiculo {
    protected $marca;
    protected $modelo;
    protected $precoDiaria;
    protected $disponivel;

    public function __construct($marca, $modelo, $precoDiaria, $disponivel = true) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precoDiaria = $precoDiaria;
        $this->disponivel = $disponivel;
    }

    public function getDescricao() {
        return $this->marca . " " . $this->modelo;
    }

    public function getPrecoDiaria() {
        return $this->precoDiaria;
    }

    public function isDisponivel() {
        return $this->disponivel;
    }

    public function alugar() {
        if ($this->disponivel) {
            $this->disponivel = false;
        }
    }

    public function devolver() {
        $this->disponivel = true;
    }

    abstract public function calcularCusto($dias);
}
