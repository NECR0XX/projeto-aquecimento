<?php
include_once '../../DB/Config.php';

$mensagem = ''; // Inicializa a variável para mensagens

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Competitor/lista.php');
        exit;
    }

    $id = $_GET['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $team = $_POST['team'];

    // Atualiza o competidor no banco de dados
    $stmt = $pdo->prepare('UPDATE competitor SET name = ?, age = ?, gender = ?, height = ?, weight = ?, cpf = ?, rg = ?, team = ? WHERE id = ?');
    $stmt->execute([$name, $age, $gender, $height, $weight, $cpf, $rg, $team, $id]);

    // Redireciona após a atualização
    header('Location: ../../Public/Competitor/lista.php');
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

// Preenche as variáveis com os dados do competidor
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
    <title>Editar Competidor</title>
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
</head>
<body>
    <header>
    </header>
    <div class="barra">
        <div class="cadastro">
            cadastro.com
        </div>
    </div>
    <div class="titulo">
        Editar competidor
    </div>
    <main>
        <section>
            <?php if ($mensagem): ?>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="document.getElementById('modal').style.display='none'">&times;</span>
                        <p><?= htmlspecialchars($mensagem) ?></p>
                    </div>
                </div>
                <script>
                    document.getElementById('modal').style.display = 'block';
                </script>
            <?php endif; ?>
        </section>
        <section>
            <form method="post">
                <label>
                    <span>Nome:</span><br>
                    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required>
                </label><br>
                <label>
                    <span>Idade:</span><br>
                    <input type="number" name="age" value="<?= htmlspecialchars($age) ?>" required>
                </label><br>
                <label>
                    <span>Gênero:</span><br>
                    <select name="gender" required>
                        <option value="">Selecione a opção</option>
                        <option value="Masculino" <?= $gender == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                        <option value="Feminino" <?= $gender == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                        <option value="Outro" <?= $gender == 'Outro' ? 'selected' : '' ?>>Outro</option>
                    </select>
                </label><br>
                <div class="row">
                    <label>
                        <span>Altura:</span><br>
                        <input type="number" name="height" value="<?= htmlspecialchars($height) ?>" required>
                    </label>
                    <label>
                        <span>Peso:</span><br>
                        <input type="number" name="weight" value="<?= htmlspecialchars($weight) ?>" required>
                    </label>
                </div><br>
                <label>
                    <span>CPF:</span><br>
                    <input type="text" name="cpf" value="<?= htmlspecialchars($cpf) ?>" required>
                </label><br>
                <label>
                    <span>RG:</span><br>
                    <input type="text" name="rg" value="<?= htmlspecialchars($rg) ?>" required>
                </label><br>
                <label>
                    <span>Equipe:</span><br>
                    <input type="text" name="team" value="<?= htmlspecialchars($team) ?>" required>
                </label><br><br>
                <button type="submit">Atualizar</button><br>
                <div class="paginaanterior">
                    <a href="../../Public/Competitor/lista.php">Voltar à página anterior</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
