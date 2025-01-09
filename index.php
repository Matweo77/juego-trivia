<?php 
include_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pantalla Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        .form-container {
            background-color: white;
            padding: 2.2rem 5rem;
            border-radius: 5px;
            border-radius: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 90vh;">
    <div class="container text-center">
        <div class="row mb-5">
            <div class="col-md-12">
                <h1 class="fs-1 mb-5">¡Bienvenido a Trivia al Azar!</h1>
                <p class="text-muted">
                    El emocionante juego de preguntas y respuestas que pondrá a prueba tus conocimientos en una amplia
                    variedad de temas! Prepárate para desafiar tu mente y divertirte mientras respondes preguntas aleatorias
                    que abarcan cultura general, historia, ciencia, entretenimiento y mucho más.
                </p>
            </div>
        </div>
        <div class="row mb-5 mt-5"></div>
        <div class="row mt-5">
            <div class="col-md-5 mx-auto">
                <div class="form-container shadow-lg">
                    <h3 class="mb-4">Ingrese su nombre</h3>
                    <form action="bienvenida.php" method="post">
                        <input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-3">
                        <div class="d-flex justify-content-center">
                            <input class="btn btn-sm btn-primary" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>