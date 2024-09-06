<?php
include_once '../../DB/Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Trainer/listaTrainer.php');
        exit;
    }
    
    $id = $_GET['id'];

    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    $stmt = $pdo->prepare('UPDATE trainer SET name = ?, age = ?, height = ?, weight = ?, cpf = ?, rg = ? WHERE id = ?');
    $stmt->execute([$name, $age, $height, $weight, $cpf, $rg, $id]);
    header('Location: ../../Public/Trainer/listaTrainer.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Trainer/listaTrainer.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM trainer WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/Trainer/listaTrainer.php');
    exit;   
}
$name = $appointment['name'];
$age = $appointment['age'];
$height = $appointment['height'];
$weight = $appointment['weight'];
$cpf = $appointment['cpf'];
$rg = $appointment['rg'];

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

                <label for="age">Idade:</label><br>
                <input type="number" name="age" value="<?php echo $age; ?>" required></br>

                <label for="height">Altura:</label><br>
                <input type="number" name="height" value="<?php echo $height; ?>" required></br>

                <label for="weight">Peso:</label><br>
                <input type="number" name="weight" value="<?php echo $weight; ?>" required></br>

                <label for="cpf">CPF:</label><br>
                <input type="number" name="cpf" value="<?php echo $cpf; ?>" required></br>

                <label for="rg">RG:</label><br>
                <input type="number" name="rg" value="<?php echo $rg; ?>" required></br><br>

                <button type="submit">Atualizar</button><br>
                <a href="../../Public/Trainer/listaTrainer.php">Voltar à página anterior</a>
            </form>
        </section>
    </main>
</body>
</html>