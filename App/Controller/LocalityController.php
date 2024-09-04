<?php
require_once '..\..\App\Model\LocalityModel.php';

class LocalityController {
    private $localityModel;

    public function __construct($pdo) {
        $this->localityModel = new LocalityModel($pdo);
    }

    public function criarLocality($street, $neighborhood, $number, $cep, $city, $state, $country) {
        $this->localityModel->criarLocality($street, $neighborhood, $number, $cep, $city, $state, $country);
    }

    public function listarLocalitys() {
        return $this->localityModel->listarLocalitys();
    }

    public function exibirListaLocalitys() {
        $localitys = $this->localityModel->listarLocalitys();
        include 'App/View/Usuarios/lista.php';
    }

    public function atualizarLocality($id, $street, $neighborhood, $number, $cep, $city, $state, $country) {
        $this->localityModel->atualizarLocality($id, $street, $neighborhood, $number, $cep, $city, $state, $country);
    }
    
    public function excluirLocality ($id) {
        $this->localityModel->excluirLocality($id);
    }
}
?>
