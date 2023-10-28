<?php 

// Los dos primeros números de la serie es 0 y 1, los asignamos a "a" y "b" respectivamente
$a = 0;
$b = 1;
$n = 10;

// Si el número introducido es "0" o menor imprimimos un mensaje de error.
if ($n <= 0){
    echo "Escoja 1 o más.";
}
// Si no... ejecutamos el código siguiente
else {
// Imprimiremos $n números por cada repetición 
// Restamos -1 a $n para compensar que empezamos desde 0. Alternativamente podríamos empezar desde 1 y no restarle la unidad a $n
    for ($i = 0; $i <= $n-1; $i++) {
        
        // Creamos una variable $z que será la suma de a y b osea, el tercer número de la serie Fibo
        $z = $a + $b;

        // Si el número escogido es 1 o mayor imprimimos $a (el primer número de la serie)
        if ($n >= 1){
            echo $a . "<br>";
        }
        // Si el número escogido es 2 o mayor imprimimos $b (el segundo número de la serie)
        else if ($n >= 2) {   
            echo $b . "<br>";
        }
        // Si el número escogido es 3 o mayor imprimimos $z (el tercer número de la serie)
        else if ($n >= 3) {
            echo $z . "<br>";
        }
        // Se asigna a $a el valor de $b y a $b el valor de $z
        // De esta manera el "primer número" se convierte en el segundo y el segundo en el tercero
        $a = $b;
        $b = $z;
        // Cuando volvamos a la siguiente repetición de este for loop, al pasar por la línea 19 
        // z (tercer numero) se convertirá en el cuarto (la suma del segundo y el tercero)
        // a -> b
        // b -> z
        // z -> suma de a y b
    }
}


?>