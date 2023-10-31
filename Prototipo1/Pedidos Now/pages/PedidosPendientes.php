<html>

<head>
    
    <script src="../js/pedir.js"></script>

    <!--- <link rel="StyleSheet" href="../css/pedir.css" type="text/css" media="screen" /> -->


</head>

<body>


<header>

    <H1>¡PEDIDOS NOW!</H1>
</header>


<div>


<form method="post" id="submitPendientes" action="PedidosPendientes.php">

<table>

    <tr>                
    <th>ID</th>  
    <th>NOMBRE</th>
    <th>HORA</th>  
    <th>PRECIO</th> 
    <th>ESTADO</th>
    </tr>           

<?PHP
/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
 */

 include_once "../php/conectar.php";
 include_once "../php/conectarfin.php";
 include_once "../php/insert.php";
 include_once "../php/select.php";
 include_once "../php/selectfin.php";
 $GLOBALS["debugNivel"]=10;
 
 
 $salida="interno";






/*if (isset($_POST))*/
{
    conectarse();

        if(seleccionar("`ID`,`NOMBRE`,`HORA`,`PRECIO`,`ESTADO`","PEDIDOS","",""))
        {



        while($row = mysqli_fetch_row($GLOBALS["result"])) {    
        
    
        

        echo '<tr  class="fila_'.$row[4].'" >';
        echo "<td>".$row[0]."</td>";   
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";   
        echo "<td>".$row[3]."</td>";   
        echo "<td>";
        
        
    
        echo '<input type="radio" id="1_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="1" ';if($row[4]==1) echo "checked";echo ' >';echo '<label for="1_ID">En espera</label>  ';     
        echo '<input type="radio" id="2_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="2" ';if($row[4]==2) echo "checked";echo ' >';echo '<label for="2_ID">Preparando</label> ';      
        echo '<input type="radio" id="3_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="3" ';if($row[4]==3) echo "checked";echo ' >';echo '<label for="3_ID">Listo</label>      ';            
        echo '<input type="radio" id="3_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="4" ';if($row[4]==4) echo "checked";echo ' >';echo '<label for="4_ID">Pagado</label>     '; 
        echo '<input type="radio" id="4_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="5" ';if($row[4]==5) echo "checked";echo ' >';echo '<label for="5_ID">Cancelado</label>  ';
        
        echo "</td";    
        echo "</tr>"; 
    
    

                if(seleccionar2($salida,"`PRODUCTO_ID`,`CANTIDAD`","ORDENES","`ID`='".$row[0]."'",""))
                {



                    while($row2 = mysqli_fetch_row($GLOBALS[$salida])) {   
                    
                        
                        echo '<tr>';
                        echo '<td colspan="5">';
                        echo '<p> asdfasdfsadfasdfasdfasdfasdf';
                        echo $row2[0];
                        echo ' ';
                        echo $row2[1];
                        echo '</p>';
                        echo '</td>';
                        echo '</tr>';


                    
                        unset($row);
                    }

                    cerrarSeleccion2($salida,1);  
                }    
    
            unset($row);
        }   
            cerrarSeleccion(1);  


        }
        desconectar();
}


/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
 */


?>


</table>
</div>




<!----
/*
1	Coca-cola 500cc	600
2	Empanada de carne	400
3	Choripan	1300
4	Hamburguesa	1000
5	Cono de papas fritas	800
*/
-->

</form>




</div>
<footer>
    <p> Esqueleto de proyecto para escuela técnica. Esta página sin CSS es un prototipo del diseño final.</p>
    <br>
    <p> Hecho por Andrés Hugo Bernárdez Octubre 2023</p>
    <br>
    <br>
</footer>
</body>
</html>