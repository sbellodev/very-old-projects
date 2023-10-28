<?php
// test commit
/** Crea objetos y clases sobre algún tema **/

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        .table2, th, td {
            border: 1px solid black;
            padding: 5px;
            
        }
    </style>
</head>
<body>
    
<?php 

    /**  Creando la CLASE principal 
     *   Haremos un enemigo 'troll' para un videojuego 
     */
    class Troll {
        protected $nombre = 'Troll';
        protected $altura = '100px';
        protected $color = 'green';
        protected $grito = 'ARLGLWL!';
    
        /** Función que nos imprimirá los 4 valores
         *  La reutilizaremos en el siguiente troll
         */
        function cantarValores() {
            echo "Este troll tiene de nombre $this->nombre, altura $this->altura, 
            color $this->color y su grito es $this->grito <br>";
        }

    }

    class TrollPantano extends Troll {

        public function __construct($nom, $alt, $col) {
            $this->nombre=$nom;
            $this->altura=$alt;
            $this->color=$col;
        }
 
        function cantarValores2() {
            echo "Este troll tiene de nombre $this->nombre, altura $this->altura, 
            color $this->color y su grito es $this->grito <br>";
        }

        /** Setter y Getters de TrollPantano
        *   Aquí podemos cambiar una de las 4 características del troll con SET
        *   y comprobar el valor de cada una con GET
        */

        public function getNombre() {
            return $this -> nombre;
        }
        public function setNombre($nom) {
            $this -> nombre = $nom;
        }

        public function getAltura() {
            return $this -> altura;
        }
        public function setAltura($alt) {
            $this -> altura = $alt;
        }

        public function getColor() {
            return $this -> color;
        }
        public function setColor($col) {
            $this -> color = $col;
        }

        public function getGrito() {
            return $this -> grito;
        }
        public function setGrito($gri) {
            $this -> grito = $gri;
        }

        public function printTroll() {


            /* Ojos y Boca */
            echo "<div style='position:relative;
                                width: 20px;
                                height: 20px;
                                background-color: black;
                                left: 70px;
                                top: 90px;
                                z-index: 10;'></div>";

            echo "<div style='position:relative;
                                width: 20px;
                                height: 20px;
                                background-color: black;
                                left: 120px;
                                top: 80px;
                                z-index: 10;'></div>";

            echo "<div style='position:relative;
                                width: 30px;
                                height: 10px;
                                background-color: black;
                                left: 90px;
                                top: 130px;
                                z-index: 10;'></div>";

            /* Cabeza y Cuerpo */
            echo "<div style='position:relative;
                                width: 100px;
                                height: 100px;
                                background-color: $this->color;
                                left: 50px;'></div>";

            echo "<div style='position: relative;
                                width: 200px;
                                height: 200px;
                                background-color: $this->color;'></div>";

            
        }
    } 

    // Creamos un Troll
    $n1 = new Troll;
    $n1->cantarValores();
    // Creamos un Troll del Pantano con 3 parámetros. Se cambiamos el grito con un SETTER
    $n2 = new TrollPantano('Troll del pantano', '299px', 'Green');
    $n2->setGrito('YEAAAAAA');
    $n2->cantarValores2();
    echo $n2->getColor();
    $n2->printTroll();

    $n3 = new TrollPantano('Troll del pantano2', '100px', 'Blue');
    $n3->setGrito('OLAAAA');
    $n3->cantarValores2();
    $n3->printTroll();

    
    $n4 = new TrollPantano('Troll del pantano3', '10000px', 'Red');
    $n4->setGrito('Buenas.');
    $n4->cantarValores2();
    $n4->printTroll();

?>

</body>
</html>