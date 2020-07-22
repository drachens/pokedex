<?php
$pokedex = $_POST['pokedex'];


$conection = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
$sql = "SELECT pokemons.id_pokedex, tipos.codigo_tipo from pokemons,tipos,tipos_pokemon where pokemons.id_pokedex = tipos_pokemon.id_pokedex and tipos_pokemon.codigo_tipo = tipos.codigo_tipo and pokemons.id_pokedex = ".$pokedex.""; 
$queryPokemon = pg_query($conection,$sql);
if (pg_num_rows($queryPokemon) > 0) {
	
	$pokemon = pg_fetch_object($queryPokemon);
	$deletePokemon = "DELETE from pokemons where pokemons.id_pokedex = ".$pokedex." ";
	$deleteTipoPokemon = "DELETE from tipos_pokemon where tipos_pokemon.id_pokedex = ".$pokedex."";
	$queryDPokemon = pg_query($conection,$deletePokemon);
	$queryDTipoPokemon = pg_query($conection,$deleteTipoPokemon);
}
header("location: index2.php");
?>