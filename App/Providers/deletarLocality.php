<?php
require_once '../../DB/Config.php';
require_once '../../App/Controller/LocalityController.php';

if (isset($_GET['id_locality'])) {
    $id_locality = $_GET['id_locality'];
    $localityController = new LocalityController($pdo);

    try {
        $localityController->excluirLocality($id_locality);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>
