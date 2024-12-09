<?php
include 'db.php';

// Manejo de creación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["crear"])) {
    $tipo = $_POST["tipo"];
    $nombre = $_POST["nombre"];
    $peso = $_POST["peso"];
    $color = $_POST["color"];

    $sql = "INSERT INTO animales (tipo, nombre, peso, color) VALUES ('$tipo', '$nombre', $peso, '$color')";
    $conn->query($sql);
}

// Manejo de eliminación
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $sql = "DELETE FROM animales WHERE id=$id";
    $conn->query($sql);
}

// Consulta para mostrar los datos
$sql = "SELECT * FROM animales";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Animales</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestión de Animales</h1>

    <form method="POST" action="index.php">
        <h2>Agregar Animal</h2>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" required>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="peso">Peso:</label>
        <input type="number" step="0.01" name="peso" required>
        <label for="color">Color:</label>
        <input type="text" name="color" required>
        <button type="submit" name="crear">Agregar</button>
    </form>

    <h2>Lista de Animales</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Peso</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["tipo"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["peso"]; ?></td>
                <td><?php echo $row["color"]; ?></td>
                <td>
                    <a href="index.php?delete=<?php echo $row['id']; ?>">Eliminar</a>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Editar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
