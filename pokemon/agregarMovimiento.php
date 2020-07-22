<?php
    $nombre=$_POST["nombre"];
    $cod_tipo=$_POST["cod_tipo"];
    $potencia=$_POST["potencia"];
    $precision=$_POST["precision"];
    $pp=$_POST["pp"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO movimientos(nombre,cod_tipo,potencia,precision,pp) VALUES('$nombre',$cod_tipo,$potencia,$precision,$pp)"; 
    $results = pg_query($conexion,$sql);
    header('Location: index2.php');
?>