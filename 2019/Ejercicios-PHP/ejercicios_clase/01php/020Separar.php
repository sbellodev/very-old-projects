<?php
/**
Cadeas 2
Divida a cadea separando por dous puntos (o que puidera ser un formato hh:mm_ss)
Exemplo de entrada : '092402' --> 	Exemplo de saída : 09:24:02
*/

$number = 438923;

echo "Divida la cadena $number separando por dos puntos (ex: 190239 -> 19:02:39) <br>"; 

$newnumber = // Obtenemos los dos primeros números de 
                // La primera parte del num (43)
                // El primer tercio (89)
                // El segundo tercio (34)
            // Y ponemos un espacio entre las tres partes
/* Formula:         
    Substraer del nuestro número: // substr($number...
        Desde la posición 'El primer tercio de todo el numero
        Un tercio de numeros de toda la longitud
    */
    substr($number, (strlen($number)*0.01), (strlen($number)/3)) . " " .
    substr($number, (strlen($number)*0.34), (strlen($number)/3)) . " " . 
    substr($number, (strlen($number)*0.67), ceil(strlen($number)/3)) . "<br>";

echo "Primero dividimos el número en tres partes intercaladas con un espacio: $newnumber " . "<br>";

// Reemplazamos los espacios por dos puntos ":"
echo "Reemplazamos los espacios por ':' <br>" . preg_replace("/ /",":", $newnumber);

?>