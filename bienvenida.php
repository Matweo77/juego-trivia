<?php 
session_start();
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = htmlspecialchars($_POST['nombre']);
    $_SESSION['nombre'] = $nombre_usuario;

    $check_sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "<h1>Error: El nombre de usuario '{$nombre_usuario}' ya está en uso.</h1>";
        echo "<p><a href='index.php'>Volver a intentar</a></p>";
    } else {
        $insert_sql = "INSERT INTO usuarios (usuario, clave) VALUES (?, ?)";
        $clave = password_hash("default_password", PASSWORD_DEFAULT);

        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $nombre_usuario, $clave);
        
        if ($insert_stmt->execute()) {
            echo "<p>Gracias por registrarte.</p>";
        } else {
            echo "Error al registrar: " . $insert_stmt->error;
        }
        
        $insert_stmt->close();
    }

    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--libreria de confetti chart js-->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
</head>

<script>
    function fireConfetti() {
        confetti({
            particleCount: 1700,
            spread: 1000, /*este es para la distancia*/
            origin: { y: 0.3 },
            ticks: 1000, /*para hacer animar mas suave*/
            steps: 0.5,
            gravity: 0.6,
        });
    }
    document.addEventListener('DOMContentLoaded', (event) => {
        fireConfetti();
    });
</script>
<style>
     .wrapper:hover{
            cursor: url(https://www.flaticon.es/icono-gratis/enhorabuena_4442090),auto ;
        }
</style>
<body>
    <!---------------------------------bienvenida------------------------------------------>
    <section class="welcome">
        <div class="container-lg d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="row justify-content-center">
                <div class="col text-center">
                    <h1 class="mb-5 fs-1 text-primary" style="text-shadow: .1px .1px 5px;">BIENVENIDO QUERIDO USUARIO </h1>
                <!--  <?php echo "<h1> $usuario </h1>"; ?> -->
                    <p class="fs-4 text-muted ">
                        ¡Prepárate para disfrutar de un emocionante juego de trivia!
                    </p>
                    <div class="botones mt-5">
                        <a class="btn btn-outline-primary btn-lg" href="quiz.php">Ir a jugar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------bienvenida--------------------------------------->
    <a href="index.php">Volver a la pantalla inicial</a>
    <a href="quiz.php" style="text-decoration: none;">
        <button type="button">Ir al Juego</button>
    </a>
</body>
</html>