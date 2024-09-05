<?php
include_once '../../DB/Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Sport/ListarSports.php');
        exit;
    }
    
    $id = $_GET['id'];

    $name = $_POST['name'];
    $category = $_POST['category'];

    $stmt = $pdo->prepare('UPDATE sport SET name = ?, category = ? WHERE id = ?');
    $stmt->execute([$name, $category, $id]);
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM sport WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/Sport/ListarSports.php');
    exit;   
}
$name = $appointment['name'];
$category = $appointment['category'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
    <main>
        <section>
            <h2>Editar Treinador</h2>
            <form method="post">
                <label for="name">Nome:</label><br>
                <input type="text" name="name" value="<?php echo $name; ?>" required></br>

                <label for="category">Categoria:</label><br>
                <input type="text" name="category" value="<?php echo $category; ?>" required></br>

                <button type="submit">Atualizar</button><br>
                <a href="../../Public/Sport/ListarSports.php">Voltar à página anterior</a>
            </form>
        </section>
    </main>
</body>
</html>