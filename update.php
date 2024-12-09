<?php
include 'db.php';

$id = $_GET["id"];
$sql = "SELECT * FROM animales WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $nombre = $_POST["nombre"];
    $peso = $_POST["peso"];
    $color = $_POST["color"];

    $sql = "UPDATE animales SET tipo='$tipo', nombre='$nombre', peso=$peso, color='$color' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
</head>
<body>
    <h1>Editar Animal</h1>
    <form method="POST">
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <label for="peso">Peso:</label>
        <input type="number" step="0.01" name="peso" value="<?php echo $row['peso']; ?>" required>
        <label for="color">Color:</label>
        <input type="text" name="color" value="<?php echo $row['color']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
