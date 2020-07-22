<?php
	$id_pokedex=$_POST["id_pokedex"];
    $generacion=$_POST["generacion"];
    $nombre_pokemon = $_POST["nombre_pokemon"];
    if ($_POST['tipo_pokemon_2']) {
        $tipo_pokemon_2 = $_POST["tipo_pokemon_2"];
    }
    if ($_POST['tipo_pokemon']) {
    	$tipo_pokemon = $_POST["tipo_pokemon"];
    }
    $ataque_pokemon = $_POST["ataque_pokemon"];
    $defensa_pokemon = $_POST["defensa_pokemon"];
    $vida_pokemon=$_POST["vida_pokemon"];
    $ataque_especial = $_POST['ataque_especial'];
    $defensa_especial = $_POST['defensa_especial'];
    $velocidad_pokemon = $_POST['velocidad_pokemon'];
      //echo "$id_pokedex - $nombre_pokemon - $tipo_pokemon - $tipo_pokemon_2 - $ataque_pokemon - $defensa_pokemon - $vida_pokemon - $ataque_especial - $defensa_especial - $velocidad_pokemon";
    $conection = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    $confirm = "SELECT pokemons.id_pokedex, pokemons.nombre from pokemons where pokemons.id_pokedex = ".$id_pokedex."";
    $queryConfirm = pg_query($conection,$confirm); //BUSCAR POKEMONS PARA LA ID_POKEDEX INGRESADA
    if (pg_fetch_row($queryConfirm) > 0) { // SI EXISTE  RESULTADO EJECUTAR:
    	
    	$selectTipoAntiguo = "SELECT tipos_pokemon.codigo_tipo from tipos_pokemon where tipos_pokemon.id_pokedex = ".$id_pokedex.""; //SELECCIONO TIPOS1 Y/O 2 REGISTRADOS EN TIPOS_PPOKEMON
    	$queryOldtype = pg_query($conection,$selectTipoAntiguo);
    	$oldTypes = pg_fetch_object($queryOldtype);
    	if(pg_num_rows($queryOldtype)>1){ //SI HAY DOS RESULTADOS
    		$antiguoTipo1 = pg_fetch_result($queryOldtype, 0, 0); //GUARDO CODIGOS ANTIGUOS TIPOS
    		$antiguoTipo2 = pg_fetch_result($queryOldtype, 1, 0);
    	}
    	else{
    		$antiguoTipo1 = $oldTypes->codigo_tipo;
    	}

    	$Update6 = "UPDATE pokemons SET nombre = '".$nombre_pokemon."', generacion = ".$generacion.", vida_base = ".$vida_pokemon.", def_base = ".$defensa_pokemon.",ataq_base = ".$ataque_pokemon.",ataq_esp_base = ".$ataque_especial.",def_esp_base = ".$defensa_especial.",velocidad_base = ".$velocidad_pokemon." where pokemons.id_pokedex = ".$id_pokedex." "; //UPDATE DATOS POKEMON
    	$queryUpdate6 = pg_query($conection,$Update6);
    	$idtipo1 = "SELECT tipos.codigo_tipo from tipos where tipos.nombre = '".$tipo_pokemon."' "; //CODIGO TIPO A INGRESAR
    	$queryID1 = pg_query($conection,$idtipo1); //SELEECIONAR CODIGO DEL TIPO1 INGRESADO
    	$type1 = pg_fetch_object($queryID1);
    	$confirmTipoPokemon = "SELECT * from tipos_pokemon where tipos_pokemon.id_pokedex = ".$id_pokedex." and tipos_pokemon.codigo_tipo = ".$type1->codigo_tipo.""; //CONFIRMAR EXISTENCIA RELACION POKEMON-TIPO
    	$queryConfirmTipoPokemon = pg_query($conection,$confirmTipoPokemon);
    	if (!pg_fetch_row($queryConfirmTipoPokemon)) { // SI NO HAY RESULTADOS INSERTAR DATO
    		$UpdateTipo1 = "UPDATE tipos_pokemon SET codigo_tipo =".$type1->codigo_tipo." where tipos_pokemon.id_pokedex = ".$id_pokedex." and tipos_pokemon.codigo_tipo = ".$antiguoTipo1."";
    		$queryinsertTipo1 = pg_query($conection,$UpdateTipo1);
    	echo "noo";
    	}

    	if ($tipo_pokemon_2) { //SI SE INGRESÓ UN TIPO2 HACER LO SIGUIENTE:
    		$idtipo2 = "SELECT tipos.codigo_tipo from tipos where tipos.nombre = '".$tipo_pokemon_2."'";
    		$queryID2 = pg_query($conection,$idtipo2); //SELECCOINAR CODIGO DEL TIPO2 INGRESADO
    		$type2 = pg_fetch_object($queryID2);
    		$confirmTipoPokemon2 = "SELECT * from tipos_pokemon where tipos_pokemon.id_pokedex = ".$id_pokedex." and tipos_pokemon.codigo_tipo = ".$type2->codigo_tipo."";
    	$queryConfirmTipoPokemon2 = pg_query($conection,$confirmTipoPokemon2);
    	if (!pg_fetch_row($queryConfirmTipoPokemon2)) {
    		$UpdateTipo2 = "UPDATE tipos_pokemon SET codigo_tipo =".$type2->codigo_tipo." where tipos_pokemon.id_pokedex = ".$id_pokedex." and tipos_pokemon.codigo_tipo = ".$antiguoTipo2." ";
    		$queryinsertTipo2 = pg_query($conection,$UpdateTipo2);
    	echo "noo";
    	}
    }

}

    
  echo "string";  



header("location: index2.php?pokedex=".$id_pokedex."&&action=display")

?>