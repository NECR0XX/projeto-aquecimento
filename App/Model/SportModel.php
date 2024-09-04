<?php
class EsporteModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarEsporte($name, $category) {
        $sql = "INSERT INTO sport (name, category) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $category]);
    }

    public function listarEsportes() {
        $sql = "SELECT * FROM sport";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function atualizarEsporte($id, $name, $category){
        $sql = "UPDATE sport SET name = ?, category = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $category, $id]);
    }
    

    public function excluirEsporte($id) {
        $sql = "DELETE FROM sport WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    
}
?>