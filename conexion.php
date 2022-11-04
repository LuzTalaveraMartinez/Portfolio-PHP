<?php

$servidor='localhost';
$usuario='root';
$pass='';
$bbdd="bbdd-form-mi-web";

$conn=mysqli_connect($servidor,$usuario,$pass,$bbdd);

mysqli_set_charset($conn, "utf8"); //Para que me reconozca todo tipo de caracter


?>
