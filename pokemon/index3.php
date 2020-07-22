 <!DOCTYPE html>
<html>
<head>
<title>Pokemons</title>
</head>

<body>
    <div id="pokemon" style=" margin:10px; position: relative; float: left;">
        <h5 style="position: relative;">Agregar Estadisticas</h5>
        <form method="POST" action="agregarEstadisticas.php">
            <label for="id_pokedex">id_pokedex:</label><br>
            <input type="number" id="pokedex" name="id_pokedex"><br>
            <label for="vida_base"> vida_base:</label><br>
            <input type="number" id="name" name="vida_base"><br><br>
            <label for="def_base">def_base:</label><br>
            <input type="number" id="gen" name="def_base"><br><br> 
            <label for="ataq_base">ataq_base:</label><br>
            <input type="number" id="pokedex" name="ataq_base"><br>
            <label for="ataq_esp_base">ataq_esp_base :</label><br>
            <input type="number" id="name" name="ataq_esp_base"><br><br>  
            <label for="def_esp_base">def_esp_base:</label><br>
            <input type="number" id="pokedex" name="def_esp_base"><br>
            <label for="velocidad_base">velocidad_base:</label><br>
            <input type="number" id="pokedex" name="velocidad_base"><br>    
            <input type="submit" value="Submit">                  
        </form>
    </div>
        <div id="pokemon" style=" margin:10px; position: relative; float: left;">
        <h5 style="position: relative;">Agregar Efectividad</h5>
        <form method="POST" action="efectividad.php">
            <label for="codigo_tipo_ataq">codigo_tipo_ataq:</label><br>
            <input type="number" id="pokedex" name="codigo_tipo_ataq"><br>
            <label for="cod_tipo_pokemondef"> cod_tipo_pokemondef:</label><br>
            <input type="number" id="name" name="cod_tipo_pokemondef"><br><br>
            <label for="tipo_efectividad">tipo_efectividad:</label><br>
            <input type="text" id="gen" name="tipo_efectividad"><br><br>   
            <input type="submit" value="Submit">                  
        </form>
    </div>
   <footer style="position: relative; float: left; clear: left;">  
    <a href="index2.php"><h2>ANTERIOR</h2></a><br>
           
</footer>
</body>

</html> 