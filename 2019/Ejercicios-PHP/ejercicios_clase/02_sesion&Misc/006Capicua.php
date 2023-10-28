<?php
// Implemente un algoritmo que solicite un número e nos diga si é capicúa.
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 006 - Capicúa</title>  
</head>
<body>
    <p>Inserte un número para saber se é ou non capicúa:</p>
    <form action="" method="POST">
        <input type='text' name='num'/>
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
    
    
if (isset($_POST['num'])){ // Comprobamos que hemos hecho un input para que no de error
    $_SESSION['num'] = $_POST['num'];
    echo "<br>El numero: ".$_SESSION['num'] . checkCapicua($_SESSION['num']);
}
else {
    
}
    

session_destroy();
session_unset();
?>
    

</body>
    
</html>