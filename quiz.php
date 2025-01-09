<?php
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1); 
session_start(); 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) { 
    session_unset(); 
    session_destroy(); 
    header("Location: /logout.php"); 
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

$dsn = "mysql:host=localhost;dbname=quiz_db;charset=utf8mb4";
$usuario = "root";
$clave = "";

try {
    $conexion = new PDO($dsn, $usuario, $clave);
} catch (PDOException $error) {
    die("Error: " . $error->getMessage());
}

// Inicializar puntuación si no existe
if (!isset($_SESSION['puntuacion'])) {
    $_SESSION['puntuacion'] = 0;
}

// Manejo de respuestas
if (isset($_POST['respuesta'])) {
    if (isset($_SESSION['respuesta_correcta'])) {
        $feedback = ($_POST['respuesta'] == $_SESSION['respuesta_correcta']) ? 
                    "¡Correcto!" : 
                    "Incorrecto. La respuesta correcta era: " . $_SESSION['respuesta_correcta'];
        if ($_POST['respuesta'] == $_SESSION['respuesta_correcta']) {
            $_SESSION['puntuacion'] += 10;
        }
    } else {
        $feedback = "Error al procesar la respuesta.";
    }
} else {
    $feedback = "";
}

$query = $conexion->query("SELECT * FROM questions ORDER BY RAND() LIMIT 5");
$preguntas = $query->fetchAll(PDO::FETCH_ASSOC);
$pregunta_actual = isset($_POST['pregunta_actual']) ? (int)$_POST['pregunta_actual'] : 0;

if ($pregunta_actual < count($preguntas)) {
    $_SESSION['respuesta_correcta'] = $preguntas[$pregunta_actual]['correct_option'];
} else {
    $puntuacion_final = $_SESSION['puntuacion'];
    
    function obtenerMensajePersonalizado($puntuacion) {
        if ($puntuacion >= 80) {
            return "¡Increíble! Eres un experto.";
        } elseif ($puntuacion >= 50) {
            return "¡Buen trabajo! Tienes un buen conocimiento.";
        } elseif ($puntuacion >= 30) {
            return "No está mal, pero puedes mejorar.";
        } else {
            return "¡Sigue intentándolo! Practica más para mejorar.";
            
        }
    }

    $mensaje_final = obtenerMensajePersonalizado($puntuacion_final);
    
    echo "<h2>Tu puntuación final es: " . $puntuacion_final . "</h2>";
    echo "<h3>" . htmlspecialchars($mensaje_final, ENT_QUOTES, 'UTF-8') . "</h3>";
    echo '<a href="quiz.php" style="text-decoration: none;"><button type="button">Volver a jugar</button></a>';

    session_destroy();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Juego de Preguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="div-principal">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Trivia al Azar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active " aria-current="page" href="index.php">Jugar con otro usuario &nbsp;| </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="quiz.php">Reiniciar pregunras</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                 <h6><p>Muchas gracias por jugar con nosotros!</p></h5>
                </form>
              </div>
            </div>
          </nav>
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-3 mb-5 fs-1 fw-bold text-center">Juego de Preguntas Trivia!!!</h1>
            </div>
        </div>
        <div class="container-xxl d-flex justify-content-center align-items-center" style="height: 80vh; widht: 100%;">
            <div class="text-center">
                <div class="row informacion mb-5">
                   
                   <div class="col-md-4">
                   <p class="text-success">Puntuación: <?php echo $_SESSION['puntuacion']; ?></p>
                   </div>
                   <div class="col-md-4">
                     <p class="text-warning">Tiempo restante: <span id="contador">120</span> segundos</p>
                   </div>
                   <div class="col-md-4">
                      <?php if ($feedback): ?>
                        <p class="text-secondary">  <?php echo $feedback; ?></p>
                       <?php endif; ?>
                   </div>
                </div>
                <div class="row bg-dark text-white p-5" style="border-radius: 8px;">
                    <div class="col-md-12">
                        <form  method="post" style="witdh: 40vh;">
                            <h3 class="mb-5">
                                <?php echo htmlspecialchars($preguntas[$pregunta_actual]['question'], ENT_QUOTES, 'UTF-8'); ?>
                            </h3>
                            <?php foreach (range('A', 'D') as $opcion): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="respuesta" value="<?php echo $opcion; ?>"
                                    required> <hr>
                                <label class="form-check-label">
                                    <?php echo htmlspecialchars($preguntas[$pregunta_actual]['option_' . strtolower($opcion)], ENT_QUOTES, 'UTF-8'); ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
        
                            <input type="hidden" name="pregunta_actual" value="<?php echo $pregunta_actual + 1; ?>">
                            <button type="submit" class="btn btn-outline-primary btn-sm mt-5">Enviar Respuesta</button>
                        </form>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- script para organizar el tiempo-->
    <script>
        let tiempo = 120;
        const temporizador = setInterval(() => {
            if (tiempo <= 0) {
                clearInterval(temporizador);
                alert("Se acabó el tiempo para responder esta pregunta! Dirígete a la siguiente pregunta.");
                document.getElementById("formulario").submit();
            }
            document.getElementById("contador").innerText = tiempo;
            tiempo--;
        }, 1000);
    </script>
</body>
</html>