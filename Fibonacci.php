<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Fibonacci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Calculadora de Fibonacci</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="numero">Ingrese un número:</label>
            <input type="number" id="numero" name="numero" min="1" required>
            <button type="submit">Calcular Fibonacci</button>
        </form>
        <?php
        // Función para calcular la secuencia de Fibonacci
        function fibonacci($n) {
            $fibonacci = array(0, 1); // Los primeros dos números de Fibonacci
            for ($i = 2; $i < $n; $i++) {
                $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2]; // Calcula el siguiente número de Fibonacci
            }
            return $fibonacci;
        }
        // Verificar si se ha enviado el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el número ingresado por el usuario
            $numero = $_POST["numero"];
            // Verificar si el número ingresado es válido
            if ($numero > 0) {
                // Calcular la secuencia de Fibonacci
                $secuencia = fibonacci($numero);         
                // Mostrar la secuencia de Fibonacci
                echo "<h3>Secuencia de Fibonacci hasta el número $numero:</h3>";
                echo "<ul>";
                foreach ($secuencia as $valor) {
                    echo "<li>$valor</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Por favor, ingrese un número entero positivo mayor que cero.</p>";
            }
        }
        ?>
       </div>
</body>
</html>