<?php

/**

https://www.formget.com/php-select-option-and-php-radio-button/
http://form.guide/php-form/php-form-select.html

%S^NvaRUZ5iX6LSrI!xM

web final
web anterior
seo web anterior, meta, tags
goog analytics puesto en final

**/
include 'conection.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' href='mystylei.css'>
	<style>
		#btn-index5 {
			background-color: #FFA500;
		}
        #db2 {
            padding-top: 30px;  
        }

	</style>
</head>
<body>
    <h3> SELECCIONAR OPTION - ARTIGO</h3>
    
    <div id = 'all-index'>
        <input id='btn-index1' type="button" onclick="location.href='index.html';" value="INDEX"/>
        <input id='btn-index2' type="button" onclick="location.href='UnoSELECT.php';" value="SELECT AND DELETE"/>
        <input id='btn-index3' type="button" onclick="location.href='UnoINSERT.php';" value="INSERT"/>
        <input id='btn-index4' type="button" onclick="location.href='UnoMODIFY.php';" value="MODIFY"/>
        <input id='btn-index5' type="button" onclick="location.href='UnoOPTION.php';" value="OPTION"/>
    </div>
    <div id='db1'></div>
    
 <?php

    // Imprimimos tabla
    $queryLEL = " SELECT * FROM ARTIGO";

    $result = $conn -> query("$queryLEL");
    echo "<div id='db2'>";
    echo "<form action='' method='POST' id='carform'>";
    echo "<select id='car-select' form='carform' name='hc' >";
    while($rowLEL = mysqli_fetch_array($result)){
        echo "<option value='" .$rowLEL['id']. "'>" .$rowLEL['nome']. "</option>";
        $prob = $rowLEL['id'];
        echo "probando rowlel:". $rowLEL['nome'];
    }
    echo "</select>";
    echo "<input type='submit' name='submit'  />";
    echo "</form>";
    echo "</div>";
		

	if(isset($_POST['hc'])) {
        $var1 = $_POST['hc'];
        echo "<table id='all-table' border=1>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>nome</th>";
            echo "<th>descripcion</th>";
            echo "<th>prezo</th>";
            echo "<th>categoria</th>";
        echo "</tr>";

        $query = " SELECT * FROM ARTIGO WHERE id = $var1";
        $result1 = $conn -> query("$query");

        while($row = mysqli_fetch_array($result1)){
            echo "<tr>";
                echo "<td value='count_id'>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['prezo'] . "</td>";
                echo "<td>" . $row['categoria'] . "</td>";
            echo "</tr>";
        }
    }



	/*** GENERAR TODA LA TABLA 
    echo "<table id='all-table' border=1>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>nome</th>";
            echo "<th>descripcion</th>";
            echo "<th>prezo</th>";
            echo "<th>categoria</th>";
        echo "</tr>";

	$query = " SELECT * FROM ARTIGO";
    $result1 = $conn -> query("$query");

    while($row = mysqli_fetch_array($result1)){
        echo "<tr>";
            echo "<td value='count_id'>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['prezo'] . "</td>";
            echo "<td>" . $row['categoria'] . "</td>";
        echo "</tr>";
    }
    echo "</table>"; ***/
    
    
?>
    
</body>
</html>