<?php
require_once '../../DB/Config.php';
require_once '..\..\App\Controller\CompetitorController.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $competitorController = new CompetitorController($pdo);

    try {
        $competitorController->deletarCompetitor($id);
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
} else {
    echo "error";
}
?>