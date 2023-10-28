<?php
session_start();
if (isset($_SESSION['acceso'])){ // Si hemos declarado 'acceso' anteriormente
    if ($_SESSION['acceso']==="1"){
        echo "<em>Acceso a datos privados...</em><br>El valor de \$_SESSION['secreto'] es: " . $_SESSION['secreto']. "<br>"; // Mostramos el valor secreto como prueba de que funciona todo bien
        
        echo 'Y ahora tiene acceso a nuestro secreto: <a href="https://www.youtube.com/watch?v=2W_G3xmSGfo"> Clica para el secreto</a><br>';

        echo "<br> Esta sesión será autodestruída una vez salga o recargue la página.<br>Le recomendamos volver al inicio <a href='004php.php'>Aqui</a>.";
        session_destroy(); // Después de cargar la página, destruímos la sesión.
        session_unset();
        }
    }
else { // Si por alguna razón no se han seguido los pasos o se intenta entra en esta página directamente, mandamos mensaje de error
    echo "Sesión no iniciada.<br>Le recomendamos volver al inicio <a href='004php.php'>Aqui</a>.";
    header("HTTP/1.0 404 Not Found");
    }
?>