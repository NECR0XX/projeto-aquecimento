<?php
require_once 'C:\xampp\htdocs\aquecimento\App\Model\CompetitorModel.php';

class CompetitorController {
    private $competitorModel;

    public function __construct($pdo) {
        $this->competitorModel = new CompetitorModel($pdo);
    }

    public function criarCompetitor($name, $age, $gender, $heiht, $weight, $cpf, $rg, $team) {
        $this->competitorModel->criarCompetitor($name, $age, $gender, $heiht, $weight, $cpf, $rg, $team);
    }

    public function listarCompetitors() {
        return $this->competitorModel->listarCompetitors();
    }

    public function exibirListaCompetitors() {
        $competitors = $this->competitorModel->listarCompetitors();
        include 'C:\xampp\htdocs\aquecimento\Public\competitor\lista.php';
    }

    public function atualizarCompetitor($id, $name, $age, $gender, $height, $weight, $cpf, $rg, $team) {
        $this->competitorModel->atualizarCompetitor($id, $name, $age, $gender, $height, $weight, $cpf, $rg, $team);
    }

    public function deletarCompetitor($id) {
        $this->competitorModel->deletarCompetitor($id);
    }
}

?>