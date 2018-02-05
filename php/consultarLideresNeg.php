<?php   
    require("conectar.php");
    $sql =" SELECT lideres.nombre AS nombre, COUNT(*) AS CANT FROM votantes,lideres
            WHERE lideres.id=votantes.id_lider 
            GROUP BY lideres.nombre
            ORDER BY CANT ASC 
            LIMIT 5";
    $sql2=mysqli_query($mysqli,"$sql");
	
    echo "<thead>
            <tr>
                <th>Nombres</th>
                <th>Cantidad</th>                
            </tr>
        </thead>

    <tbody>";

    while($row = mysqli_fetch_array($sql2)){
    echo "<tr>";
    echo "  <td>".$row['nombre']."</td>";
    echo "  <td>".$row['CANT']."</td>";
    echo "</tr>";
    }

echo "</tbody>";   

?>