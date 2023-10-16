<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body id="ejercicio3">
    <h1>Clasificación del Ph</h1>
    <form method="post">
        <h2>Ingrese un número:</h2>
        <input type="number" name="numeroPh" min="1" max="10" required><br><br>
        <button type="submit">Clasificar Ph</button>
    </form>
    <h3> Resultado </h3>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ph = intval($_POST["numeroPh"]);
        $clasificacion = "";
        $producto = "";
        
        // Función para clasificar el valor de pH y obtener el producto relacionado.
        function clasificarPh($ph) {
            switch ($ph) {
                case ($ph < 5):
                    $clasificacion = "Ácido";
                    $producto = "Refrescos";
                    break;
                case 5:
                    $clasificacion = "Ácido";
                    $producto = "Agua en botellada";
                    break;
                case ($ph >= 6 && $ph <= 7):
                    $clasificacion = "Neutro";
                    $producto = "Agua de grifo";
                    break;
                case 8:
                    $clasificacion ="Alcalino";
                    $producto = "Sin producto";
                    break;
                case ($ph >= 9 && $ph <= 10):
                    $clasificacion = "Alcalino";
                    $producto = "Agua manantial";
                    break;
            }
            
            return array($clasificacion, $producto);
        }

        list($clasificacion, $producto) = clasificarPh($ph);
          
        
        echo "<p>pH: $ph<br></p>";
        echo "<p>Clasificación: $clasificacion<br></p>";
        echo "<p>El producto es: $producto</p>";
    }
    
    ?>
    <p><a href="/index.html">Volver</a></p>
</body>
</html>