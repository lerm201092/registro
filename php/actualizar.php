<?php
    error_reporting(0);
    session_start();
    $id=$_POST['id'];	
    $nom=$_POST['nombre'];	
    $ape=$_POST['apellido'];
    $tel=$_POST['telefono'];	
    $ema=$_POST['email'];
    $dir=$_POST['direccion'];
    $bar=$_POST['barrio'];
    $ciu=$_POST['ciudad'];
    $lid=$_SESSION['id_lider'];
    require("conectar.php");
    mysqli_query($mysqli,"UPDATE votantes SET nombre='$nom', apellido='$ape', telefono='$tel', email='$ema', direccion='$dir',barrio='$bar', ciudad='$ciu' WHERE id='$id' ");  
?>