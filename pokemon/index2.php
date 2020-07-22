 <!DOCTYPE html>
<html>
<head>
<title>Pokemons</title>
</head>

<body>
    <div id="pokemon" style=" margin:10px; position: relative; float: left;">
        <h5 style="position: relative;">Agregar Movimiento</h5>
        <form method="POST" action="agregarMovimiento.php">
            <label for="nombre">nombre:</label><br>
            <input type="text" id="pokedex" name="nombre"><br>
            <label for="cod_tipo"> cod_tipo:</label><br>
	 		      <input type="number" id="name" name="cod_tipo"><br><br>
            <label for="potencia">potencia:</label><br>
            <input type="number" id="gen" name="potencia"><br><br> 
            <label for="precision">precision:</label><br>
            <input type="number" id="pokedex" name="precision"><br>
            <label for="pp">pp :</label><br>
            <input type="number" id="name" name="pp"><br><br>      
            <input type="submit" value="Submit">                  
        </form>
    </div>
        <div id="pokemon" style=" margin:10px; position: relative; float: left;">
        <h5 style="position: relative;">movimientos-pokemon</h5>
        <form method="POST" action="movimiento_pokemon.php">
            <label for="id_pokedex">id_pokedex:</label><br>
            <input type="number" id="pokedex" name="id_pokedex"><br>
            <label for="id_movimiento"> id_movimiento:</label><br>
            <input type="number" id="name" name="id_movimiento"><br><br>
            <label for="nvl_obtencion">nvl_obtencion:</label><br>
            <input type="number" id="gen" name="nvl_obtencion"><br><br>       
            <input type="submit" value="Submit">                  
        </form>
    </div>
   <footer style="position: relative; float: left; clear: left;">  
    <a href="index.php"><h2>ANTERIOR</h2></a><br>
    <a href="index3.php"><h2>SIGUIENTE</h2></a>        
</footer>
</body>

</html> 
