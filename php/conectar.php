<?php


		//tipo de servidor 1 = Local ...  tipo de servidor 2 = Red
		
		
		
			/*$server="sql101.888webhost.com";
			$user="888we_20557225";
			$pass="201092";
			$database="888we_20557225_rle_user";
		*/
			$server="localhost";
        	$user="root";
    	    $pass="";
	        $database="registro";
		
		
        
        $mysqli = new MySQLi($server,$user,$pass,$database);
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		

?>