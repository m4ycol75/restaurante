<?php
require_once ('funciones.php');

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$dato= obtenerProductoPorId($_GET['id']);

if (!$dato) {
    header("Location: index.php?mensaje=Cliente no encontrado");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarProducto($_GET['id'], $_POST['nombre'], $_POST['precio'], $_POST['descripcion'],$_POST['categoria'], isset($_POST['disponible']));
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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Editar Producto</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($dato['nombre']); ?>" required></label>
            <label>Precio: <input type="number"name="precio" required value="<?php echo htmlspecialchars($dato['precio']); ?>"></label>
            <label>Descripcion: <input type="text" name="descripcion" value="<?php echo htmlspecialchars($dato['descripcion']); ?>" required></label>
            <label>Categoria: <input type="text" name="categoria" value=" <?php echo htmlspecialchars($dato['categoria']); ?>"></label>
            <label>Disponible: <input type="checkbox" name="disponible" <?php echo $dato['disponible'] ? 'checked' : ''; ?>></label>
            <input type="submit" value="Actualizar Producto">
        </form>
        <a href="index.php" class="button">Volver a la lista de Productos</a>
    </div>
</body>

</html>