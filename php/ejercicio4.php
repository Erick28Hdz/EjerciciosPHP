<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body id="ejercicio4">
    <h1>Determinador de cifras</h1>
    <form method="post">
        <h2>Ingrese un número:</h2>
        <input type="number" name="numero"><br><br>
        <button type="submit">Determinar</button>
    </form>
    <h3> Resultado </h3>
    <?php
    // Define $cifras antes del bloque condicional
    $cifras = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = intval($_POST["numero"]);
        
        // Función para determinar las cifras
        function determinarCifras($numero) {
            switch (true) {
                case $numero >= 0 && $numero <= 9:
                    return 1;
                case $numero >= 10 && $numero <= 99:
                    return 2;
                case $numero >= 100 && $numero <= 999:
                    return 3;
                default:
                    return 0;
            }
        }

        // Llama a la función para determinar las cifras
        $cifras = determinarCifras($numero);
        
        if ($cifras > 0) {
            
            echo "<p>El número $numero es de $cifras cifra</p>" . ($cifras > 1 ? 's' : '');
        } else {
            
            echo "<p>El número $numero está fuera del rango.</p>";
        }
    }
    ?>
    <p><a href="/index.html">Volver</a></p>
</body>
</html>