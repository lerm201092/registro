<?php   
    require("conectar.php");
    $sql ="SELECT COUNT(*) FROM votantes ";
    $sql2=mysqli_query($mysqli,"$sql");
	if($f2=mysqli_fetch_assoc($sql2)){
		echo $f2['COUNT(*)'];
    }
?>