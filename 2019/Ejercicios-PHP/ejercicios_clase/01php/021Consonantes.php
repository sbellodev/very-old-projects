<?php

// Dado un texto, modificarlo con los comandos dados en clase sobre strings
/** En este ejercicio inventado quitaremos la primera consonante de cada palabra
 *  SI empieza con ella. Quitaremos también la segunda consonante si existe y se cumple la anterior
 *  regla
 */
$texto = "El perro doméstico proviene de un ancestro o grupo ancestral común que data de hace aproximadamente 30 000 años y desde entonces se ha extendido a todas partes del mundo. Los primeros restos fósiles de perros enterrados junto con humanos fueron encontrados en Israel y datan de hace unos 12 000 años. Desde entonces, los perros y los humanos han evolucionado conjuntamente. Los perros comparten el entorno, los hábitos y el estilo de vida humanos, como las dietas ricas en cereales y almidón. La alimentación inadecuada, así como el uso de antibióticos, son la causa del desarrollo de muchas enfermedades inflamatorias e inmunológicas. Unas cuatrocientas enfermedades del perro tienen una equivalente humana, destacando especialmente la enfermedad de Alzheimer y otros trastornos neurológicos, así como cánceres, enfermedades autoinmunes y enfermedades cardiovasculares.";

echo $texto . "<br>"; 

// Cambiamos perro por gato en toda la oración
$textogato = str_replace("perro", "gato", $texto);
$textoarray = explode(" ", $textogato); // Convertimos la oración en un array 

$vocalesstring = "aeiouAEIOU"; // Variable con todas las vocales

// Nuestro objetivo es quitar la primera y segunda consonante de cada palabra
// (Si tienen, si no quitar sólo la primera, y si no tiene tampoco, no quitamos nada)

for ($i = 0; $i < sizeof($textoarray) ; $i++) {
    // Obtenemos el primer y segundo elemento de cada palabra
    $var = substr($textoarray[$i], 0, 1);
    $var2 = substr($textoarray[$i], 1, 1);

    if (!empty($var2)) {
        // Si $var 2 no está vacío (es una palabra con más de una letra)
            // Y $var1 (la primera letra de la palabra) no equivale a una vocal...
        if (strpos($vocalesstring, $var) === false) {      
                //... y si la segunda letra de la palabra no equivale a una vocal...
            if (strpos($vocalesstring, $var2) === false) {
                $textoarray[$i][0] = "&"; // Sustituimos dicha consonante con &
                $textoarray[$i][1] = "&"; // La segunda consonante también
                
                }
            else {
                $textoarray[$i][0] = "&"; //... si no sustituímos la primera
                  
                }
            }
        }
    };

$reTexto = implode(" ", $textoarray); // Reconvertimos el texto de Array a String
$reReTexto = preg_replace('/&/', "", $reTexto); // Reemplazamos las & por nada

echo "<br>" . $reReTexto; // Ahora el texto suena un poco más cómico...

// NOTA[!] - No supe cómo convertirel texto para que procesase las palabras con tilde

?>