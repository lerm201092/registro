<?php   
    require("conectar.php");
    $sql =" SELECT barrio,COUNT(*) AS CANT 
            FROM votantes
            WHERE ciudad='Barranquilla'
            GROUP BY barrio
            ORDER BY CANT DESC
            LIMIT 5";
    $sql2=mysqli_query($mysqli,"$sql");
	
    echo "<thead>
            <tr>
                <th>Barrio</th>
                <th>Cantidad</th>                
            </tr>
        </thead>

    <tbody>";
$i=1;
    while($row = mysqli_fetch_array($sql2)){
    echo "<tr>";
    echo "  <td id='tdb1".$i."'>".$row['barrio']."</td>";
    echo "  <td id='tdb2".$i."'>".$row['CANT']."</td>";
    echo "</tr>";
    $i+=1;
    }

echo "</tbody>";   

?>