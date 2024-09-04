<?php
require_once '';

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
        $trainer = $this->trainerModel->listarTrainer();
        include '';
    }
   
   
}
?>