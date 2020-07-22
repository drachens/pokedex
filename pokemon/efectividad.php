<?php
    $codigo_tipo_ataq=$_POST["codigo_tipo_ataq"];
    $cod_tipo_pokemondef=$_POST["cod_tipo_pokemondef"];
    $tipo_efectividad=$_POST["tipo_efectividad"];
    $conexion = pg_connect("host=localhost dbname=pokemon user=drachen password=password");
    // Create connection
    $sql = "INSERT INTO efectividad_ataque VALUES($codigo_tipo_ataq,$cod_tipo_pokemondef,'$tipo_efectividad')"; 
    $results = pg_query($conexion,$sql);
    header('Location: index3.php');
?>