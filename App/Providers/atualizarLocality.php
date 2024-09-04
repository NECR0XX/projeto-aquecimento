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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../public/css/style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Resources/Css/adm3.css">
    <link rel="stylesheet" href="../../Resources/Css/stylecrud.css">
    <title>Atualizar Localidade</title>
</head>
<body>
    <a href="../../Public/Locality/index.php">Voltar</a>
<h1>Atualizar Localidade</h1>
<form method="post">

    <label for="street">Street:</label>
    <input type="text" name="street" value="<?php echo $street; ?>" required><br>

    <label for="neighborhood">Neighborhood:</label>
    <input type="text" name="neighborhood" value="<?php echo $neighborhood; ?>" required><br>

    <label for="number">Number:</label>
    <input type="text" name="number" value="<?php echo $number; ?>" required><br>

    <label for="cep">CEP:</label>
    <input type="text" name="cep" value="<?php echo $cep; ?>" required><br>

    <label for="city">City:</label>
    <input type="text" name="city" value="<?php echo $city; ?>" required><br>

    <label for="state">State:</label>
    <input type="text" name="state" value="<?php echo $state; ?>" required><br>

    <label for="country">Country:</label>
    <input type="text" name="country" value="<?php echo $country; ?>" required><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>
