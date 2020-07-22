<?php
    $agregar_habilidad=$_POST["agregar_habilidad"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO habilidades(nombre) VALUES('$agregar_habilidad')"; 
    $results = pg_query($conexion,$sql);
    header('Location: index.php');
?>