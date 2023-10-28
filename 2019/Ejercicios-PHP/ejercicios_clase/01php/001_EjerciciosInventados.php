<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<style> 
    .body {
    font-family: Arial, Helvetica, sans-serif;
    }
    </style>
<body>

<?php

/** EJERCICIO 8:
En un multiarray, consigue la clave y el valor de cada array y muéstralo por separado
*/

echo "<br><strong>EJERCICIO 8: </strong></br>";
$arr = [   
        "Nombre_Completo" => 
            ["Pablo", "Suarez", "Benitez"],
        "Colores_Favoritos" => 
            ["Azul", "Rojo", "Verde"],
        "Animales_Favoritos" => 
            ["Perro", "Gato", "Mosca"],
        "Lenguas_Conocidas" => 
            ["Espaniol", "Japones", "Gallego"]
    ];


// Obtenemos las claves (Nombre_Completo, Colores..., Animales... Lenguas...)
$arrKeys = array_keys($arr); 

echo "<strong>ArrKeys:</strong> <br>";
foreach($arrKeys as $a) {
    echo "$a, ";
}

// Gracias a las claves, obtenemos los valores
// Pablo, Suarez y Benitez -- Azul, Rojo Verde....
$arrValuesNombre = array_values($arr[$arrKeys[0]]);
$arrValuesColores = array_values($arr[$arrKeys[1]]);
$arrValuesAnimales = array_values($arr[$arrKeys[2]]);
$arrValuesLenguas = array_values($arr[$arrKeys[3]]);

echo "<br><br><strong> ArrValues 0 (Nombre)</strong>:  <br>";
foreach($arrValuesNombre as $a) {
    echo "$a, ";
}

echo "<br><br><strong> ArrValues 1 (Colores)</strong>:  <br>";
foreach($arrValuesColores as $a) {
    echo "$a, ";
}

echo "<br><br><strong> ArrValues 2 (Animales)</strong>:  <br>";
foreach($arrValuesAnimales as $a) {
    echo "$a, ";
}

echo "<br><br><strong> ArrValues 3 (Lenguas)</strong>:  <br>";
foreach($arrValuesLenguas as $a) {
    echo "$a, ";
}




/** EJERCICIO 9:
Hundir la flota - inserta valores (numeros)en una matriz (nuestro barco)
Sustituye cada elemento de forma aleatoria por la palabra HUNDIDO.
Contar cuántas veces has necesitado "disparar"(sustituír cada elemento) para sustituír todo el array.
Ejemplo:
Tenemos el array(2, 2, 2, 2, 2, 2, 2, 2, )
Lo sustituímos por array(hundido, hundido, hundido, hundido, hundido, hundido, hundido, hundido)
Contamos cuántas veces hemos usado array_rand para sustituír todos los números del array

*/

// Creamos nuestro barco y le insertamos números (Unos)
$barco = [];
for ($i = 0; $i < 10; $i++){
array_push($barco, 1);
}

echo "<br><br><br> <strong>EJERCICIO 9: </strong><br> Nuestro barco de números será: ";
foreach ($barco as $b ) {
    echo "$b, ";
}

  
$count = 0; // Contador a 0
do {
    $i = rand(0, 9); // recorreremos aleatoriamente todo el array
    $barco[$i] = 'hundido'; // sustituímos el elemento escogido(aleatoriamente) 
    $count++; // subimos el contador a 1.... repetimos nuestro DO LOOP
}
while (in_array(1, $barco) === true); // mientras existan Unos en nuestro array
    
    echo "<br> test:  </br>";
foreach ($barco as $b ) {
    echo "$b, ";
}
echo "<br> El contador de veces que se ha necesitado reemplazar 'hundido' es: $count";
           

/** EJERCICIO 10
Dado un array desordenado de palabras y otros 3 arrays de referencia, ordenarlo en orden de: Animales, Coches, Asignaturas.

Por ejemplo
$muestra = [Caballo, BMW, Servidores, Cliente, Ferrari, Gato, Perro, Interfaz, Peugeot];
$animales = [Caballo, Gato, Perro];
$coches = [BMW, Ferrari, Peugeot];
$asignaturas = [Servidores, Cliente, Interfaz];

Queremos como resultado el array de $muestra pero ordenado por orden de Animales, Coches y Asignaturas
*/

$muestra = ['Caballo', 'BMW', 'Servidores', 'Cliente', 'Ferrari', 'Gato', 'Perro', 'Interfaz', 'Peugeot'];
$animales = ['Caballo', 'Gato', 'Perro'];
$coches = ['BMW', 'Ferrari', 'Peugeot'];
$asignaturas = ['Servidores', 'Cliente', 'Interfaz'];


$cubo = []; // Aqui Recogeremos dónde se localiza cada Animal, Coche y Asignatura

        for ($a = 0; $a < sizeof($animales); $a++){
        $cubo[] = array_search($animales[$a], $muestra) ;
        }


        for ($a = 0; $a < 3; $a++){
        $cubo[] = array_search($coches[$a], $muestra) ;
        }

            
        for ($a = 0; $a < 3; $a++){
        $cubo[] = array_search($asignaturas[$a], $muestra); ;
        }
    

echo "<br><br><strong>EJERCICIO 10</strong>";
echo "<br>Actualmente tenemos el array : ";
foreach ($muestra as $b) {
    echo "$b, ";
}

echo "<br><br> Separadas de 3 en 3 tenemos dónde están localizados los 3 Animales, Coche y Asignaturas en  \$cubo <br>";
foreach ($cubo as $b ) {
    echo "$b, ";
}


$newMuestra = []; // Nuevo array donde colocaremos, ordenadamente, cada elemento de Muestra

for ($a = 0; $a < sizeof($muestra) ; $a++){
$newMuestra[] = $muestra[$cubo[$a]];
}
   echo "<br><br><strong>RESULTADO!</strong> \$muestra <br><br>";
foreach ($newMuestra as $b ) {
    echo "$b, ";
}
    
// OPTION 2
// Podemos usar array_merge para juntar los 3 arrays
echo "<br><br> OPCION 2 - MERGE <br>";
print_r(array_merge($animales, $coches, $asignaturas));


        
        
?>
    
</body>
</html>