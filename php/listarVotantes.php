<?php
            error_reporting(0);
            session_start();
            $i=$_POST['i'];
            $valor=$_POST['valor'];

            $lider=$_SESSION['id_lider'];
            
            if($i==0){                
                $sql="SELECT * FROM votantes WHERE id_lider='$lider' ORDER BY nombre ASC";
            }
            else{
                $sql="SELECT * FROM votantes WHERE id_lider='$lider'  AND id LIKE '%".$valor."%' ORDER BY id ASC";
            }
            require ('conectar.php');
            //consulta todos los empleados
            $sql=mysqli_query($mysqli,"$sql");
            $sum=0;

           echo "<thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>                            
                        <th></th>
                        <th></th>
                    </tr>
                 </thead>

                 <tbody>";
            
            while($row = mysqli_fetch_array($sql)){
            echo "<tr>";
                echo "    <td>".$row['id']."</td>";
                echo "    <td>".$row['nombre']."</td>";                
                echo "    <td>".$row['apellido']."</td>";  
                echo "    <td>".'<a class="btEditar" href="#!"><i class="material-icons">sync</i></a>'."</td>";      
                echo "    <td>".'<a class="btEliminar" href="#! "><i class="material-icons red-text">delete_forever</i></a>'."</td>";     
            echo "</tr>";
            }

            echo "</tbody>";       

?>