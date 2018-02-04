<?php   
    require("conectar.php");
    $sql =" SELECT ciudad,COUNT(*) AS CANT FROM votantes
            GROUP BY ciudad
            ORDER BY CANT DESC 
            LIMIT 4";
    $sql2=mysqli_query($mysqli,"$sql");
	
    echo "<thead>
            <tr>
                <th>Ciudad</th>
                <th>Cantidad</th>                
            </tr>
        </thead>

    <tbody>";
$i=1;
    while($row = mysqli_fetch_array($sql2)){
    echo "<tr>";
    echo "  <td id='td1".$i."'>".$row['ciudad']."</td>";
    echo "  <td id='td2".$i."'>".$row['CANT']."</td>";
    echo "</tr>";
    $i+=1;
    }

echo "</tbody>";   

?>