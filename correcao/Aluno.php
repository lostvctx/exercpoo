<?php
class Aluno {
    public $nome;
    public $matricula;
    public $curso;
    public $mediaFinal;

    public function __construct($nome, $matricula, $curso, $mediaFinal) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->curso = $curso;
        $this->mediaFinal = $mediaFinal;
    }

    // Método para verificar se o aluno está aprovado ou reprovado
    public function media() {
        return ($this->mediaFinal >= 7) ? "Aprovado" : "Reprovado";
    }

    // Método para mostrar informações do aluno
    public function mostrarInformacao() {
        echo "<div class='resultado'>";
        echo "<h2>Informações do Aluno</h2>";
        echo "<p><strong>Nome:</strong> {$this->nome}</p>";
        echo "<p><strong>Matrícula:</strong> {$this->matricula}</p>";
        echo "<p><strong>Curso:</strong> {$this->curso}</p>";
        echo "<p><strong>Média Final:</strong> {$this->mediaFinal}</p>";
        echo "<p><strong>Situação:</strong> " . $this->media() . "</p>";
        echo "</div>";
    }
}
?>
