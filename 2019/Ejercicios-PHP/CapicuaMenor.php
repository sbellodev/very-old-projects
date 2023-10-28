<?php
session_start();
/**
Implemente un algoritmo que solicite un número N e nos visualice a suma de todos os números capicúa menores que N
*/

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 007 - Capicúa</title>  
</head>
<body>
    <p>Inserte un número capicúa para saber a suma dos números anteriores capicúas:</p>
    <form action="" method="POST">
        <input type='number' name='num'/>
        <input type='submit'/>
    </form>
<?php

    
function checkCapicua($nom) {
    $nom = (string)$nom; //Convertimos en string todo num. insertado para manejar cada cifra por separado
    $length = strlen($nom); // Cantidad de cifras del num, contando desde 1
    $len = strlen($nom) - 1; // Lo mismo contando desde 0
    $a = [];
    
    
    if ($length < 2 || $_POST['num'] < 0){ // devolvemos error si se introduce...
            return " es incorrecto. Introduzca un número más de dos cifras o mayor que cero.";
        }
    
    else {
        if ($length % 2 === 0) { // Si la cantidad del num es par 
            for ($i = 0; $i < $length*0.5; $i++) { //Por cada(mitad) de cantidad de cifras
                //Por ejemplo si un num tiene 6 cifras queremos compararlo 3 veces
                // (Primero con ultimo, segundo con penultimo...)
                
                // si el [$i] primero y el ultimo coinciden...
                // si segundo y penultimo coinciden( si existen...)
                if (strcmp($nom[$i],$nom[$len]) != 0) { 
                    $a[] = 1; // Almacenamos un 1 en un array
                }

                $len--; // En cada repetición disminuímos la clave del último elemento, así comparamos el primer elemento con el ultimo, segundo con penultimo, tercero con antepenúltimo...
            }       
        }
        if ($length % 2 != 0) { // si la cantidad de num es IMPAR
            for ($i = 0; $i < $length*0.5-0.5; $i++) { // Buscamos comparar como hicimos anteriormente pero el -0.5 servirá para comparar todos los números menos el impar "del medio", para que éste no produzca ningún error
                
                if (strcmp($nom[$i],$nom[$len]) != 0) { 
                    $a[] = 1;
                }
                else {
                }
                $len--;
            }
        }
        if (in_array(1, $a) === true) { // Si acabamos con un 1 en nuestro array, no es capicua
             return " NO es capicua";
        }
        else { // Si estamos limpios de 1 (todas las comparaciones han dado TRUE), es capicua
            return " ES capicua";
        }
    }
}
    
    
if (isset($_POST['num']) && !empty($_POST['num']) && $_POST['num'] != '' && $_POST['num'] != null){ // Comprobamos que hemos hecho un input para que no de error
    $_SESSION['num'] = $_POST['num'];
    echo "<br><strong>El numero: ".$_SESSION['num'] . checkCapicua($_SESSION['num']) ."</strong><br>";
}
else { // De dejar vacío el formulario no imprimiremos nada
    
}

$suma = 0;
// Ahora hallaremos las capicúas menores que la introducida y las sumaremos
if (isset($_SESSION['num']) && $_POST['num']){
    for ($i = 0; $i < $_SESSION['num']; $i++) {
        if (checkCapicua($_SESSION['num']) === ' ES capicua') { // Si hemos introducido una capicúa      
            if (checkCapicua($i) === ' ES capicua') {
            // Si, desde 0 hasta el num introducido hallamos una capicua
            // La mostramos y la sumamos a la variable $suma
                echo '<br> El num '.$i.' es capicua';
                $suma += $i;
            }
            else {
                // NO es capicua
            }     
        }
    } // Imprimimos el restultado
    if ((checkCapicua($_SESSION['num']) === ' ES capicua') && $_POST['num'] > 0){
        echo "<br><br><strong>La suma de los anteriores números es:</strong>" . $suma;
    }
    if ((checkCapicua($_SESSION['num']) != ' ES capicua') && $_POST['num'] > 9){
        echo "<br><br<strong>Introduzca un número capicúa por favor</strong>";
    }
}



        
?>
</body>
</html>