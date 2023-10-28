<?php
/**
Mostre a nosa actriz e o noso actor favorito.  Podemos cambiar as nosas preferencias de tal xeito que a información permanece no disco, e así consérvanse os datos aínda que se reinicie o navegador, ou se apague e volva a acender o equipo

Proba o exercicio en Chrome, Firefox e Edge, e amosa no navegador onde se pode visualizar a cookie.
*/



/**
    Google Chrome - 
        Configuración > Configuración avanzada (Debajo de todo) > Privadidad & Seguridad > Configuración de contenido > Cookies > Ver todas las cookies > Escribimos 'localhost'
        
    Mozilla Firefox - 
        Opciones > Privacidad & Seguridad > Cookies y datos > Administrar datos > Escribimos 'localhost' 
    
    Microsoft Edge -
        F12 > Depurador > Click en cookies 

*/

// Si hemos insertado ambos datos (actor y actriz)
if (isset($_POST['actor']) && !empty($_POST['actor']) && isset($_POST['actriz']) && !empty($_POST['actriz'])){
    // Creamos dos cookies con el valor que hayamos insertado (actor y actriz)
    setcookie("galleta", $_POST['actor'], time() + (86400 * 30), "/");
    setcookie("galleta2", $_POST['actriz'], time() + (86400 * 30), "/");

        
} 
// Si no, simplemente declaramos las variables necesarias para evitar errores y avisos (justo cuando entramoe en la página por primera vez)
else {
    $actor;
    $actriz;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 001</title>  

</head>
<body>
            <form action='' method='POST' >
            <p>Inserte actor</p>
            <input type='text' name='actor' />
            <p>Inserte actriz</p>
            <input type='text' name='actriz' /><br>
            <input type='submit' />
    
<?php
// Si hemos introducido un actor y una actriz
if (!empty($_POST['actor']) && !empty($_POST['actriz'])){
$actor = $_POST['actor']; // Los pasamos a una variable
$actriz = $_POST['actriz'];
}

// Si hemos declarado ambas cookies, vemos su valor
if (isset($_COOKIE['galleta']) && isset($_COOKIE['galleta2'])){
echo "<br><br>Su actor favorito es: " . $_COOKIE['galleta'] ."<br> Su actriz favorita es:". $_COOKIE['galleta2'];
    }
// Si no hemos declarado ninguna cookie y hemos introducido valores en el formulario, ponemos un aviso para recargar la página
// (Las cookies funcionan en la 'siguiente' o en la misma página tras ser recargada, no en el mismo momento que se declaran)
if (!isset($_COOKIE['galleta']) && !isset($_COOKIE['galleta2']) && isset($_POST['actor']) && isset($_POST['actriz']) &&
$_COOKIE['galleta'] != $_POST['actor'] && $_COOKIE['galleta2'] != $_POST['actriz']){
    echo "<b><br><p>Por favor recargue la página</p>";
}
else { // Ponemos un aviso, igualmente, para recordar que se necesita cargar la página para que se vea el valor de las cookies
    echo "<p><br>Si no se muestran los datos introducidos, recargue la página por favor.</p>";
}


    
?>
    

</body>
    
</html>