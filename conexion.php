<?php
$hostname = "localhost:3306";
$user = "root";
$password = "";
$db = "secretariado";
$connection = mysqli_connect($hostname , $user , $password); 
mysqli_select_db ($connection, $db);
?>