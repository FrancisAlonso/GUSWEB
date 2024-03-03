<?php
// guardar.php
header('Content-Type: application/json');

// Obtener los datos JSON de la solicitud
$datos = json_decode(file_get_contents('php://input'), true);

// Conectar a la base de datos (asegúrate de tener las credenciales correctas)
$conexion = new mysqli("localhost", "root", "", "tiendadiscos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Escapar y preparar los datos para la inserción
$nombre = $conexion->real_escape_string($datos['nombre']);
$apellido = $conexion->real_escape_string($datos['apellido']);
$edad = (int)$datos['edad'];

// Realizar la inserción en la base de datos
$query = "INSERT INTO datos_formulario (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";
$resultado = $conexion->query($query);

// Verificar el resultado de la inserción
if ($resultado) {
    echo json_encode(array('mensaje' => 'Datos guardados con éxito'));
} else {
    echo json_encode(array('mensaje' => 'Error al guardar los datos'));
}

// Cerrar la conexión
$conexion->close();
?>