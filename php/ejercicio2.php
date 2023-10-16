<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body id="ejercicio2">
    <h1>Calculadora de Descuentos</h1>
    <form method="post">
        <p>Categoría del cliente:</p>
        <select name="categoria">
            <option value="Gold">Gold</option>
            <option value="Platinum">Platinum</option>
            <option value="Clasica">Clasica</option>
        </select><br><br>

        <p>Cantidad de bultos:</p>
        <input type="number" name="cantidad_bultos" required><br><br>

        <p>Precio del bulto:</p>
        <input type="number" step="0.01" name="precio_bulto"><br><br>
        
        <p>Forma de pago:</p>
        <select name="forma_pago">
            <option value="C">Contado</option>
            <option value="CC">Cuenta Corriente</option>
        </select><br><br>
        <button type="submit" value="Calcular Descuento">Calcular</button>
        
    </form>
    
    <h3> Resultado </h3>
    <?php
    // Comprueba si el formulario se ha enviado mediante el método POST.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtenemos los datos del formulario
        $categoria = $_POST["categoria"];
        $cantidadBultos = intval($_POST["cantidad_bultos"]);
        $precioBulto = floatval($_POST["precio_bulto"]);
        $formaPago = $_POST["forma_pago"];
    
        // Función para calcular el total de compra
        function calcularTotalCompra($cantidadBultos, $precioBulto) {
            return $cantidadBultos * $precioBulto;
        }
    
        // Función para calcular descuentos adicionales según la cantidad de bultos y la forma de pago
        function calcularDescuentosAdicionales($cantidadBultos, $formaPago) {
            $descuentoAdicional = 0;
    
            // Usamos un switch-case para evaluar las condiciones
            switch (true) {
                case $cantidadBultos > 300 && $formaPago == "C":
                    $descuentoAdicional = $cantidadBultos * 0.05; // 5% de descuento al contado por más de 300 bultos.
                    break;
                case $cantidadBultos > 500 && $formaPago == "CC":
                    $descuentoAdicional = $cantidadBultos * 0.03; // 3% de descuento en cuenta corriente por más de 500 bultos.
                    break;
            }
    
            return $descuentoAdicional;
        }
    
        // Función para calcular el descuento de categoría
        function calcularDescuentoCategoria($categoria, $totalCompra) {
            $descuentoCategoria = 0;
    
            // Usamos un switch-case para evaluar la categoría
            switch ($categoria) {
                case "Gold":
                    $descuentoCategoria = $totalCompra * 0.10; // 10% de descuento para la categoría Gold.
                    break;
                case "Platinum":
                    $descuentoCategoria = $totalCompra * 0.05; // 5% de descuento para la categoría Platinum.
                    break;
            }
    
            return $descuentoCategoria;
        }
    
        // Calculamos el total de compra
        $totalCompra = calcularTotalCompra($cantidadBultos, $precioBulto);
    
        // Calculamos los descuentos adicionales
        $descuentoAdicional = calcularDescuentosAdicionales($cantidadBultos, $formaPago);
    
        // Calculamos el descuento de categoría
        $descuentoCategoria = calcularDescuentoCategoria($categoria, $totalCompra);
    
        // Calculamos el total de descuentos
        $totalDescuentos = $descuentoCategoria + $descuentoAdicional;
    
        // Calculamos el total a pagar
        $totalPagar = $totalCompra - $totalDescuentos;
    
        // Mostramos el informe
        
        echo "<h2>Informe de Compra</h2>";
        echo "<p>Categoría: $categoria</p>";
        echo "<p>Total de la compra: $ $totalCompra</p>";
        echo "<p>Total de descuentos: $ $totalDescuentos</p>";
        echo "<p>Total a Pagar: $ $totalPagar</p>";
    }
?>
    <p><a href="/index.html">Volver</a></p>
    
</body>
</html>