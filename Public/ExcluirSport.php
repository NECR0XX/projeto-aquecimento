<?php
require_once '../DB/Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ListarSports.php');
        exit;
    }
    
    $id = $_GET['id'];

    $name = $_POST['name'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare('UPDATE sport SET name = ?, category = ? WHERE id = ?');
    $stmt->execute([$name, $category, $id]);
    header('Location: ListarSports.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ListarSports.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM sport WHERE id = ?');
$stmt->execute([$id]);
$esporte = $stmt->fetch(PDO::FETCH_ASSOC);



$name = $esporte['name'];
$category = $esporte['category'];
?>

<a href="#" onclick="confirmDelete(<?php echo $esporte['id']; ?>)">excluir</a>