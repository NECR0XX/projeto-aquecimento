<?php

class TrainerModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Método para criar Treinadores
    public function criarCadastroTrainer($name, $age, $height, $weight, $cpf, $rg) {
        $sql = "INSERT INTO trainer (name, age, height, weight, cpf, rg) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $cpf, $rg]);
    }
    
    // Método para listar Treinadores
    public function listarTrainers() {
        $sql = "SELECT * FROM trainer";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>