<?php 
session_start();
if($_SESSION['id_lider']){	
	session_destroy();
	header("location:../index.php");
}
?>