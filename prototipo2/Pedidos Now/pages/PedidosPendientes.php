<!DOCTYPE html>
<html lang="es">


<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Pedidos Pendientes</title>
    <script src="../js/PedidosPendientes.js"></script>
    <link rel="StyleSheet" href="../css/PedidosPendientes.css" type="text/css" media="screen" /> 
    <link rel="StyleSheet" href="../css/comun.css" type="text/css" media="screen" /> 


</head>

<body>


<header>
<div id="titulo">
<div >
    <H1>¡PEDIDOS NOW!</H1>
    
</div>

    </div>
</header>




<div>


<form method="post" id="submitPendientes" action="PedidosPendientes.php">

<input type="hidden" name="update" id="update" value=-1>
<input type="hidden" name="estado" id="estado" value=-1>

<table>
<div id="navegador">
<button id="recargar">Actualizar Datos</button>
</div>

    <tr>                
    <th>ID</th>  
    <th>NOMBRE</th>
    <th>HORA</th>  
    <th>PRECIO</th> 
    <th>PEDIDO</th>
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
 include_once "../php/actualizarDB.php";
 $GLOBALS["debugNivel"]=10;
 $GLOBALS["hacerfoco"]=false;
 
 
 $salida="interno";

/*1	Coca-cola 500cc	600
2	Empanada de carne	400
3	Choripan	1300
4	Hamburguesa	1000
5	Cono de papas fritas	800 */

function ProductoId($Producto_ID)
{
    switch ($Producto_ID)
        {
    case 1: return "Coca-Cola 500cc";
    break;
    case 2: return "Empanada de carne";
    break;
    case 3: return "Choripan";
    break;
    case 4: return "Hamburguesa";
    break;
    case 5: return "Cono de papas fritas";
    break;
    }


}


function colorFondo($ESTADOACTUAL)
{
    switch ($ESTADOACTUAL)
        {
    case 1: return "verde";
    break;
    case 2: return "amarillo";
    break;
    case 3: return "rojo";
    break;
    case 4: return "azul";
    break;
    case 5: return "gris";
    break;
    }
}


if (isset($_POST))


{

    if(isset($_POST["update"])&&isset($_POST["estado"]))
    if(($_POST["update"]>0)&&($_POST["estado"]>0))
    {

        actualizarDB("`PEDIDOS`","`ESTADO`='".$_POST["estado"]."'","`ID`='".$_POST["update"]."'");
        $GLOBALS["hacerfoco"]=true;
        
    }


}


{
    if(conectarse())
    {
    

        if(seleccionar("`ID`,`NOMBRE`,`HORA`,`PRECIO`,`ESTADO`","PEDIDOS","",""))
        {



        while($row = mysqli_fetch_row($GLOBALS["result"])) {    
        
    
        

        echo '<tr  class="fila_'.$row[4].'" >';
        echo "<td>".$row[0]."</td>";   
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";   
        echo "<td>".$row[3]."</td>";   
       
        
        echo '<td><div>';
    
    

                if(seleccionar2($salida,"`PRODUCTO_ID`,`CANTIDAD`","ORDENES","`ID`='".$row[0]."'",""))
                {



                    while($row2 = mysqli_fetch_row($GLOBALS[$salida])) {   
                    
                        
                      
                        
                        echo ' ';
                        echo $row2[1];
                        echo ' ';
                        echo ProductoId($row2[0]);
                        echo '<br>';
                    

                    
                        unset($row2);
                    }

                    cerrarSeleccion2($salida,1);  
                }    
    
            echo '</div></td>';
            



            echo '<td class="'.colorFondo($row[4]).'">';
            
        
    
            echo '<div><input type="radio" id="1_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="1" onclick="cambiarYSubmit('.$row[0].',1)"';if($row[4]==1) echo "checked";echo ' >';echo '<label for="1_ID'.$row[0].'">En espera</label>  </div>';     
            echo '<div><input type="radio" id="2_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="2" onclick="cambiarYSubmit('.$row[0].',2)"';if($row[4]==2) echo "checked";echo ' >';echo '<label for="2_ID'.$row[0].'">Preparando</label> </div>';      
            echo '<div><input type="radio" id="3_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="3" onclick="cambiarYSubmit('.$row[0].',3)"';if($row[4]==3) echo "checked";echo ' >';echo '<label for="3_ID'.$row[0].'">Listo</label>      </div>';            
            echo '<div><input type="radio" id="4_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="4" onclick="cambiarYSubmit('.$row[0].',4)"';if($row[4]==4) echo "checked";echo ' >';echo '<label for="4_ID'.$row[0].'">Pagado</label>     </div>'; 
            echo '<div><input type="radio" id="5_ID'.$row[0].'" name="estado_ID'.$row[0].'" value="5" onclick="cambiarYSubmit('.$row[0].',5)"';if($row[4]==5) echo "checked";echo ' >';echo '<label for="5_ID'.$row[0].'">Cancelado</label>  </div>';
            
            echo "</td>";  
            
            echo '</tr>';

            unset($row);
        }   
            cerrarSeleccion(1);  


        }
    desconectar();
    }
     
}






    if($GLOBALS["hacerfoco"])
    
    {

        echo '<script> document.getElementById("'.$_POST["estado"].'_ID'.$_POST["update"].'").focus();</script>';
        $GLOBALS["hacerfoco"]=false;
        
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