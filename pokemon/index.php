<?php
	
	$conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
	
	if($conexion){
		echo "TODO OKEI BRO :)";
	}
	else{
		echo "QUE PASO BRO?";
	}

?>
 <!DOCTYPE html>
<html>
<head>
<title>Pokemons</title>
</head>

<body>
    <div id="pokemon" style=" margin:10px; position: relative; float: left;">
        <h5 style="position: relative;">Agregar Pokemon</h5>
        <form method="POST" action="agregarPokemon.php">
        	<label for="pokedex">Pokedex:</label><br>
        	<input type="number" id="pokedex" name="pokedex"><br>
	  		<label for="name">Nombre Pokemon:</label><br>
	 		<input type="text" id="name" name="name"><br><br>
	        <label for="gen">Generacion:</label><br>
        <input type="number" id="gen" name="gen"><br><br>
 
	 <input type="submit" value="Submit">
        </form>
    </div>
    <div style="position: relative; float: left; margin: 10px;">
        <h5 style="position: relative;">Agregar Tipo</h5>
          <form method="POST" action="agregarTipo.php">
          <label for="name_tipo">Nombre Tipo:</label><br>
          <input type="text" id="name_tipo" name="name_tipo"><br><br>
          <input type="submit" value="Submit">
        </form>
    </div>
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Pokemon-Tipo</h5>
          <form method="POST" action="tipo_pokemon.php">
          <label for="pokedex">Pokedex:</label><br>
          <input type="number" id="pokedex" name="pokedex"><br>
          <label for="cod_tipo">Cod Tipo:</label><br>
          <input type="number" id="name_tipo" name="cod_tipo"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div> 
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Habilidad</h5>
          <form method="POST" action="agregarHabilidad.php">
          <label for="agregar_habilidad">Nombre Habilidad:</label><br>
          <input type="text" id="name" name="agregar_habilidad"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div> 
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Habilidad-Pokemon</h5>
          <form method="POST" action="habilidad_tipo.php">
          <label for="id_pokedex">Pokedex:</label><br>
          <input type="number" id="habilidad" name="id_pokedex"><br>
          <label for="id_habilidad">codigo Habilidad:</label><br>
          <input type="number" id="name" name="id_habilidad"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div>  
   <footer style="position: relative; float: left; clear: left;">  
    <a href="index2.php"><h2>SIGUIENTE</h2></a>          
</footer>
</body>

</html> 
