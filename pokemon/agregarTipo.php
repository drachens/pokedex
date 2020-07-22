<?php
    $name_tipo=$_POST["name_tipo"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO tipos(nombre) VALUES('$name_tipo')"; 
    $results = pg_query($conexion,$sql);
    header('Location: index.php');
?>