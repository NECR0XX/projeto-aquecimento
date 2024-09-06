<?php

class CompetitorModel {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarCompetitor($name, $age, $gender, $height, $weight, $cpf, $rg, $team) {
        $sql = "INSERT INTO competitor (name, age, gender, height, weight, cpf, rg, team) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $gender, $height, $weight, $cpf, $rg, $team]);
    }

    public function listarCompetitors() {
        $sql = "SELECT * FROM competitor";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarCompetitor($id, $name, $age, $gender, $height, $weight, $cpf, $rg, $team) {
        $sql = "UPDATE competitor SET name = ?, age = ?, gender = ?, height = ?, weight = ?, cpf = ?, rg = ?, team = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $age, $gender, $height, $weight, $cpf, $rg, $team, $id]);
    }

    public function deletarCompetitor($id) {
        $sql = "DELETE FROM competitor WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

 ?>