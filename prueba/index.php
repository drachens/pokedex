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
        <input type="number" name="gen"><br><br>
 
	 <input type="submit" value="Submit">
        </form>
    </div>
    <div style="position: relative; float: left; margin: 10px;">
        <h5 style="position: relative;">Agregar Tipo</h5>
          <form method="POST" action="agregarTipo.php">
          <label for="codigo_tipo">Codigo tipo:</label><br>
          <input type="number" id="codigo_tipo" name="codigo_tipo"><br>
          <label for="name_tipo">Nombre Tipo:</label><br>
          <input type="text" id="name_tipo" name="name_tipo"><br><br>
          <input type="submit" value="Submit">
        </form>
    </div>
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Pokemon-Tipo</h5>
          <form method="POST" action="UnirPokemonTipo.php">
          <label for="pokedex">Pokedex:</label><br>
          <input type="number" id="pokedex" name="pokedex"><br>
          <label for="name_tipo">Nombre Tipo:</label><br>
          <input type="text" id="name_tipo" name="name_tipo"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div> 
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Habilidad</h5>
          <form method="POST" action="AgregarHabilidad.php">
          <label for="id_habilidad">Codigo Habilidad:</label><br>
          <input type="number" id="habilidad" name="id_habilidad"><br>
          <label for="nombre">Nombre Habilidad:</label><br>
          <input type="text" id="name" name="nombre"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div> 
    <div style="position: relative; float: left; margin: 10px;">
          <h5 style="position: relative;">Agregar Habilidad-Pokemon</h5>
          <form method="POST" action="AgregarHabilidadPokemon.php">
          <label for="pokedex">Pokedex:</label><br>
          <input type="number" id="habilidad" name="pokedex"><br>
          <label for="nombre">Nombre Habilidad:</label><br>
          <input type="text" id="name" name="nombre"><br><br>
          <input type="submit" value="Submit">
        </form>        
    </div>  
   <footer style="position: relative; float: left; clear: left;">  
    <a href="index2.php"><h2>SIGUIENTE</h2></a>          
</footer>
</body>

</html> 

