<?php
require_once '../../DB/Config.php';
require_once '..\..\App\Controller\LocalityController.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $localityController = new LocalityController($pdo);

    try {
        $localityController->excluirLocality($id);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>