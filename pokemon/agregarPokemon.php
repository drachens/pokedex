<?php
    $id_pokedex=$_POST["pokedex"];
    $nombre = $_POST["name"];
    $generacion = $_POST["gen"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO pokemons VALUES($id_pokedex,'$nombre',$generacion)"; 
    $results = pg_query($conexion,$sql);
    header('Location: index.php');
?>
