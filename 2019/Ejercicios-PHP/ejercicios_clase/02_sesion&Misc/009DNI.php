<?php
session_start();
//Implemente un programa que solicite un número de DNI completo e nos diga si é un DNI correcto ou non. Un dni é correcto si a letra de control se corresponde co número

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 009 - DNI</title>  
</head>
<body>
    <p>Inserte DNI para saber su letra</p>
    <form action="" method="POST">
        <input type='number' name='dni'/>
        <input type='submit'/>
    </form>

<?php
    
if (isset($_POST['dni']) && !empty($_POST['dni']) && $_POST['dni'] != '' && $_POST['dni'] != null){
    if ($_POST['dni'] >= 10000000 && $_POST['dni'] <= 99999999 && $_POST['dni'] != 0){
    $dni = $_POST['dni']; // dni será el dividendo

    $cociente = $dni / 23; // el 23 es el divisor
    $noDecimals = floor($cociente); // cociente sin decimales
    $dniDeci = $noDecimals * 23; // multiplicamos el cociente sin decimales por 23 y nos dará un número muy próximo al del DNI
    $resto = $dni - $dniDeci; // Restamos el dni a este último número para saber el resto
    // Sabiendo el resto buscamos en el array a qué posición coincide

    $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

    echo "DNI número $dni <br>";
    echo "<br>Cociente: " . $cociente . "<br>";
    echo "Cociente sin decimales: " . $noDecimals . "<br>";
    echo "Cociente sin decimales * 23: $dniDeci";
    echo "<br>Resto " . $resto ."<br>";

    echo "La letra de $dni es " . $letras[$resto];

    //OPCION 2
    echo "<br><br><strong>OPCION 2</strong><br>probando a buscar el resto:" . $dni % 23 . "<br>";
    // % osea el módulo halla el resto de forma más rápida
    $resto2 = $dni % 23;

    echo "La letra de $dni es " . $letras[$resto2];
}
else {
    echo "Introduzca un num mayor o igual que 10 000 000 y/o menor o igual que 99 999 999";
}
}
    else { // excepción en caso de que el num introducido sea el 0
    echo "Introduzca un num mayor o igual que 10 000 000 y/o menor o igual que 99 999 999";
}


?>
</body>
    
</html>