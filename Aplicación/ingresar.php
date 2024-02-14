<?php
header('Content-Type: application/json');

// Recibir los datos correctamente desde el formulario
$usuario = isset($_POST['txt_usuario']) ? $_POST['txt_usuario'] : '';
$nombre_apellido = isset($_POST['txt_nombre_apellido']) ? $_POST['txt_nombre_apellido'] : ''; 
$edad = isset($_POST['int_edad']) ? (int)$_POST['int_edad'] : 0; // Convertir la edad a entero

try {
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=usuario", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la sentencia SQL para insertar los datos
    $pdo = $conexion->prepare('INSERT INTO personas (usuario, nombre_apellido, edad) VALUES (?, ?, ?)');
    $pdo->bindParam(1, $usuario);
    $pdo->bindParam(2, $nombre_apellido);
    $pdo->bindParam(3, $edad);
    $pdo->execute();

    // Respuesta de éxito
    echo json_encode(['success' => true]);
} catch(PDOException $error) {
    // Capturar y enviar errores
    echo json_encode(['error' => $error->getMessage()]);
    die();
}
?>
