<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'usuario') or die(mysqli_error($conexion));

// Llamar a la función principal
diferencia($conexion);

// Función para manejar las acciones de inserción y eliminación
function diferencia($conexion){
    if(isset($_POST['enviar'])){
        insertar($conexion);
    }
    if(isset($_POST['eliminar'])){
        eliminar($conexion);
    }
}

// Función para insertar un nuevo registro en la base de datos
function insertar($conexion){
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $consulta = "INSERT INTO persona(cedula, nombre, apellido) VALUES ('$cedula', '$nombre', '$apellido')";
    mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    header("location: index.php");
}

// Función para eliminar un registro de la base de datos
function eliminar($conexion){
    $cedula = $_POST['cedula'];

    $consulta = "DELETE FROM persona WHERE cedula='$cedula'";
    mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    mysqli_close($conexion);
}

// Función para cargar la tabla con los datos de la base de datos
function cargarTabla($conexion){
    $consulta = "SELECT * FROM persona";
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila['cedula']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "</tr>";
    }
    mysqli_close($conexion);
}
?>