<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "UsuarioTrivia"; 

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn)
{
    die ("no hay conexion ". mysqli_connect_error() );
}
?>