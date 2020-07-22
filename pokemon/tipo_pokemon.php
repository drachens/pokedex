<?php
    $cod_tipo=$_POST["cod_tipo"];
    $pokedex=$_POST["pokedex"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO tipos_pokemon VALUES($pokedex,$cod_tipo)"; 
    $results = pg_query($conexion,$sql);
    header('Location: index.php');
?>