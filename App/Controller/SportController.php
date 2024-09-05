<?php
require_once 'C:\xampp\htdocs\projeto-aquecimento\App\Model\SportModel.php';

class EsporteController {
    private $esporteModel;

    public function __construct($pdo) {
        $this->esporteModel = new EsporteModel($pdo);
    }

    public function criarEsporte($name, $category) {
        $this->esporteModel->criarEsporte($name, $category);
    }

    public function listarEsportes() {
        return $this->esporteModel->listarEsportes();
    }

    public function exibirListaEsportes() {
        $esportes = $this->esporteModel->listarEsportes();
        include 'Public/Sport.php';
    }

    public function atualizarEsporte($id, $name, $category) {
        $this->esporteModel->atualizarEsporte($id, $name, $category);
    }
    
    public function excluirEsporte ($id) {
        $this->esporteModel->excluirEsporte($id);
    }
}
   
?>