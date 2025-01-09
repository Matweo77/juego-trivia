<?php
session_start();
include_once "conexion.php";

if (!isset($_SESSION['puntuacion'])) {
    $_SESSION['puntuacion'] = 0; 
}

$feedback = ""; 
$preguntas = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['respuesta'])) {
        $respuesta_usuario = $_POST['respuesta'];
        $respuesta_correcta = $_POST['respuesta_correcta'];

        if ($respuesta_usuario == $respuesta_correcta) {
            $_SESSION['puntuacion'] += 10;
            $feedback = "¡Correcto!";
        } else {
            $feedback = "Incorrecto. La respuesta correcta era: $respuesta_correcta.";
        }
    }
}

$sql = "SELECT * FROM preguntas ORDER BY RAND() LIMIT 5"; 
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $preguntas[] = $row; 
    }
} else {
    echo "No hay preguntas disponibles.";
}

$conn->close();
include 'juego_template.php';
?>
