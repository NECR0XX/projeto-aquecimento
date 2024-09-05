<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/SportController.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $esporteController = new EsporteController($pdo);

    try {
        $esporteController->excluirEsporte($id);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>