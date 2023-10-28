<?php
// https://www.figma.com/file/0vaS8KnENMueMCO1AO01hGHu/Untitled?node-id=0%3A1

include 'conection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' href='mystylei.css'>
	<style>
    #btn-index2 {
        background-color: #FFA500;
    }
</style>
</head>
<body>
    <h3> SELECT AND DELETE - Artigo</h3>
    <div id = 'all-index'>
        <input id='btn-index1' type="button" onclick="location.href='index.html';" value="INDEX"/>
        <input id='btn-index2' type="button" onclick="location.href='UnoSELECT.php';" value="SELECT AND DELETE"/>
        <input id='btn-index3' type="button" onclick="location.href='UnoINSERT.php';" value="INSERT"/>
        <input id='btn-index4' type="button" onclick="location.href='UnoMODIFY.php';" value="MODIFY"/>
        <input id='btn-index5' type="button" onclick="location.href='UnoOPTION.php';" value="OPTION"/>
    </div> 
    
<div></div>
    
<?php
    
    /******************* Comprobación de uso de botones *******************************/
    
    
        // isset comprueba si hemos pulsado los botones (los cuales están abajo de este .php)
        // Botones de Borrado: Cuando pulsamos uno borramos la fila cuyo id coincida con el número del botón
        if (isset($_POST['DEL'])){
            $b1 = $_POST['DEL'];
            $queryx = " DELETE FROM artigo
                        WHERE id = '$b1'";
            $result4 = $conn -> query("$queryx");

        }
    
    
    
        // Si pulsamos el botón llamado Prezo_DESC creamos una consulta seleccionando el precio de forma Descendiente
        if (isset($_POST['Prezo_DESC'])) {
            $query = " SELECT * FROM artigo ORDER BY prezo DESC";
        }
        
        else if (isset($_POST['Prezo_ASC'])) {
            $query = " SELECT * FROM artigo ORDER BY prezo ASC";
        }
    
        else if (isset($_POST['Prezo_Defecto'])) {
            $query = " SELECT * FROM ARTIGO";
        }
        // Para eliminar el contenido de la tabla                                     
        else if (isset($_POST['truncate-table'])) {
            $query = "TRUNCATE TABLE artigo";
            // Cuando borramos el contenido (o insertamos) la página no lo carga al instante así que necesitaremos recargarla
            header("Refresh:0");
        }
    
        else if (isset($_POST['insert-table'])) {
            $query = "INSERT INTO `artigo` (`nome`, `descripcion`, `prezo`, `categoria`) VALUES
                ( 'Manzana', 'Pieza de fruta verde', 0.5, 'Alimentos'),
                ( 'Silla', 'Cuatro patas con tabla', 15, 'Muebles'),
                ( 'Mesa', 'Tabla de madera redonda', 26, 'Muebles'),
                ( 'Aspiradora', 'Artefacto para limpiar suelos', 11, 'Electrodomésticos')";
            header("Refresh:0");
        }
        
        else {
            $query = " SELECT * FROM artigo";
        }
        // Insertamos nuestra consulta anterior en $result
        $result = $conn -> query("$query"); 
        echo "<div id='both-tables'><table id='all-table' class='both-tables-cl' border=1>";
            echo "<tr>";
                echo "<th>id_artigo</th>";
                echo "<th>nome</th>";
                echo "<th>descripcion</th>";
                echo "<th>prezo</th>";
                echo "<th>categoria</th>";
            echo "</tr>";
    
        // Generamos tabla y también........
        while($row2 = mysqli_fetch_array($result)){

            //$rows[] = mysqli_fetch_array($result);
            echo "<tr>";
                echo "<td value='count_id'>" . $row2['id'] . "</td>";
                echo "<td>" . $row2['nome'] . "</td>";
                echo "<td>" . $row2['descripcion'] . "</td>";
                echo "<td>" . $row2['prezo'] . "</td>";
                echo "<td>" . $row2['categoria'] . "</td>";
            echo "</tr>";

            // Insertamos las ids con su respectivo orden en una variable para usarla más tarde en la creación de la tabla para BORRAR
            $test[] = $row2['id'];
        }
        
        // Cuántas filas tenemos? Nos servirá para el bucle for para crear los botones de BORRAR
        $num = mysqli_num_rows($result);
 
        
        echo "<table id='btn-del' class='both-tables-cl' border=1 >";
        echo "<tr><td>DELETE</td></tr>";
        
        for ($i = 0; $i < $num; $i++){
        
        // Por cada fila creamos un botón cuyo nombre iguala a la id de la tabla (para saber qué producto borraremos)
        echo "<form action='' method='POST'>        
                    <tr>
                        <td><input id='per-btn-del' type= 'submit'
                        name='DEL'  value='"
                            ."$test[$i]".            "' /></td>
                    </tr>    
                </form>";
        }
        echo "</table></div>";
    
    
    
            // Creamos botones
            echo "<div id='change-btns1'><form action='' method='POST'>
                <input  id='btn-select1' class='btn-select' type='submit' name='Prezo_ASC' value='Ordenar prezo ASC' />
                </form>";

            echo "<form action='' method='POST'>
                <input id='btn-select2' class='btn-select' type='submit' name='Prezo_DESC' value='Ordenar prezo DESC' />
                </form>";
        
            echo "<form action='' method='POST'>
                <input id='btn-select3' class='btn-select' type='submit' name='Prezo_Defecto' value='Por Defecto' />
                </form></div>";
    
            echo "<div='change-btns2'><form action='' method='POST'>
                <input id='btn-select4' class='btn-select' type='submit' name='truncate-table' value='Borrar Tabla' />
                </form>";
    
            echo "<form action='' method='POST'>
                <input id='btn-select5' class='btn-select' type='submit' name='insert-table' value='Insertar Tabla' />
                </form></div>";
                
    
/**


[Problema solucionado]
    
            while($row2 = mysqli_fetch_array($result)){
                //$rows[] = mysqli_fetch_array($result);
                echo "<tr>";
                    echo "<td value='count_id'>" . $row2['id'] . "</td>";
                    echo "<td>" . $row2['nome'] . "</td>";
                    echo "<td>" . $row2['descripcion'] . "</td>";
                    echo "<td>" . $row2['prezo'] . "</td>";
                    echo "<td>" . $row2['categoria'] . "</td>";
                echo "</tr>";
             **************************   
                $test[] = $row2['id'];
              ***************************
              
              
              
            Si queremos obtener las ids usando $test y un while ($row2 = mysqli_fetch_array($result)
            Necesitamos hacerlo de una sola vez (cuando imprimimos la tabla, por ejemplo)

            1 consulta para 1 función mysli_fetch_array

            y una vez obtengamos los datos mediante el while y mysli_fetch podemos crear otras tablas (la del delete por ejemplo)
            }


 
    // Insertar BACKUP tabla con contenidos
    // Sin usar COLUMNA id (y convirtiéndola en primary key para el autoincrement)


    INSERT INTO `artigo` (`nome`, `descripcion`, `prezo`, `categoria`) VALUES
    ('Manzana', 'Pieza de fruta verde', 0, 'Alimentos'),
    ('Silla', 'Cuatro patas con tabla', 15, 'Muebles'),
    ('Mesa', 'Tabla de madera redonda', 26, 'Muebles'),
    ('Aspiradora', 'Artefacto para limpiar suelos', 11, 'Electrodomésticos');

    --
    -- Índices para tablas volcadas
    --

    --
    -- Indices de la tabla `artigo`
    --
    ALTER TABLE `artigo`
      ADD PRIMARY KEY (`id`);
    COMMIT;

*/


?>
    </body>
</html>