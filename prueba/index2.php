<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body >
	<div>
		<img id="pokedex" src="POKEDEX5.png">
		<div >	
			<?php
				$conection=pg_connect("host=localhost dbname=pokemon user=drachen password=password");
				/*if ($conection) {
					echo "Conectada.";
				}
				else{
					echo "No";
				}*/
				$sql="SELECT pokemons.id_pokedex,pokemons.nombre FROM pokemons ORDER BY pokemons.id_pokedex ASC ";
				$rs = pg_query($conection,$sql);
				if (pg_num_rows($rs)>0)  {
					echo "<ul class='pokedex'>";
					while ($object = pg_fetch_object($rs)) {
						echo "<a href='index2.php?pokedex=".$object->id_pokedex."&&action=display'><li id='pokedex_item'>";
						if($object->id_pokedex<10){
							echo "<p id='pokedex'>00".$object->id_pokedex."</p><p id='nombre_pokemon'>".$object->nombre."</p>";
						}
						else if ($object->id_pokedex>=10 && $object->id_pokedex<100) {
							echo "<p id='pokedex'>0".$object->id_pokedex."</p><p id='nombre_pokemon'>".$object->nombre."</p>";
						}
						else{
						echo "<p id='pokedex'>".$object->id_pokedex."</p><p id='nombre_pokemon'>".$object->nombre."</p>";
						}
						echo "</li></a>";
					}
					echo "</ul>";
				}
				else{
					echo "Pokedex vacía.";
				}
		?>	
		</div>
		<div>
			<?php
				$pokedex = $_GET['pokedex'];
				$action = $_GET['action'];
				if ($pokedex && $action == 'display') {
					$conection=pg_connect("host=localhost dbname=pokemon user=drachen password=password");
					$sql2= "SELECT pokemons.nombre,tipos.nombre as tipo,pokemons.vida_base as vida,pokemons.ataq_base as ataque,pokemons.def_base as defensa, pokemons.ataq_esp_base as ataque_especial, pokemons.def_esp_base as defensa_especial, pokemons.velocidad_base as velocidad FROM pokemons,tipos,tipos_pokemon WHERE pokemons.id_pokedex = $pokedex AND tipos.codigo_tipo = tipos_pokemon.codigo_tipo AND tipos_pokemon.id_pokedex = pokemons.id_pokedex";
					$sqlHabilidades = "SELECT habilidades.nombre from habilidades,pokemons,habilidadespokemon where pokemons.id_pokedex = $pokedex and habilidadespokemon.id_pokedex = pokemons.id_pokedex and habilidadespokemon.id_habilidad = habilidades.id_habilidad";
					$queryTipos = pg_query($conection,$sql2);
					$queryHabilidades = pg_query($conection,$sqlHabilidades);

					if (pg_num_rows($queryTipos)>0) {
						echo "<div class='pokedex_description'>";
						$pokemons = pg_fetch_object($queryTipos);
						echo "<p id='name_pokemon'>Nombre: ".$pokemons->nombre."</p>";
						echo"<p id='tipo_pokemon'> Tipos: ";
								if (pg_num_rows($queryTipos)>1) {
									
										echo pg_fetch_result($queryTipos, 0, 1);
										echo "-";
										echo pg_fetch_result($queryTipos, 1, 1);
										
								}
								else{
									echo $pokemons->tipo;
								}
						echo "</p><p id='habilidad'>Habilidades: ";
								if (pg_num_rows($queryHabilidades)>1) {
											echo pg_fetch_result($queryHabilidades, 0, 0);
											echo "-";
											echo pg_fetch_result($queryHabilidades, 1, 0);
										}
								else{
										echo pg_fetch_result($queryHabilidades, 0, 0);
								}				
						echo "</p><p id='vida_pokemon'>Vida: ".$pokemons->vida."</p><p id='ataque_pokemon'>Ataque: ".$pokemons->ataque."</p><p id='defensa_pokemon'>Defensa: ".$pokemons->defensa."</p><p id='ataque_especial'>Ataque especial: ".$pokemons->ataque_especial."</p><p id='defensa_especial'>Defensa especial: ".$pokemons->defensa_especial."</p><p id='velocidad'>Velocidad: ".$pokemons->velocidad."</p></div>";
					?>
						<div id='BotonAtaques'>
							<a href="index2.php?pokedex=<?php echo $pokedex ?>&&action=ataques"><p id="BotonAtaques" type="submit">ATAQUES</p></a>
						</div>
							<div id = 'update'>
										<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=update'><p>UPDATE</p></a>
									</div>
									<div id='delete'>
										<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=delete'><p>DELETE</p></a>
									</div>	
					<?php
					}			
			}
				if ($pokedex && $action == 'ataques' ) {
					$conection2 = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
					$sql3 = "SELECT movimientos.nombre as movimientos, pokemons.nombre as pokemon, tipos.nombre as tipo_ataque, movimientos.potencia as potencia, ataques_pokemon.nvl_obtencion as lvl  from movimientos, ataques_pokemon, tipos, pokemons where pokemons.id_pokedex= $pokedex and pokemons.id_pokedex = ataques_pokemon.id_pokedex and movimientos.cod_tipo = tipos.codigo_tipo and movimientos.id_movimiento = ataques_pokemon.id_movimiento order by ataques_pokemon.nvl_obtencion";
					$queryAtaques = pg_query($conection2,$sql3);
					if(pg_num_rows($queryAtaques)>0){
						$ataques = pg_fetch_object($queryAtaques);
						echo "<div class='pokedex_description'>
								<p style='margin-left:20px;margin-bottom:5px;'>Pokemon:".$ataques->pokemon."</p>
								<center style ='color:#4b4efd'>MOVIMIENTOS</center>
								<ul class='pokedex' id='ataques'>";
								$x = 0;
								do {
									echo "
											<li class='ataques' id='".$x."'>
												<p>Atck: ";echo pg_fetch_result($queryAtaques, $x, 0);echo"</p>
												
												<p>lvl: ";echo pg_fetch_result($queryAtaques, $x, 4);echo"</p>
												
												<p style='padding-left:3px;'>Type: ";echo pg_fetch_result($queryAtaques, $x, 2);echo"</p>
												
												<p style='padding-left:4px;'>Dmg: ";echo pg_fetch_result($queryAtaques, $x, 3);echo"</p>
											</li>
										"; $x = $x+1;} while (pg_num_rows($queryAtaques)>$x);
											
									echo "</ul>
										</div>
										<div id='BotonAtaques'>
										<a href='index2.php?pokedex=".$pokedex."&&action=ataques'><p id='BotonAtaques' type='submit'>ATAQUES</p></a>
										</div>
											<div id = 'update'>
										<a href='index2.php?pokedex=".$pokedex."&&action=update'><p>UPDATE</p></a>
									</div>
									<div id='delete'>
										<a href='index2.php?pokedex=".$pokedex."&&action=delete'><p>DELETE</p></a>
									</div>	";
					}
					else{
						echo "<div class='pokedex_description'>
								<center>No existe informacion.</center>
								</div>
								<div id='BotonAtaques'>
										<a href='index2.php?pokedex=".$pokedex."&&action=ataques'><p id='BotonAtaques' type='submit'>ATAQUES</p></a>
										</div>";
					}
				}
				if ($action == 'insertar') {
					?>
					<div class="pokedex_description">
						<center>---INSERT---</center>

						<form action="agregarPokemon.php" method="post">
								<label for="id_pokedex">*ID POKEDEX: </label>
								<input type="number" name="id_pokedex" id="id_pokedex" min="1" max="999" required>
								<label for="nombre_pokemon">*POKEMON: </label>
								<input type="text" name="nombre_pokemon" id="nombre_pokemon" required>
								<label for="generacion">*GENERACION: </label>
								<input type="number" name="generacion" id="generacion" min="1" max="99" required>
								<label for="tipo_pokemon">*TIPO 1: </label>
								<input type="text" name="tipo_pokemon" id="tipo_pokemon" required>
								<label for="tipo_pokemon_2">TIPO 2: </label>
								<input type="text" name="tipo_pokemon_2" id="tipo_pokemon_2">
								<label for="ataque_pokemon">*ATAQUE: </label>
								<input type="number" name="ataque_pokemon" id="ataque_pokemon" min="1" max="999" required>
								<label for="defensa_pokemon">*DEFENSA: </label>
								<input type="number" name="defensa_pokemon" id="defensa_pokemon" min="1" max="999" required>
								<label for="vida_pokemon">*VIDA: </label>
								<input type="number" name="vida_pokemon" id="vida_pokemon" min="1" max="999" required>
								<label for="ataque_especial">ATAQUE ESP: </label>
								<input type="number" name="ataque_especial" id="ataque_especial" min="1" max="999">
								<label for="defensa_especial">DEFENSA ESP: </label>
								<input type="number" name="defensa_especial" id="defensa_especial" min="1" max="999">
								<label for="velocidad_pokemon">VELOCIDAD: </label>
								<input type="number" name="velocidad_pokemon" id="velocidad_pokemon" min="1" max="999">
								<input id="botonInsert" value="INSERTAR" type="submit" name="submit">				
						</form>
							<div id='BotonAtaques'>
								<a href="index2.php?pokedex=<?php echo $pokedex ?>&&action=ataques"><p id="BotonAtaques" type="submit">ATAQUES</p></a>
							</div>
							<div id = 'update'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=update'><p>UPDATE</p></a>
							</div>
							<div id='delete'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=delete'><p>DELETE</p></a>
							</div>	
					</div>
					<?php
				}
				if ($pokedex && $action == 'update') {
					$conection4=pg_connect("host=localhost dbname=pokemon user=drachen password=password");
					$sql4= "SELECT pokemons.generacion,pokemons.id_pokedex,pokemons.nombre as nombre,tipos.nombre as tipo,pokemons.vida_base as vida,pokemons.ataq_base as ataque,pokemons.def_base as defensa, pokemons.ataq_esp_base as ataque_especial, pokemons.def_esp_base as defensa_especial, pokemons.velocidad_base as velocidad FROM pokemons,tipos,tipos_pokemon WHERE pokemons.id_pokedex = $pokedex AND tipos.codigo_tipo = tipos_pokemon.codigo_tipo AND tipos_pokemon.id_pokedex = pokemons.id_pokedex";
					$queryTipos4 = pg_query($conection4,$sql4);	
					if (pg_num_rows($queryTipos4)>0) {
						$pokemons4 = pg_fetch_object($queryTipos4);
						
								if (pg_num_rows($queryTipos4)>1) {
									
										$tipo1 = pg_fetch_result($queryTipos4, 0, 3);
										
										$tipo2 = pg_fetch_result($queryTipos4, 1, 3);
										
								}
								else{
									$tipo1 = $pokemons->tipo;
								}	
								}								
				?>
				<div class="pokedex_description">
						<center>---UPDATE---</center>
						<form action="actualizarPokemon.php" method="post">
								<input type="hidden" name="id_pokedex" id="id_pokedex" min="1" max="999" value="<?php echo $pokemons4->id_pokedex ?>" >
								<label for="nombre_pokemon">*POKEMON: </label>
								<input type="text" name="nombre_pokemon" id="nombre_pokemon" value="<?php echo $pokemons4->nombre ?>">
								<label for="generacion">*GENERACION: </label>
								<input type="number" name="generacion" id="generacion" min="1" max="99" value="<?php echo $pokemons4->generacion ?>">
								<label for="tipo_pokemon">*TIPO 1: </label>
								<input type="text" name="tipo_pokemon" id="tipo_pokemon" value="<?php echo pg_fetch_result($queryTipos4, 0, 3) ?>">
								<label for="tipo_pokemon_2">TIPO 2: </label>
								<input type="text" name="tipo_pokemon_2" id="tipo_pokemon_2" value="<?php echo pg_fetch_result($queryTipos4, 1, 3) ?>">
								<label for="ataque_pokemon">*ATAQUE: </label>
								<input type="number" name="ataque_pokemon" id="ataque_pokemon" min="1" max="999" value="<?php echo $pokemons4->ataque ?>">
								<label for="defensa_pokemon">*DEFENSA: </label>
								<input type="number" name="defensa_pokemon" id="defensa_pokemon" min="1" max="999" value="<?php echo $pokemons4->defensa ?>">
								<label for="vida_pokemon">*VIDA: </label>
								<input type="number" name="vida_pokemon" id="vida_pokemon" min="1" max="999" value="<?php echo $pokemons4->vida ?>">
								<label for="ataque_especial">ATAQUE ESP: </label>
								<input type="number" name="ataque_especial" id="ataque_especial" min="1" max="999" value="<?php echo $pokemons4->ataque_especial ?>">
								<label for="defensa_especial">DEFENSA ESP: </label>
								<input type="number" name="defensa_especial" id="defensa_especial" min="1" max="999" value="<?php echo $pokemons4->defensa_especial ?>">
								<label for="velocidad_pokemon">VELOCIDAD: </label>
								<input type="number" name="velocidad_pokemon" id="velocidad_pokemon" min="1" max="999" value="<?php echo $pokemons4->velocidad ?>">
								<input id = "botonUpdate" type="submit" name="submit" value="CONFIRMAR">				
						</form>							
					</div>
							<div id='BotonAtaques'>
								<a href="index2.php?pokedex=<?php echo $pokedex ?>&&action=ataques"><p id="BotonAtaques" type="submit">ATAQUES</p></a>
							</div>
							<div id = 'update'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=update'><p>UPDATE</p></a>
							</div>
							<div id='delete'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=delete'><p>DELETE</p></a>
							</div>					
				<?php	
				}

				if ($pokedex && $action == 'delete') {
					$conection = pg_connect("host = localhost dbname = pokemon user = drachen password = password");
					$selectPokemon = "SELECT pokemons.id_pokedex, pokemons.nombre from pokemons where pokemons.id_pokedex = ".$pokedex." ";
					$queryPokemon = pg_query($conection,$selectPokemon);
					$pokemon = pg_fetch_object($queryPokemon);
					if($pokemon->id_pokedex < 10){
						$id = '00'.$pokemon->id_pokedex;
					}
					else if($pokemon->id_pokedex >= 10 && $pokemon->id_pokedex < 100) {
						$id = '0'.$pokemon->id_pokedex;
					}
					else{
						$id = $pokemon->id_pokedex;
					}
					$name = $pokemon->nombre;

					echo "<div class='pokedex_description'>
							<center>---DELETE---</center>
							<p id='deletePokemon'>¿Desea borrar este Pokemon?</p>
							<p id='deletePokedex'>".$id."</p><p id='deleteNombre'>".$name."</p>
							";
					echo 	"<form method='post' action='borrarPokemon.php'>
								<input type='hidden' value='".$pokedex."' name='pokedex'>
								<input id='botonEliminar' type='submit' value='ELIMINAR'>
							</form>
							</div>";		
				?>
							<div id='BotonAtaques'>
								<a href="index2.php?pokedex=<?php echo $pokedex ?>&&action=ataques"><p id="BotonAtaques" type="submit">ATAQUES</p></a>
							</div>
							<div id = 'update'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=update'><p>UPDATE</p></a>
							</div>
							<div id='delete'>
								<a href='index2.php?pokedex=<?php echo $pokedex ?>&&action=delete'><p>DELETE</p></a>
							</div>	
				<?php
				}

			?>
				
		</div>	
	</div>
	<div id="insertar">
		<a href="index2.php?action=insertar"><p>INSERT</p></a>
	</div>

</body>
<footer>
	
</footer>
</html>