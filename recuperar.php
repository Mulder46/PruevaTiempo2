<?php
    include "conexion.php"; //conectamos a la BD
    function imprimir($lista){
        for($i=0;$i<count($usuarios);$i++){ //recorro todos los usuarios y saco nombre apellidos y le empresa asignada
            echo $lista[$i]['nombre']." ".$lista[$i]['apellidos']." asignado a: ".$usuarlistaios[$i]['Empresa']."<br>";
            
        }
    }

    
    $result_type=MYSQLI_ASSOC;  //guardamos en array asociativo
    $sql=mysqli_query($connection, "SELECT a.nombre,a.apellidos,e.nombre AS Empresa
    FROM alumnos AS a
    LEFT JOIN empresas AS e
    on e.id=a.fk_empresa;"); //cogemos nombre apellido y empresa, al nombre de empresa le doy alias para que no pete con el nombre de usuario
    $usuarios=mysqli_fetch_all($sql, $result_type); //genero el array
    imprimir($usuarios);
    

?>