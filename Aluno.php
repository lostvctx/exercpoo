<?php 
class Aluno{
    private string $nome;
    private string $cidade;
    private string $bairro;
    private string $curso;

    public function __construct(string $nome1, string $cidade1, string $bairro1, string $curso1) {
        $this->nome =$nome1;
        $this->cidade =$cidade1;
        $this->bairro =$bairro1;
        $this->curso =$curso1;
    }

    public function exibirInformacoes(){
        echo "<h2> informações do aluno</h2>";
        echo "<strong> nome :</strong>".htmlspecialchars($this->nome)."<br>";
        echo "<strong> cidade :</strong>".htmlspecialchars($this->cidade)."<br>";
        echo "<strong> bairro :</strong>".htmlspecialchars($this->bairro)."<br>";
        echo "<strong> curso :</strong>".htmlspecialchars($this->curso)."<br>";
     
    }




}


?>