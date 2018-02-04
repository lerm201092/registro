<?php
    error_reporting(0);
    session_start();
    $id=$_POST['id'];	
    $nom=$_POST['nombre'];	
    $ape=$_POST['apellido'];
    $tel=$_POST['telefono'];	
    $ema=$_POST['email'];
    $dir=$_POST['direccion'];
    $ciu=$_POST['ciudad'];
    $bar=$_POST['barrio'];
    $lid=$_SESSION['id_lider'];
    require("conectar.php");
    $sql ="SELECT * FROM votantes WHERE id='$id' ";
    $sql2=mysqli_query($mysqli,"$sql");
	if($f2=mysqli_fetch_assoc($sql2)){
		echo "0";
    }
    else{
        mysqli_query($mysqli,"INSERT INTO votantes VALUES('$id','$nom','$ape','$dir','$bar','$ciu','$tel','$ema','$lid')");
    }


      
?>