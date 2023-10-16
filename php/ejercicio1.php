<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body id="ejercicio1">
    <h1>Tipo de carta</h1>
    <form method="post">
        <h2>Ingrese un número de carta:</h2>
        <input type="number" name="numero_carta">
        <button type="submit">Determinar</button>
    </form>
    <h3>Resultado</h3>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeroCarta = intval($_POST["numero_carta"]);
                 
        switch ($numeroCarta) {
            case 1:
                echo "<p>As</p>";
                echo "<img src='/images/1soles.jpg' alt='As'>";
                break;
            case 10:
                echo "<p>Sota</p>";
                echo "<img src='/images/10soles.jpg' alt='Sota'>";
                break;
            case 11:
                echo "<p>Caballo</p>";
                echo "<img src='/images/11soles.jpg' alt='Caballo'>";
                break;
            case 12:
                echo "<p>Rey</p>";
                echo "<img src='/images/12soles.jpg' alt='Rey'>";
                break;
            default:
                if ($numeroCarta >= 2 && $numeroCarta <= 9) {
                    echo "<p>El número $numeroCarta, NO es una figura del mazo español</p>";
                } else {
                    echo "<p>$numeroCarta Esté no es un número de una carta del mazo español</p>";
                }
                break;
        }  
    }
    ?>
    <p><a href="/index.html">Volver</a></p>
    
</body>
</html>