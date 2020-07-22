<?php
    $vida_base=$_POST["vida_base"];
    $def_base=$_POST["def_base"];
    $ataq_base=$_POST["ataq_base"];
    $ataq_esp_base=$_POST["ataq_esp_base"];
    $def_esp_base=$_POST["def_esp_base"];
    $velocidad_base=$_POST["velocidad_base"];
    $id_pokedex=$_POST["id_pokedex"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "UPDATE pokemons SET vida_base = $vida_base, def_base = $def_base, ataq_base = $ataq_base, ataq_esp_base = $ataq_esp_base, def_esp_base = $def_esp_base, velocidad_base = $velocidad_base WHERE pokemons.id_pokedex = $id_pokedex "; 
    $results = pg_query($conexion,$sql);
    header('Location: index3.php');
?>