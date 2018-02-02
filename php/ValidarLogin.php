<?php
error_reporting(0);
session_start();
require('conectar.php');

$user=$_POST['user'];
$pass=$_POST['pass'];
$rol=$_POST['rol'];

if ($user == null || $pass == null)
{
    echo '3';
}
else
{
    if($rol=="2"){
        $consulta = mysqli_query($mysqli, "SELECT * FROM lideres WHERE id = '$user' AND pass = '$pass'");
    }else{
        $consulta = mysqli_query($mysqli, "SELECT * FROM administradores WHERE id = '$user' AND pass = '$pass'");
    }
    
    if (mysqli_num_rows($consulta) > 0)
    {
        $f=mysqli_fetch_assoc($consulta);
        $_SESSION['id_lider']=$f['id'];
        $_SESSION['nom_lider']=$f['nombre'];
        $_SESSION['ape_lider']=$f['apellido'];
        echo '1';
    }
    else
    {       
        echo '2';
    }

    $lider= $_SESSION['nom_lider'];
}   
?>


