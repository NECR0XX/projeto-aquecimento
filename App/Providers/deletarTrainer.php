<?php
require_once '../../DB/Config.php';
require_once '..\..\App\Controller\TrainerController.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $trainerController = new TrainerController($pdo);

    try {
        $trainerController->excluirTrainer($id);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>