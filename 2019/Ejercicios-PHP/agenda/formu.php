<?php
/** 
 * 
 *         Modo de uso
 *       
 *       Escribir Nombre y Teléfono
 *       Para borrar un nombre escríbalo
 *       Para sustituír vuelva a escribir todo
 *       Si se dejan vacías o sólo se rellena Telf, da error
        
        


AGENDA para Insertar contactos - Nombre y Teléfono

[] - Guardamos las variables de POST en un array
[] - Contamos número de POSTS que tenemos y Advertencia si no se inserta nombre
[] - Pasando Nombre y Teléfonos a arrays diferentes respectivamente

[] - For Loop para Sustitución y Borrado de nombres y teléfonos
[] - Borrado de nombres parte 3 y 4
[] - Else - Evitando que el programa nos de avisos

[] - Creación de <input "hiddens" en cada valor insertado
[] - Creación de las celdas


*/


if (isset($_POST['nombre'])) { // Si hemos introducido un valor en la casilla...

    foreach ($_POST as $k => $v) {
    /** Metemos los valores de lo que hemos escrito // Ejemplo: Pepe, 494 502 495 en un array llamado $postV */
    $postV[] = $v;
}
    
/**  $numGets -
 Variable que cuenta la cantidad de $_POST que tenemos
 Nos interesa que esta cifra aumente de 1 en 1 cada vez que insertemos datos
 Originalmente aumenta de 2 en 2 así que lo multiplicamos por la mitad
 Para que aumente de 1 en 1  */
$numGets = (count($_POST)) * 0.5;  
    
    // Pasamos Nombres y Teléfonos a arrays diferentes
    foreach ($postV as $k => $v) { 

        if ($k % 2 === 0) { // Los pares (nombres) a una variabla
            $postNombres[] = $v;
        }
        else if ($k % 2 != 0) { // los impares (telefonos) a otra variable
            $postTelfs[] = $v;
        }
}

    
// SUSTITUCION del Teléfono
// BORRADO del Nombre y Teléfono [Parte 1/4]

    for ($i = 0; $i < $numGets; $i++){ 
        for ($a = 0; $a < $numGets; $a++){ 

            // SUSTITUIR TELEFONO
            // Si hay un nombre repetido
            // ... y hemos escrito un teléfono en el formulario
            // ... ... y el nombre escrito NO está vacío
            if ($postNombres[$i] === $postNombres[$a] && !empty($postTelfs[$i]) && $postNombres[$i] != ''){
            // Sustituímos el teléfono escrito en el formulario por el almacenado 
                $postTelfs[$a] = $postTelfs[$i];
            }

            // BORRAR NOMBRE Y TELEFONO [Parte 1/4]
            // Si hay un nombre repetido en la lista
            // ... el teléfono enviado en el formulario está vacío
            else if($postNombres[$i] === $postNombres[$a] && $postTelfs[$i] === ''){
                // Sustituímos el teléfono del nombre repetivo por un espacio en blanco
                $postTelfs[$a] = '';
            } 
        }
    }
    
// BORRAR NOMBRE Y TELEFONO [Parte 2/4]
// Si un teléfono es un espacio en blanco, el nombre correspondiente tb será un espacio en blanco
for ($i = 0; $i < $numGets; $i++){ 
    if($postTelfs[$i] === ''){
        $postNombres[$i] = '';
    }
}

//  BORRAR NOMBRE Y TELEFONO [Parte 3/4]
// Todos los nombres repetidos excepto el primero (el que insertemos en el formulario) desaparecen, dejando casillas en blanco
// Así limpiamos los espacios en blanco anteriores)
$postNombres = array_unique($postNombres);                    
}

    // Else que se inicia nada más abramos la aplicación web
    // Declaramos variables para que el programa no de avisos
    else    { 
        $postV = [];
        $postNombres;
        $numGets;
        $nombre;
}
        
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>

    .super-todo {
        background-color: #ffd280;
        text-align: center;
        margin-right: auto;
        margin-left: auto;
        width: 700px;
        height: 300px;
        position: relative;
        border-radius: 0.3rem;
        border: 2px solid black;
                
    }
    .todo {
        /* background-color: red; */
        position: relative;
        width: 600px;
        height: 300px;
        bottom: 12%;
        margin-right: auto;
        margin-left: auto;
        margin-top: 5%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 40px 100px;
        grid-template-areas: 
            "1 2"
            "1 3";
        align-content: center;
        justify-content: space-around;

    }

    /* FORMULARIO */
    .Formu-container {
        
        /*background-color: blue;*/
        grid-area: "1";
        display: grid;
        grid-template-columns: 100px 1fr;
        grid-template-areas:
        "Introduzca" "Texto";
    }

    .Introduzca {
        grid-area: "Introduzca";
    }
    .Introduzca p {
        border: 2px solid black;
        background-color: orange;
        border-radius: 0.3rem;
    }

    .Texto {
        grid-area: "Texto";
    }
    .Texto input {
        position: relative;
        top: 35px;
        margin-bottom: 20px;
    }
    input[type=submit] {
        background-color: #FF7F50 ;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
}

    /* TABLA NOMBRE TELEFONO */
    .tabla {
        border-radius: 0.3rem;
        
    }
    .encabezado {
    
        background-color: yellow;
        border-radius: 0.3rem;
        grid-area: "2";
    }
    .encabezado th {
        border: 2px solid black;
    }

    .cuerpo {
        background-color: orange;
        grid-area: "3";
    }
    .celda {
        
    }

    /* ERROR */
    #adv {
        position: relative;
        top: 60%;
        color: red;
        font-size: 20px;
        z-index: 1;

    } 

    /* MANUAL */
    .manual {
        width: 200px;
        position: relative;
        font-size: 15px;
        display: left;

    }


</style>
</head>
<body>
    <div class='manual'>
        <p>Instrucciones:</p>
            <ul>
                <li><strong>Guardar</strong>: Rellenar ambos campos</li>
                <li><strong>Borrar</strong>: Escribir sólo el nombre de un contacto ya guardado</li>
                <li><strong>Modificar</strong>: Escribir el nombre y el nuevo teléfono del contacto guardado</li>
                <li><strong>Error</strong>: Pulsar Enviar con las casillas vacías o sólo el Teléfono</li>
                

    </div>
    

   <div class=super-todo>
    <div class="todo">
    <div class="formu">

    <?php


    ?>
    
    
    

    <form action="" method="POST">

        <?php 
        echo "<div class='Formu-container'><div class='Introduzca'>
                <p>Introduzca Nombre:</p>
                <p>Introduzca Teléfono:</p></div>"; 
        ?>
        <?php
        echo "<div class='Texto'><input type='text' name='nombre'/><br>
        <input type='text' name='telf'/><br>
        <input type='submit'/></div></div>";
        ?>





</div>        


<?php
        


    
    /** Nuestra estrategia es;

        Introducir Nombre y/o Teléfono > El contador de $_POST crece una unidad > Nos permite crear un <input hidden $_POST que nos permite a su vez introducir una variable... y volvemos al principio 
    */
    
    // Declaramos numGets otra vez para que no de avisos
    $numGets = (count($_POST)) * 0.5;
    $a = 0;
    $b = 1;

    for ($i = 0; $i < $numGets; $i++) { 
        // Crearemos inputs "hidden" cada vez que introduzcamos un valor en el formu
        // Los valores insertados se pasarán de hidden a otro hidden
        
        if ($i === 0) { // Creamos nuestro primer hidden aparte de los demás
                        // Porque tiene un nombre diferente
            
                        // name = person0 value = $POST 'nombre'
            echo "<input type='hidden'" . 
                "name='person$i'".
                "value='" . $_POST['nombre'] . "' />";
            
            echo "<input type='hidden'" . 
                "name='telf$i'".
                "value='" . $_POST['telf'] . "' />";
        }

        else { // Seguiremos creando hidden con la misma sucesión
                // name = person1 value = $POST 'person0'
                // name = person2 value = $POST 'person1'....
            
            $persone = "person$a";     
            echo "<input type='hidden'" . 
            "name='person$b'".
            "value='" . $_POST[$persone] . "' />";
            
            $telfe = "telf$a";     
            echo "<input type='hidden'" . 
            "name='telf$b'".
            "value='" . $_POST[$telfe] . "' />";
            
            $a++;
            $b++;              
        }
    }




?>
</form>
<?php
    

echo "<table class='tabla'>";
echo "<tr class='encabezado'>
        <th >Nombre</th>
        <th>Telefono</th>
      <tr>";

    
// Imprimimos las celdas

    for ($i = 0; $i < $numGets; $i++){
        
        // BORRAR NOMBRE Y TELEFONO [Parte 4/4]
        
        // Si el nombre no está vacío ni tiene espacio en blanco ni el teléfono tiene un espacio en blanco... imprimimos celdas
        // Realmente nunca llegamos a "borrar" ni "sustituír" nombres ni teléfonos 
        
       if (!empty($postNombres[$i]) && $postNombres[$i] != '' && $postTelfs[$i] != ''){
         echo "<tr class='cuerpo' ><td class='celda'>$postNombres[$i]</td><td class='celda'>$postTelfs[$i]</td></tr>";
    }
}  

echo "</table>";

// Si no introducimos un Nombre, creamos una advertencia.
if (isset($_POST['nombre'])) {
  if ($_POST['nombre'] === '' || $_POST['nombre'] === null || empty($_POST['nombre'])) {
      echo "<div id='adv'>
      <p>Error: <strong>Datos no introducidos.</strong></p></div>";
  }   
}
        
        ?>
    
    
</div></div>



<?php
    
/** BORRADOR Ejemplo conceptual simple usando poco PHP - Guarda 5 (+1) Parámetros diferentes.

    <input type="hidden" name="personas" value="<?php echo  $_POST['nombre']; ?>" />
    <input type="hidden" name="personas1" value="<?php echo $_POST['personas']; ?>" />
    <input type="hidden" name="personas2" value="<?php echo $_POST['personas1']; ?>" />
    <input type="hidden" name="personas3" value="<?php echo $_POST['personas2']; ?>" />
    <input type="hidden" name="personas4" value="<?php echo $_POST['personas3']; ?>" />
    */

?>
</body>
</html>