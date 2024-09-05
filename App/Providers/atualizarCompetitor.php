<?php
include_once '../../DB/Config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_GET['id'])) {
        header('Location: ../../Public/Competitor/lista.php');
        exit;
    }
    $id =$_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $team = $_POST['team'];

    $stmt = $pdo->prepare('UPDATE competitor SET name = ?, age = ?, gender = ?, height = ?, weight = ?, cpf = ?, rg = ?, team = ? WHERE id = ?');
    $stmt->execute([$name, $age, $gender, $height, $weight, $cpf, $rg, $team, $id]);
    header('location: ../../Public/Competitor/lista.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Competitor/lista.php');
    exit;
}
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM competitor WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/Competitor/lista.php');
    exit;
}
$name = $appointment['name'];
$age = $appointment['age'];
$gender = $appointment['gender'];
$height = $appointment['height'];
$weight = $appointment['weight'];
$cpf = $appointment['cpf'];
$rg = $appointment['rg'];
$team = $appointment['team'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

    </header>
    <main>
        <section>
            <h2>Editar Competidor</h2>
            <form method="post">
                <label for="name">
                    <span>Nome:</span><br>
                    <input type="text" name="name" value="<?php echo $name ?>" required>
                </label><br>
                <label for="age">
                    <span>Idade:</span><br>
                    <input type="number" name="age" value="<?php echo $age ?>" required>
                </label><br>
                <label for="gender">
                    <span>Gênero:</span><br>
                    <select name="gender">
                        <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </label><br>
                <label for="height">
                    <span>Altura:</span><br>
                    <input type="number" name="height" value="<?php echo $height ?>" required>
                </label><br>
                <label for="weight">
                    <span>Peso:</span><br>
                    <input type="number" name="weight" value="<?php echo $weight ?>" required>
                </label><br>
                <label for="cpf">
                    <span>CPF:</span><br>
                    <input type="number" name="cpf" value="<?php echo $cpf ?>" required>
                </label><br>
                <label for="rg">
                    <span>RG:</span><br>
                    <input type="number" name="rg" value="<?php echo $rg ?>" required>
                </label><br>
                <label for="team">
                    <span>Equipe:</span><br>
                    <input type="text" name="team" value="<?php echo $team ?>" required>
                </label><br><br>
                <button type="submit">Atualizar</button><br>
                <a href="../../Public/Competitor/lista.php">Voltar à página anterior</a>
            </form>
        </section>
    </main>
</body>
</html>