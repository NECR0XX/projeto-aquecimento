<?php
include_once '../../DB/Config.php';

// Inicializa a variável para mensagens
$mensagem = '';

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

    // Atualiza o treinador no banco de dados
    $stmt = $pdo->prepare('UPDATE trainer SET name = ?, age = ?, height = ?, weight = ?, cpf = ?, rg = ? WHERE id = ?');
    $stmt->execute([$name, $age, $height, $weight, $cpf, $rg, $id]);

    // Redireciona após a atualização
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
$trainer = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$trainer) {
    header('Location: ../../Public/Trainer/listaTrainer.php');
    exit;   
}

$name = $trainer['name'];
$age = $trainer['age'];
$height = $trainer['height'];
$weight = $trainer['weight'];
$cpf = $trainer['cpf'];
$rg = $trainer['rg'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Treinador</title>
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
</head>
<body>
    <header>
    <div class="barra">
        <div class="cadastro">
            cadastro.com
        </div>
    </div>
    </header>

    <main>
        <section>
            <div class="titulo">
                Editar treinador
            </div>
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
            <form method="post">
                <label>
                    <span>Nome:</span><br>
                    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required>
                </label><br>

                <label>
                    <span>Idade:</span><br>
                    <input type="number" name="age" min="0" value="<?= htmlspecialchars($age) ?>" required>
                </label><br>

                <div class="row">
                    <label>
                        <span>Altura:</span><br>
                        <input type="number" name="height" min="0" value="<?= htmlspecialchars($height) ?>" required>
                    </label>
                    <label>
                        <span>Peso:</span><br>
                        <input type="number" name="weight" min="0" value="<?= htmlspecialchars($weight) ?>" required>
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

                <button type="submit">Atualizar</button><br>
                <div class="paginaanterior">
                    <a href="../../Public/Trainer/listaTrainer.php">Voltar à página anterior</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>