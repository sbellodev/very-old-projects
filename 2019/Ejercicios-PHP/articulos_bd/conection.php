<?php

$servername = "localhost";
// El usuario que uséis (este es el que trae por defecto, administrador)
$username = "root";
// Esta contraseña está vacía
$pass = "";
// Nombre de mi base de datos
$database = "uno";

// Create conection
$conn = new mysqli($servername, $username, $pass, $database);

// Check connection
if ($conn->connect_error) {
    die("<p>Not connected: " . $conn -> connect_error) ."</p><br>";
}
else {
    echo "<p>Connected successfully. </p><br>";
}

?>