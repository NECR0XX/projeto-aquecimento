<?php
class LocalityModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Model para criar Localitys
    public function criarLocality($street, $neighborhood, $number, $cep, $city, $state, $country) {
        $sql = "INSERT INTO locality (street, neighborhood, number, cep, city, state, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$street, $neighborhood, $number, $cep, $city, $state, $country]);
        header("Location: ../../Public/Locality/index.php");
        exit;
    }

    // Model para listar Localitys
    public function listarLocalitys() {
        $sql = "SELECT * FROM locality";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Model para atualizar Localitys
    public function atualizarLocality($id, $street, $neighborhood, $number, $cep, $city, $state, $country){
        $sql = "UPDATE locality SET street = ?, neighborhood = ?, number = ?, cep = ?, city = ?, state = ?, country = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$street, $neighborhood, $number, $cep, $city, $state, $country]);
        header("Location: ../../Public/Locality/index.php");
        exit;
    }
    
    // Model para deletar Locality
    public function excluirLocality($id) {
        $sql = "DELETE FROM locality WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
    
}
?>
