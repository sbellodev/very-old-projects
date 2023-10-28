<?php
/** 
 * Unha pantalla na que temos dúas variables a e b que podemos incrementar, decrementar ou poñer a cero. O valor
desas variable gardase nunha sesión.
*/

session_start();
if (!isset($_SESSION['A'])){
    if (!isset($_POST['Apos'])) {
    // Declaramos las variables de sesión con un 0, número del que partirá A y B
    $_SESSION['A'] = 0;
    $_SESSION['B'] = 0;
    }
}
else {
        
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 005 - Aumentar, Disminuír</title> 
    

        
</form>    
</head>
<body>

    <p><b>Cambia el valor de A y B</b></p>
    
    <form method="POST" action="">
    <input type="radio" name="Ach" value="Apos" /> Aumenta A <br>
    <input type='radio' name="Ach" value="Aneg" /> Disminuye A <br>
    <input type='radio' name="Ach" value="Acero"/> Resetea A <br>
    <br>
    <input type="radio" name="Ach" value="Bpos" /> Aumenta B <br>
    <input type='radio' name="Ach" value="Bneg" /> Disminuye B <br>
    <input type='radio' name="Ach" value="Bcero"/> Resetea B <br>
    <br>
    <input type='submit'/>

<?php
        
    // Tenemos 6 radios, 3 de ellos dedicados a A y otros 3 a B
    // Ambos aumentan, disminuyen y resetean
        
// Si hemos escogido uno de los radios
if (isset($_POST['Ach'])){
    // Si el radio escogido es 'Apos' (A positivo) aumentamos uno a la variable sesion A
    if (($_POST['Ach']) === "Apos"){
        $_SESSION['A'] = $_SESSION['A'] + 1;
    }
    // Lo mismo con Aneg (A negativo) disminuyendo uno
    if (($_POST['Ach']) === "Aneg"){
        $_SESSION['A'] = $_SESSION['A'] - 1;  
    }
    // Lo mismo pero igualando
    if (($_POST['Ach']) === "Acero"){
        $_SESSION['A'] = 0; 
    }
    
    // Repetimos lo mismo para B    
    if (($_POST['Ach']) === "Bpos"){
        $_SESSION['B'] = $_SESSION['B'] + 1;
    }

    if (($_POST['Ach']) === "Bneg"){
        $_SESSION['B'] = $_SESSION['B'] - 1;  
    }

    if (($_POST['Ach']) === "Bcero"){
        $_SESSION['B'] = 0;  
    } 
}
echo "<p>El valor de A es: " . $_SESSION['A'] . "</p><br>";
echo "<p>El valor de B es: " . $_SESSION['B'] . "</p><br>";
        
?>
    

</body>
    
</html>