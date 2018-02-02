<?php
    error_reporting(0);
    session_start();
    $id=$_POST['id'];	
    require("conectar.php");
    mysqli_query($mysqli,"DELETE FROM votantes WHERE id='$id'");  
?>