<?php

/** 
* - Crea objetos y clases sobre algún tema -
* 
* Crea la clase DadoPoker. Las caras de un dado de poker tienen las 
* siguientes figuras: As, K, Q, J, 7 y 8 .
* 
* Crea el método tira() que no hace otra cosa que tirar el dado, 
* es decir, genera un valor aleatorio para el objeto al que se le 
* aplica el método.
* 
* Crea también el método nombreFigura(), que diga cuál es la figura 
* que ha salido en la última tirada del dado en cuestión.
* 
* Crea, por último, el método getTiradasTotales() que debe mostrar 
* el número total de tiradas entre todos los dados.
* Realiza una aplicación que permita tirar un cubilete con cinco 
* dados de poker
* **/

?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<?php 

    // Crea clase Dadopoker con AS K Q J 7 8
    class DadoPoker {
        public $c1 = 'AS';
        public $c2 = 'J';
        public $c3 = 'Q';
        public $c4 = 'K';
        public $c5 = '7';
        public $c6 = '6';
        public $nombreFigura; // Dira qué cara hemos obtenido
        public static $contador = 0; // Contará el número de tiradas que vamos haciendo

        // Crea metodo tira que genera un valor aleatorio
        public function tira() {
            $arrayDado = [$this->c1, $this->c2, $this->c3, $this->c4, $this->c5, $this->c6]; // Metemos todos los lados en un array
            $this->nombreFigura = $arrayDado[rand(0, count($arrayDado) - 1)] . "<br>"; // Pasamos aleatoriamente uno de los lados a la var nombreFigure
            self::$contador++; // Sumamos 1 al contador de tiradas
        }
        // Crea nombreFigura que dice qué figura salió en el dado
        public function ultimaTirada() {
            return $this->nombreFigura; // Muestra qué lado nos ha salido
        }
        
        // Get Tiradas Totales - Obtenemos el número de tiradas totales
        public function getNumTiradas() {
            return self::$contador;
        }

    }
    

    /* Creamos una clase hija donde 'manejaremos el dado' (lo tiraremos 5 veces) */ 
    class manejarDado extends DadoPoker {
        public static $random1 = 0; // Contador de número random de tiradas - que realizaremos en 'variasTiradas()'

        // Tiramos el dado 5 veces Y vemos el resultado
        public function cincoVeces(){
            for ($a = 0; $a < 5; $a++) { // 5 veces
                $this->tira(); // Tiramos 
                echo 'Vamos a tirar cinco veces: ' . $this->ultimaTirada(); // Mostramos tiradas
            }
        }
        
        // Crea getTiradasTotales que cuente el num tota lde tiradas
        public function variasTiradas(){
            $numTiradas = rand(1, 15); // Tiramos el dado x veces (entre 0 y 15 veces)
            for ($a = 0; $a < $numTiradas; $a++) {
                $this->tira();
                echo 'Tiramos el dado! ' . $this->ultimaTirada();
                self::$random1++;
            }
            echo ' Se ha tirado el dado: ' . $numTiradas . ' veces <br>'; // Opcion 1 para contar
        }

        public function getRandomTiradas() {
            return self::$random1; // Opcion 2 para contar
        }
    }

    $dado1 = new DadoPoker();
    $dado1->tira(); // Tiramos el dado una vez
    echo "<p><strong>Tiramos una sola vez</strong></p>";
    echo '<br>Esta es la tirada hecha: ' . $dado1->ultimaTirada(); // Mostramos
    echo '<br>';

    $dadoTirar = new manejarDado();
    echo "<p><strong>Tiramos cinco veces</strong></p>";
    $dadoTirar->cincoVeces(); // Tiramos 5 veces y mostramos
    echo '<br>';
    echo "<p><strong>Tiramos X veces (y las contamos)</strong></p><br>";
    $dadoTirar->variasTiradas(); // Tiramos x veces y mostramos y contamos dichas x
    
    echo "Opción 2: Hemos tirado " . $dadoTirar->getRandomTiradas() . " veces"; // Contamos mediante self::$random1
    // Mostramos cuántas veces hemos tirado el dado en total
    echo "<br><br><p><strong>Contador Total: </strong></p>En total hemos tirado el dado <strong>" . $dadoTirar->getNumTiradas() . "</strong> veces";
    
?>

</body>
</html>