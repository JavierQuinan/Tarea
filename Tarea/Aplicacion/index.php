<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="cedula" placeholder="Cedula">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <button type="submit" name="enviar">Enviar</button>
        <button type="submit" name="eliminar">Eliminar</button>
    </form>
    <table>
        <thead>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </thead>
        <tbody>
            <?php echo cargarTabla($conexion); ?> 
        </tbody>
    </table>
</body>
</html>