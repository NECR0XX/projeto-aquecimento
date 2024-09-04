<?php
require_once '../Model/TrainerModel.php';

class TrainerController {
    private $trainerModel;

    public function __construct($pdo) {
        $this->trainerModel = new TrainerModel($pdo);
    }

    public function criarCadastroTrainer($name, $age, $height, $weight, $cpf, $rg) {
        $this->trainerModel->criarCadastroTrainer($name, $age, $height, $weight, $cpf, $rg);
    }
    
    public function listarTrainer() {
        return $this->trainerModel->listarTrainer();
    }

    public function exibirListaTrainer() {
        $trainers = $this->trainerModel->listarTrainer();
        include '../../Public/listaTrainer.php';
    }
   
   
}
?>