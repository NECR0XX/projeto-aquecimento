<?php
include_once '../../DB/Config.php';
if (!isset($_GET['id'])) {
    header('Location: ../../Public/listaTrainer.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM trainer WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: ../../Public/listaTrainer.php');
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
    <script type="text/javascript">
        function confirmDelete(event, id) {
            event.preventDefault();
            var modal = document.getElementById('confirmModal');
            var confirmBtn = document.getElementById('confirmBtn');
            confirmBtn.setAttribute('data-id', id); // Set the ID on the button as a data attribute
            modal.style.display = 'block';
            confirmBtn.onclick = function() {
                window.location.href = '../App/Controller/deletartrainer.php?id=' + id;
            }
        }

        function closeModal() {
            var modal = document.getElementById('confirmModal');
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            var modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</head>
<body>
<form method="post">
<label for="nome">Nome:</label>
    <input type="text" name="name" value="<?php echo $name; ?>" required></br>

    <label for="age">Idade:</label>
    <input type="number" name="age" value="<?php echo $age; ?>" required></br>

    <label for="age">Altura:</label>
    <input type="number" name="height" value="<?php echo $height; ?>" required></br>

    <label for="age">Peso:</label>
    <input type="number" name="weight" value="<?php echo $weight; ?>" required></br>

    <label for="age">CPF:</label>
    <input type="number" name="cpf" value="<?php echo $cpf; ?>" required></br>

    <label for="age">RG:</label>
    <input type="number" name="rg" value="<?php echo $rg; ?>" required></br>

    <button type="submit">Atualizar</button>

    <a class= "lixo" id= "delete" href="#" onclick="confirmDelete(event, '<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8'); ?>')"><img src="<?php echo '' ?>" width="30px" height= "30px"></a>
</form>

<!-- Modal de confirmação -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">DriveX</div>
        <p>Você tem certeza que deseja deletar esta nota fiscal?</p>
        <div class="modal-footer">
            <button class="btn-cancel" onclick="closeModal()">Cancelar</button>
            <button class="btn-confirm" id="confirmBtn">Confirmar</button>
        </div>
    </div>
</div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE trainer SET name = ?, age = ?, height = ?, weight = ?, cpf = ?, rg = ? WHERE id = ?');
    $stmt->execute([$name, $age, $height, $weight, $cpf, $rg, $id]);
    header('Location: listaTrainer.php');
    exit;
}