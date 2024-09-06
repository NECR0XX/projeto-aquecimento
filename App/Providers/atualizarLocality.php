<?php
require_once '../../DB/Config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_GET['id'])) {
        header('Location: ../../Public/Locality/index.php');
        exit;
    }
    
    $id_locality = $_GET['id'];

    $street = $_POST['street'];
    $neighborhood = $_POST['neighborhood'];
    $number = $_POST['number'];
    $cep = $_POST['cep'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $stmt = $pdo->prepare('UPDATE locality SET street = ?, neighborhood = ?, number = ?, cep = ?, city = ?, state = ?, country = ? WHERE id = ?');
    $stmt->execute([$street, $neighborhood, $number, $cep, $city, $state, $country, $id_locality]);
    header('Location: ../../Public/Locality/index.php');
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: ../../Public/Locality/index.php');
    exit;
}

$id_locality = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM locality WHERE id = ?');
$stmt->execute([$id_locality]);
$locality = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$locality) {
    header('Location: ../../Public/Locality/index.php');
    exit;   
}

$street = $locality['street'];
$neighborhood = $locality['neighborhood'];
$number = $locality['number'];
$cep = $locality['cep'];
$city = $locality['city'];
$state = $locality['state'];
$country = $locality['country'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/stylecrud.css">
    <link rel="stylesheet" href="../../Resources/Css/msgcadastro.css">
    <link rel="stylesheet" href="../../Resources/Css/stylereg.css">
    <link rel="stylesheet" href="../../Resources/Css/paginainicial.css">
    <title>Gerenciamento de Localidades</title>
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
        Editar localidades
    </div>
    <main>
        <section>
            <!-- Remova esta seção se não precisar de mensagens de erro -->
            <!-- <?php if ($mensagem): ?>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="document.getElementById('modal').style.display='none'">&times;</span>
                        <p><?= htmlspecialchars($mensagem) ?></p>
                    </div>
                </div>
                <script>
                    document.getElementById('modal').style.display = 'block';
                </script>
            <?php endif; ?> -->
        </section>
        <section>
            <form method="post">
                <label>
                    <span>Rua:</span><br>
                    <input type="text" name="street" value="<?= htmlspecialchars($street) ?>" required>
                </label><br>
                <label>
                    <span>Bairro:</span><br>
                    <input type="text" name="neighborhood" value="<?= htmlspecialchars($neighborhood) ?>" required>
                </label><br>
                <label>
                    <span>Número:</span><br>
                    <input type="text" name="number" value="<?= htmlspecialchars($number) ?>" required>
                </label><br>
                <label>
                    <span>CEP:</span><br>
                    <input type="text" name="cep" value="<?= htmlspecialchars($cep) ?>" required>
                </label><br>
                <label>
                    <span>Cidade:</span><br>
                    <input type="text" name="city" value="<?= htmlspecialchars($city) ?>" required>
                </label><br>
                <label>
                    <span>Estado:</span><br>
                    <input type="text" name="state" value="<?= htmlspecialchars($state) ?>" required>
                </label><br>
                <label>
                    <span>País:</span><br>
                    <input type="text" name="country" value="<?= htmlspecialchars($country) ?>" required>
                </label><br><br>
                <button type="submit">Atualizar</button><br>
                <div class="paginaanterior">
                    <a href="../../Public/Locality/index.php">Voltar à página anterior</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>