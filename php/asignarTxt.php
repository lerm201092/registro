<?php

	$id= $_POST['id'];
	require("conectar.php");

    $consulta ="SELECT * FROM votantes WHERE id='$id'";
    $sql2=mysqli_query($mysqli,$consulta);
	if($f2=mysqli_fetch_assoc($sql2)) {
        
		$ar["nombre"]       = $f2['nombre'];	
	    $ar["apellido"]           = $f2['apellido'];
	    $ar["id"]     = $f2['id'];
        $ar["telefono"]        = $f2['telefono'];	
        $ar["email"]           = $f2['email'];
        $ar["direccion"]     = $f2['direccion'];
        $ar["barrio"]     = $f2['barrio'];
        $ar["ciudad"]        = $f2['ciudad'];	
    }
    $dato_json   = json_encode($ar);
    echo $dato_json;

?>