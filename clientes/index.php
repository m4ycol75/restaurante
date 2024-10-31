<?php
require_once  ('funciones.php');
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarCliente($_GET['id']);
    $mensaje = $count > 0 ? "Cliente eliminado con éxito."."<br><br>" : "No se pudo eliminar el cliente."."<br><br>";
}

$datos = obtenerTareas();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Gestión de Clientes</h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="registrar_cliente.php" class="button">Agregar Nuevo Cliente</a>

        <h2>Lista de clientes</h2>
        <!-- ... -->

        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($datos as $dato): ?>
                <tr>
                    <td><?php echo htmlspecialchars($dato['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($dato['correo']); ?></td>
                    <td><?php echo htmlspecialchars($dato['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($dato['direccion']); ?></td>
                    <td class="actions">
                        <a href="editar_cliente.php?id=<?php echo $dato['_id']; ?>" class="button">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?php echo $dato['_id']; ?>" class="button" 
                        onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>