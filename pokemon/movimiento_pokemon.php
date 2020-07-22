<?php
    $id_pokedex=$_POST["id_pokedex"];
    $id_movimiento=$_POST["id_movimiento"];
    $nvl_obtencion=$_POST["nvl_obtencion"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO ataques_pokemon VALUES($id_pokedex,$id_movimiento,$nvl_obtencion)"; 
    $results = pg_query($conexion,$sql);
    header('Location: index2.php');
?>