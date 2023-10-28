<?php 
/* Una tabla muy grande...*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <style>
        table {
            border: 1px solid black;
            align-self: center;
            
            margin-bottom: 20px;
            
        }
        
        #data { 
            text-align: left;
            width: 200px;
        }
        
        td, th {
            text-align: center;
            border: 1px solid black;
            padding: 5px;
            width: 100px;     
        }

   

    </style>
</head>
<body>


<?php
/**
/ Orden de código según líneas:
/   [43 - 76] - Variables de encabezado, alumnos y sus claves.
/   [79 - 160] - Función de Tabla principal y Opcional. Creación tabla.
/   [160 - 225] - Función Orden Alfabético, Mayor nota de cada asignatura y Mayor media
/   [225] - Echo de dichas funciones
/   
*/

$encabezado = ['cod_alumno', 'Datos Persoais', 'Lingua', 'Mates'];

$al01 = array('ID' => 'A01', 
        'Datos' => array(
            'Nome' => 'Daniel',
            'Apelidos' => 'Rabinovich', 
            'Idade' => '17'), 
        'Materias' => array(
            'Lingua' => 8, 
            'Mates' => 9));


$al02 = array('ID' => 'A02', 
        'Datos' => array(
            'Nome' => 'Marcos',
            'Apelidos'=>'Mundstock', 
            'Idade'=>'18'), 
        'Materias' => array(
            'Lingua'=> 9, 
            'Mates'=> 7));


$al03 = array('ID' => 'A03', 
        'Datos' => array(
            'Nome' => 'Carlos',
            'Apelidos' => 'Loper Puccio', 
            'Idade' => '16'), 
        'Materias' => array(
            'Lingua' => 6, 
            'Mates' => 10));

$alKey = array_keys($al01); // Creamos un Array con [ID, Datos, Asignatura]
$datos = array_keys($al01[$alKey[1]]); // Creamos Array con [Nombre, Apelidos, Idade]
$materias = array_keys($al01[$alKey[2]]); // Creamos Array con [Lingua, Mates]

    
// FUNCION GENERADOR DE NOTAS     
function alGenerator($notas) {
    // Obtenemos las claves(Nome, Apelido, Idade) y los valores(Carlos etc) de cada alumno insertado en el parámetro de la función
    $notasDatosKey = array_keys($notas['Datos']);
    $notasDatosValues = array_values($notas['Datos']);
    // También los valores de $notas [ID, Nombre, Apellidos] por comodidad
    $notasValues = array_values($notas);
    
    echo "<tr><td rowspan='3'>"; // Linea ID: A01
    echo key($notas) . ": " .  $notasValues[0] . "<br> </td>";
    
    // Linea Nombre: Daniel
    echo "<td id='data'>" . $notasDatosKey[0] . ": " . $notasDatosValues[0] . "</td>";
    
    // Linea '8' y '9'
    foreach ($notas['Materias'] as $Ae => $keyo) {
            echo "<td rowspan='3'>";
    echo "  " . $keyo . "<br>"; 
            echo "</td>";
        }
    // Lineas de Apellidos: etc e Idade: etc
    echo "<tr><td id='data'>" . $notasDatosKey[1] . ": " . $notasDatosValues[1] . "</td></tr>";
    echo "<tr><td id='data'>" . $notasDatosKey[2] . ": " . $notasDatosValues[2] . "</td></tr>";
};
    
// TABLA ALTERNATIVA
//
function alGenerator2($notas) {
    $notasValues = array_values($notas);
    echo "<tr><td>";
    echo key($notas) . ": " . $notasValues[0] . "<br></td>"; 
    
    echo "<td id='data'>"; // Mostramos los 3 Datos separados con br
        foreach ($notas['Datos'] as $key => $valor) {
            echo "$key: $valor<br>";
        }
    echo "</td>";
        // Mostramos la clave de ambas materias ('8' y '9'))
        foreach ($notas['Materias'] as $key) {
                echo "<td>";
                echo "  " . $key . "<br>"; 
                echo "</td>";
            }        
}
// Creación de la tabla principal    
echo "<table id='test' border='1' align='center'>";
    
// LLamamos encabezado con foreach
echo "<tr>";
    foreach ($encabezado as $cabeza) {
        echo "<th>
                $cabeza </th>";
    }
echo "</tr>";
// Insertamos la función una vez por cada alumno
alGenerator($al01);
alGenerator($al02);
alGenerator($al03);
    
    
echo "</table>";

// Creación de la tabla alternativa
echo "<table id='test' border='1' align='center'>";
    echo "<tr>";
        foreach ($encabezado as $cabeza) {
            echo "<th> $cabeza </th>";
    }
    echo "</tr>";
    
    
alGenerator2($al01);
alGenerator2($al02);
alGenerator2($al03);


    
echo "</table>";    


// FUNCIONES 

// ORDEN ALFABETICO 
function Alphanum($alum1, $alum2, $alum3) {
    // En una Variable insertamos el nombre y apellidos de 3 alumnos
    $alumName = $alum1['Datos']['Nome'] . " " . 
                $alum1['Datos']['Apelidos'] . ", " . 
                $alum2['Datos']['Nome'] . " " . 
                $alum2['Datos']['Apelidos'] . ", " . 
                $alum3['Datos']['Nome'] . " " . 
                $alum3['Datos']['Apelidos'];   
    // Convertimos y separamos estos 3 alumnos en un array
    $exploded = explode(", ", $alumName);
    sort($exploded); // Reordenamos el array alfabéticamente
    $imploded = implode(", ", $exploded); // Lo convertimos en un string
    return $imploded . "."; // Mostramos String
    
}

// ORDEN NOTA
function notAltaLingua($alum1, $alum2, $alum3, $asignat) {
    // En una variable insertamos las 3 notas de x asignatura de 3 alumnos
    $alumNotas =  
            $alum1['Materias'][$asignat] . ", " . 
            $alum2['Materias'][$asignat] . ", " . 
            $alum3['Materias'][$asignat];  
    $exploded = explode(", ", $alumNotas); // Convertimos en array
    rsort($exploded); // Ordenamos con r porque los números van a la inversa      
    
    $listaAl = [$alum1, $alum2, $alum3]; // Array simple para acceder a nuestros alumnos
  

    for ($i = 0; $i < 3; $i++){
    // Si la nota más alta (exploded[0] al ser la primera) equivale a
    // la nota de uno de los tres alumnos...
    if ($exploded[0] == $listaAl[$i]['Materias'][$asignat]) {
        // Devolvemos el texto 'x asignatura é x nota obtenida por x nombre y x apellidos"
        return $asignat . " é " . $listaAl[$i]['Materias'][$asignat] . " obtida por " . $listaAl[$i]['Datos']['Nome'] . " " . $listaAl[$i]['Datos']['Apelidos'] . "<br>";
        }
    }
}
    
// FUNCION DE LA MEDIA DE SUS NOTAS   
function notaMedia($alum1, $alum2, $alum3, $mat1, $mat2) {
    // media alumno = ambas notas / 2
    $a1media = ($alum1['Materias'][$mat1] + $alum1['Materias'][$mat2]) / 2;
    $a2media = ($alum2['Materias'][$mat1] + $alum2['Materias'][$mat2]) / 2;
    $a3media = ($alum3['Materias'][$mat1] + $alum3['Materias'][$mat2]) / 2;
    
    $amedia = [$a1media, $a2media, $a3media];
    $amediaNotSorted = [$a1media, $a2media, $a3media]; // Misma variable que antes
    rsort($amedia); 
    
    $listaAl = [$alum1, $alum2, $alum3];
  
    for ($i = 0; $i < 3; $i++){
    // Si desde las medias sin ordenar, una coincide con la primera($amedia[0])
    if ($amediaNotSorted[$i] === $amedia[0]) {
        
        return  $listaAl[$i]['Datos']['Nome'] . " " . 
                $listaAl[$i]['Datos']['Apelidos'] . "coa nota media de " . 
                $amedia[0];
        }
    }
}
    
    
echo "El orden alfabético de los alumnos es: " . 
        Alphanum($al01, $al02, $al03) . "<br>";
    
echo "A nota máis alta do grupo en " .
        notAltaLingua($al01, $al02, $al03, $materias[0], $datos);
    
echo "A nota máis alta do grupo en " . 
        notAltaLingua($al01, $al02, $al03, $materias[1], $datos);
    
echo "O alumno coa media máis alta do grupo é " . 
        notaMedia($al01, $al02, $al03, $materias[0], $materias[1] );



?>

</body>
</html>