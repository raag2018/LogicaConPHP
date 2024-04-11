<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Números Primos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
    <h2>Verificador de Números Primos</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero" min="2" required>
        <button type="submit">Verificar Primalidad</button>
    </form>

        <?php
        // Función para verificar si un número es primo
        function esPrimo($numero) {
            if ($numero <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el número ingresado por el usuario
            $numero = $_POST["numero"];
            // Verificar si el número ingresado es primo
            if (esPrimo($numero)) {
                echo "<p>El número $numero es primo.</p>";
            } else {
                echo "<p>El número $numero no es primo.</p>";
            }
        }
        ?>
    </div>
</body>
</html>