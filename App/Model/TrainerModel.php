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
    // Model para atualizar Treinadores
    public function atualizarTrainer($id, $name, $age, $height, $weight, $cpf, $rg){
        $sql = "UPDATE trainer SET name = ?, age = ?, height = ?, weight = ?, cpf = ?, rg = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $height, $weight, $cpf, $rg]);
        header("Location:");
        exit;
    }
    
    // Model para deletar Locality
    public function excluirTrainer($id) {
        $sql = "DELETE FROM trainer WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>