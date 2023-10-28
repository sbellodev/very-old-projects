<?php
if(isset($_POST['nombre']) || isset($_POST['pass'])){
    $nom = $_POST['nombre'];
    $pass = $_POST['pass'];
    
    // Si los datos introducidos coinciden con Carlos y 123456 (manera rápida de denegar la entrada a gente que no sepa o no tenga registrado el nombre y contraseña)
    if (strcmp($nom,"Carlos")==0 && strcmp($pass,"123456")==0) {
        session_start();
        $_SESSION['acceso']="1"; // La variable acceso será '1', servirá en el futuro para confirmar que seguimos/estamos en sesión
        // Esta es una variable simple para demostrar que la mantenemos más adelante
        $_SESSION['secreto'] = 'El secreto es un vídeo super secreto!';

        print "Entraste en sesión<br><br>";
        echo "Siga avanzando en <a href='pag2.php'> Continuar.</a>"; // Click aquí para avanzar
    }
    else {
        $nom;
        $pass;
        // Si has fallado el Usuario y Contraseña te ofrece un link para volver al principio de todo.
        echo "No has entrado en la sesion, pruebe otra vez. <a href='004php.php'>Volver</a>.";
    }

    }

else {
    $nom;
    $pass;
    // Si has fallado el Usuario y Contraseña te ofrece un link para volver al principio de todo.
    echo "No has entrado en la sesion, pruebe otra vez. <a href='004php.php'>Volver</a>.";
}


?>