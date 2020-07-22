<?php
    $id_habilidad=$_POST["id_habilidad"];
    $id_pokedex=$_POST["id_pokedex"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO habilidadespokemon VALUES($id_pokedex,$id_habilidad)"; 
    $results = pg_query($conexion,$sql);
    header('Location: index.php');
?>