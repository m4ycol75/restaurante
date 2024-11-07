<?php
require_once  ('funciones.php');
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarProducto($_GET['id']);
    $mensaje = $count > 0 ? "Producto eliminado con éxito."."<br><br>" : "No se pudo eliminar el producto."."<br><br>";
}

$datos = obtenerProducto();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Gestión de Productos</h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="registrar_producto.php" class="button">Agregar Nuevo Producto</a>

        <h2>Lista de Productos</h2>
        <!-- ... -->

        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Disponible</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo htmlspecialchars($dato['nombre']); ?></td>
                    <td><?php echo "S/.".htmlspecialchars($dato['precio']); ?></td>
                    <td><?php echo htmlspecialchars($dato['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($dato['categoria']); ?></td>
                    <td><?php echo $dato['disponible'] ? 'Sí' : 'No'; ?></td>
                    <td class="actions">
                        <a href="editar_producto.php?id=<?php echo $dato['_id']; ?>" class="button">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?php echo $dato['_id']; ?>" class="button" 
                        onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>