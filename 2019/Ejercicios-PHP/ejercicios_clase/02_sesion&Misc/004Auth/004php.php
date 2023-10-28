<?php
// Implemente o sistema de autenticación que vimos nos vídeos na clase


if (isset($_SESSION)){ // Si por alguna razón al redirigir a ésta página se mantiene una sesión, la destruímos
session_destroy();
session_unset();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 004 - Auntentication</title>  
</head>
<body>

    <form action="pag1.php" method="POST">
        
    <p>Nombre y contraseña: Carlos 123456</p>
    <input type="text" name="nombre"  /><br>
    <input type="password" name="pass" /><br>
    
    <input type="submit"/>
        
<?php
    

    
?>
    

</body>
    
</html>