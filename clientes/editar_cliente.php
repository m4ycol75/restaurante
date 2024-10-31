<?php
require_once ('funciones.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$dato= obtenerClientePorId($_GET['id']);

if (!$dato) {
    header("Location: index.php?mensaje=Cliente no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarCliente($_GET['id'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], isset($_POST['direccion']));
    if ($count > 0) {
        header("Location: index.php?mensaje=Tarea actualizada con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar la tarea.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($dato['nombre']); ?>" required></label>
            <label>Correo: <input type="email"name="correo" required value="<?php echo htmlspecialchars($dato['correo']); ?>"></label>
            <label>Telefono: <input type="text" name="telefono" value="<?php echo htmlspecialchars($dato['telefono']); ?>" required></label>
            <label>Direccion: <input type="text" name="direccion" value=" <?php echo htmlspecialchars($dato['direccion']); ?>"></label>
            <input type="submit" value="Actualizar Cliente">
        </form>
        <a href="index.php" class="button">Volver a la lista de clientes</a>
    </div>
</body>

</html>