<?php
include 'conection.php';
        
if (isset($_GET['enviado'])) {
    
    $nombre = $_GET['consulta'];
    $columna = $_GET['consulta1'];
    $valor = $_GET['consulta2'];

    // Si hemos enviado el formulario y rellenado las 3 casillas
    if (!empty($nombre) && !empty($columna) && !empty($valor)) {
        // Declaramos una query SQL
        $query = " UPDATE artigo
                    SET $columna = '$valor'
                    WHERE nome = '$nombre'";
        
        // La insertamos en una variable
        $result = $conn -> query("$query");

        // Si ha sido insertada sin problemas...
        if ($result === true) {   
            echo "<br>Consulta MODIFICADA con éxito";
        }
    }

    else { echo "No has introducido todas las casillas";}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' href='mystylei.css'>
	<style>
		#btn-index4 {
			background-color: #FFA500;
		}
	</style>
</head>
<body>
    <h3> MODIFY - ARTIGO </h3>

    <div id = 'all-index'>
        <input id='btn-index1' type="button" onclick="location.href='index.html';" value="INDEX"/>
        <input id='btn-index2' type="button" onclick="location.href='UnoSELECT.php';" value="SELECT AND DELETE"/>
        <input id='btn-index3' type="button" onclick="location.href='UnoINSERT.php';" value="INSERT"/>
        <input id='btn-index4' type="button" onclick="location.href='UnoMODIFY.php';" value="MODIFY"/>
        <input id='btn-index5' type="button" onclick="location.href='UnoOPTION.php';" value="OPTION"/>
    </div> 
    
    <form action="UnoMODIFY.php" method="GET">
        <p>Nombre del artículo a modificar: </p> <input type="text" name="consulta" />
        <p>Columna a modificar: </p> <input type="text" name="consulta1" />
        <p>Nuevo valor:</p> <input type="text" name="consulta2" />
        <p><input type="submit" value="Enviar" name="enviado"></p>
    </form>
    
<?php
    /************* Mostramos la tabla de productos *************/
    
    
    $query = " SELECT * FROM ARTIGO";
    $result = $conn -> query("$query");
        echo "<table id='all-table' border=1>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>nome</th>";
                echo "<th>descripcion</th>";
                echo "<th>prezo</th>";
                echo "<th>categoria</th>";
            echo "</tr>";

        // Mientras $result tenga una fila, la imprimimos desde su valor i.e. ['nome']
        while($row = mysqli_fetch_array($result)){
            //$rows[] = mysqli_fetch_array($result);
            echo "<tr>";
                echo "<td value='count_id'>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['prezo'] . "</td>";
                echo "<td>" . $row['categoria'] . "</td>";
            echo "</tr>";
        }
    echo "</table>";

    
    
?>
    
</body>
</html>