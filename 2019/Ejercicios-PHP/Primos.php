<?php
session_start();
//Implemente un algoritmo que solicite un número N e visualice a suma de todos os números primos menores ou iguais que N.

if (!isset($_POST['num'])){
    $nem;
    $_POST['num'] = '';   
    $suma;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 008 - Primos</title>  
</head>
<body>
    <p>Saber num primos por debajo de: <?php if(isset($_POST['num'])) echo $_POST['num'] ?></p>
    <form action="" method="POST">
        <input type='number' name='num'/>
        <input type='submit'/>
    </form>
<?php
$suma = 0;
$nem = $_POST['num']; // En lugar de $num podríamos usar $_SESSION[] 
        
   for ($i = 2; $i <= $nem; $i++) { // Evitamos 1 y 2 pues no son primos
       $c = 0; // Contador a cero en cada itinerancia
       for ($a = 1; $a <= $i; $a++) { // Todos los num debajo del num que estamos a probar
           $z = $i / $a; // Dividimos nuestro num por todos los números de debajo
           
           if ($z === 1 || $z === $i) { // Si el resultado es 1 o su numero propio, sumamos uno (todos los numeros tendrán esto, pero lo pongo igual para entender el concepto de primo y cómo funciona el programa)
                $c++;
           }
           
           else if (is_float($z)) { // Si, de nuestras divisiones obtenemos un resultado con decimales, sumamos uno
            /** Esto es porque todas las divisiones de los números primos dará 1, su propio número o un número con decimales, en cambio un número no-primo podrá dividirse y de resultado dar un número sin decimales 
            i.e. 6 puede dar 6, 1 y también 3 y 2 mientras que 13 dará 13, 1 y el resto serán sólo números con decimales */
                $c++;
           }      
        }
       if ($c === $i){ // Si un num es primo $c equivaldrá a él (todas sus divisiones dará: 1, su propio numero y numeros con decimales(float))
           echo "$i es primo <br>";
           $suma += $i; // Sumamos dicho primo en una variable donde se sumarán el resto de primos
       }
   }
        
    if(isset($_POST['num']) && !empty($suma)){
        echo "<br><b>La suma de los números primos anteriores es </b>$suma";
    }
       
session_destroy();
session_unset();
        
/* Explicación del número primo y $c -
    Un número primo 13, al ser dividido entre números más pequeños que él (12, 11, 10, 9, 8...)
    dará:
    [num por el que dividimos] resultado
    
    [13] 1
    [12] número con decimales
    [11] número con decimales
    [10] número con decimales
    [9]  número con decimales
    [8]  número con decimales
    [7]  número con decimales
    [6]  número con decimales
    [5]  número con decimales
    [4]  número con decimales
    [3]  número con decimales
    [2]  número con decimales
    [1]  13
    
    mientras que un número no-primo dará números SIN decimales(entero) como resultado, i.e. 8

    [8] 1
    [7] número con decimales
    [6] número con decimales
    [5] número con decimales
    [4] número entero
    [3] número con decimales 
    [2] número entero 
    [1] 5
    
    En definitiva sabiendo que dividiendo números primos sólo da números con decimales (aparte de la división por si mismos y por uno, pero ésta es común a cualquier otro tipo de número) a diferencia de los enteros que sí pueden obtener un resultado sin decimales, identificaremos los primos mediante el programa. */
    ?>
    

</body>
    
</html>