<?php
/*
nombre del producto 
- descripción del producto 
- precio 
- cantidad de productos en el almacén. 
- imagen del producto (puedes coger url de internet)
*/
function guardar($archivo,$datos){
     
    $json = json_encode($datos);
    file_put_contents($archivo,$json); //guardo archivo
}
function mostrar($archivo,$datos){
    $tienda_json = file_get_contents($archivo);
    $decoded_json = json_decode($tienda_json, true); //true array asociado, false clase
    for($i=0;$i<count($decoded_json);$i++){
        echo "Descripción: ".$decoded_json[$i]['descripcion']." a un precio de: ".$decoded_json[$i]['precio']."€ tenemos en stock: ".$decoded_json[$i]['cantidad']."<br>";
        echo "<img width='70' height='70' src=".$decoded_json[$i]['url']."><br>";
    }
}

/*
*
*
EMPIEZA EL PROGRAMA 
*
*
*/
$archivo="datos/archivo.json";

$tienda = Array (  //creo un array de prodcutos
    "0" => Array (
        "descripcion" => "Un producto valido para todo lo que quieras",
        "precio" => 154,
        "cantidad" => 5,
        "url" => "https://imagenes.elpais.com/resizer/dEtfa84YXZ536TY1_jMBF-StcJo=/414x0/cloudfront-eu-central-1.images.arcpublishing.com/prisa/XH7Y2LXJXNBZ5BZY4Q42PBCNII.jpg"
    ),
    "1" => Array (
        "descripcion" => "aceite de oliva",
        "precio" => 5,
        "cantidad" => 90,
        "url" => "https://images.ecestaticos.com/WmWX6IWC-nxb1cKDHcVDkCU6zGs=/3x89:1696x1043/1600x900/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F071%2Fe1a%2F4ec%2F071e1a4ecde3fb1a62b449152a3cf312.jpg"
    ),
    "2" => Array (
        "descripcion" => "Raspberry pi",
        "precio" => 90,
        "cantidad" => 15,
        "url" => "https://upload.wikimedia.org/wikipedia/commons/f/f1/Raspberry_Pi_4_Model_B_-_Side.jpg"
    )
);

guardar($archivo,$tienda);
/*
*
*
RECUPERACIÓN DE DATOS
*
*
*/
mostrar($archivo,$tienda);

?>