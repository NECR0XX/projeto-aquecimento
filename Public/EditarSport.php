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

if (!$esporte) {
    header('Location: ListarSports.php');
    exit;   
}

$name = $esporte['name'];
$category = $esporte['category'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Atualizar Esporte</title>
</head>
<body>
    <a href="ListarSports.php">Voltar</a>
<h1>Atualizar Esporte</h1>
<form method="post">

    <label for="name">Nome:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" required><br>

    <label for="category">Categoria:</label>
    <input type="text" name="category" value="<?php echo $category; ?>" required><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
