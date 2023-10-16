<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body id="ejercicio5">
    <h1>Multiplicación par o impar</h1>
    <form method="post">
        <h2>Ingrese un número:</h2>
        <input type="number" name="numero"><br><br>
        <button type="submit">Determinar</button>
    </form>
    <h3> Resultado </h3>
    <?php
    $cifras = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = intval($_POST["numero"]);
        
        function dobleoTriple($numero) {
        $resultado = 0;
        
            switch ($numero % 2) {
                case 0:
                    $resultado = $numero * 2;
                    echo "<p>El doble del número $numero es: $resultado</p>";
                    break;
                case 1:
                    $resultado = $numero * 3;
                    echo "<p>El triple del número $numero es: $resultado</p>";
                    break;
                }

                return $resultado;
            }
            
        dobleoTriple($numero);
        
    }
            
    
    ?>
    <p><a href="/index.html">Volver</a></p>
</body>
</html>