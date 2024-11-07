<?php
require_once('funciones.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = registrarProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria']);
    if ($id) {
        header("Location: index.php?mensaje=Cliente registrado con éxito");
        exit;
    } else {
        $error = "No se pudo registrar al cliente.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Cliente</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container">
        <h1>Registrar Nuevo Cliente</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <label for="">Nombre:
                <input type="text" name="nombre" require>
            </label><br><br>
            <label for="">Precio:
                <input type="number" name="precio">
            </label><br><br>
            <label for="">Descripcion:
                <input type="text" name="descripcion">
            </label>
            <label for="">Categoria:
                <input type="text" name="categoria">
            </label><br><br>

            <input type="submit" value="Registrar Cliente">

            <button><a href="index.php">Volver</button>
            </a>
        </form>
    </div>
</body>

</html>