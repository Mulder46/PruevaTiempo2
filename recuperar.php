<?php
    include "conexion.php"; //conectamos a la BD
    $result_type=MYSQLI_ASSOC;  //guardamos en array asociativo
    $sql=mysqli_query($connection, "SELECT a.nombre,a.apellidos,e.nombre AS Empresa
    FROM alumnos AS a
    LEFT JOIN empresas AS e
    on e.id=a.fk_empresa;"); //cogemos nombre apellido y empresa, al nombre de empresa le doy alias para que no pete con el nombre de usuario
    $usuarios=mysqli_fetch_all($sql, $result_type); //genero el array

    for($i=0;$i<count($usuarios);$i++){ //recorro todos los usuarios y saco nombre apellidos y le empresa asignada
        echo $usuarios[$i]['nombre']." ".$usuarios[$i]['apellidos']." asignado a: ".$usuarios[$i]['Empresa']."<br>";
        
    }

?>