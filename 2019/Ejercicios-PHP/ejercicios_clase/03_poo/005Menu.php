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
/**
Confeccionar una clase Menu. Permitir añadir la cantidad de opciones que necesitemos. Mostrar el menú en forma horizontal o vertical (según que método llamemos
**/

    class Menu {
        private $opcion = []; // producto a añadir
        private $direccion; // h horizontal o v vertical

        function __construct() {
        
        }

        

        function cargarOpcion($opcion) {
            $this->opcion[] = $opcion;
        }
        function cargarDireccion($direccion) {
            $this->direccion = $direccion;
        }

        function posicion() {
            if ($this->direccion === 'h') {
                // Cargar direccion horizontal

                echo '<table id="table2" ><tr>';
                    for ($i = 0; $i < count($this->opcion); $i++){
                        echo '<td>'.$this->opcion[$i].'</td>';
                    }
                echo '</tr></table>';
            }
            
            else if ($this->direccion === 'v') {
                // Cargar direccion vertical
                echo '<table id="table3">';
                    for ($i = 0; $i < count($this->opcion); $i++){
                        echo '<tr><td>'.$this->opcion[$i].'</td></tr>';
                    }
                echo '</table>';
            }
            else {
                echo 'Error. Debe escoger "h" (horizontal) o "v" (vertical)';
            }
        }
    }

    // Menu horizontal
    $e1 = new Menu;
    $e1->cargarOpcion('Patatas');
    $e1->cargarOpcion('Berberechos');
    $e1->cargarOpcion('Verduras');
    $e1->cargarOpcion('Kiwi');
    $e1->cargarDireccion('h');

    $e1->posicion();

    echo "<br>";

    // Menu vertical
    $e2 = new Menu;
    $e2->cargarOpcion('Calamares');
    $e2->cargarOpcion('Pescaíto');
    $e2->cargarOpcion('Arroz');
    $e2->cargarOpcion('Bayas');
    $e2->cargarDireccion('v');

    $e2->posicion();
    
    unset($e2);



?>
</body>
</html>