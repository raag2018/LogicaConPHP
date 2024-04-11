<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Palíndromos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
    <h2>Verificador de Palíndromos</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="texto">Ingrese un texto:</label>
        <input type="text" id="texto" name="texto" required>
        <button type="submit">Verificar Palíndromo</button>
    </form>

    <?php
    // Función para verificar si un texto es un palíndromo
    function esPalindromo($texto) {
        // Convertir el texto a minúsculas y eliminar los caracteres no alfanuméricos
        $texto = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $texto));
        // Comparar el texto original con su reverso
        return $texto === strrev($texto);
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el texto ingresado por el usuario
        $texto = $_POST["texto"];

        // Verificar si el texto ingresado es un palíndromo
        if (esPalindromo($texto)) {
            echo "<p>El texto \"$texto\" es un palíndromo.</p>";
        } else {
            echo "<p>El texto \"$texto\" no es un palíndromo.</p>";
        }
    }
    ?>
    </div>
</body>
</html>