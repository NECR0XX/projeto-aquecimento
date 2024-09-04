<?php
require_once '..\..\App\Model\TrainerModel.php';

class TrainerController {
    private $trainerModel;

    public function __construct($pdo) {
        $this->trainerModel = new TrainerModel($pdo);
    }

    public function criarCadastroTrainer($name, $age, $height, $weight, $cpf, $rg) {
        $this->trainerModel->criarCadastroTrainer($name, $age, $height, $weight, $cpf, $rg);
    }
    
    public function listarTrainers() {
        return $this->trainerModel->listarTrainers();
    }

    public function exibirListaTrainers() {
        $trainers = $this->trainerModel->listarTrainers();
        include '../../Public/listaTrainer.php';
    }
    public function atualizarTrainer($name, $age, $height, $weight, $cpf, $rg) {
        $this->trainerModel->atualizarTrainer($name, $age, $height, $weight, $cpf, $rg);
    }
    
    public function excluirTrainer ($id) {
        $this->trainerModel->excluirTrainer($id);
    }
   
}
?>