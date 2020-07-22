    <?php
    $id_pokedex=$_POST["id_pokedex"];
    $generacion=$_POST["generacion"];
    $nombre_pokemon = $_POST["nombre_pokemon"];
    $tipo_pokemon = $_POST["tipo_pokemon"];
    if ($_POST['tipo_pokemon_2']) {
        $tipo_pokemon_2 = $_POST['tipo_pokemon_2'];
    }
    $ataque_pokemon = $_POST["ataque_pokemon"];
    $defensa_pokemon = $_POST["defensa_pokemon"];
    $vida_pokemon=$_POST["vida_pokemon"];
    if ($_POST['ataque_especial']) {
        $ataque_especial = $_POST['ataque_especial'];
    }
    else{
        $ataque_especial = 0;
    }
        if ($_POST['defensa_especial']) {
        $defensa_especial = $_POST['defensa_especial'];
    }
    else{
        $defensa_especial = 0;
    }
        if ($_POST['velocidad_pokemon']) {
        $velocidad_pokemon = $_POST['velocidad_pokemon'];
    }
    else{
        $velocidad_pokemon = 0;
    }
   // echo "$id_pokedex - $nombre_pokemon - $tipo_pokemon - $tipo_pokemon_2 - $ataque_pokemon - $defensa_pokemon - $vida_pokemon - $ataque_especial - $defensa_especial - $velocidad_pokemon";
    $conection = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    $existeID = "SELECT * from pokemons where pokemons.id_pokedex = ".$id_pokedex."";
    $queryExistID = pg_query($conection,$existeID);

    $IDtipo = "SELECT tipos.codigo_tipo from tipos where tipos.nombre = '".$tipo_pokemon."'";
    $queryIDtipo = pg_query($conection,$IDtipo);
    $tipos = pg_fetch_object($queryIDtipo);

    $IDtipo2 = "SELECT tipos.codigo_tipo from tipos where tipos.nombre = '".$tipo_pokemon_2."'";
    $queryIDtipo2 = pg_query($conection,$IDtipo2);
    $tipos2 = pg_fetch_object($queryIDtipo2);
    if (pg_fetch_row($queryExistID)==0) {

        $insertarPokemon4 = "INSERT into pokemons(id_pokedex,nombre,generacion,vida_base,def_base,ataq_base,ataq_esp_base,def_esp_base,velocidad_base) values (".$id_pokedex.",'".$nombre_pokemon."',".$generacion.",".$vida_pokemon.",".$defensa_pokemon.",".$ataque_pokemon.",".$ataque_especial.",".$defensa_especial.",".$velocidad_pokemon.")";
        $insertar_pokemon = pg_query($conection,$insertarPokemon4);

        $insertarTipo5 = "INSERT into tipos_pokemon values (".$id_pokedex.",".$tipos->codigo_tipo.")";
        $insertar_tipo1 = pg_query($conection,$insertarTipo5);
        if ($tipo_pokemon_2 && $tipo_pokemon_2!=$tipo_pokemon) {
            $insertarTipo52 = "INSERT into tipos_pokemon values (".$id_pokedex.",".$tipos2->codigo_tipo.")";
        }
    }

    // Create connection
    //echo ":(";
    //$sql = "INSERT INTO pokemons VALUE(".$id_pokedex",'".$nombre"',".$generacion")"; 
// pg_query($conection,$sql);
    header("Location: index2.php?pokedex=".$id_pokedex."&&action=display");
    ?>
