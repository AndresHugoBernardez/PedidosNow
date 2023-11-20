<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>Tablero Now!</title>
    <script src="../js/Tablero.js"></script>
    <link rel="StyleSheet" href="../css/Tablero.css" type="text/css" media="screen" /> 
    <link rel="StyleSheet" href="../css/comun.css" type="text/css" media="screen" /> 

</head>

<body>


<header>
<div id="titulo">
<div >
    <H1 class="titulo2">¡PEDIDOS NOW!</H1>
    
</div>
<img class="logo" src="../img/logo.png"> 
    </div>
</header>




<div>




<table>


    <tr>                
    <th>NUMERO</th>  
    <th>NOMBRE</th>
    

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
 include_once "../php/select.php";
 include_once "../php/selectfin.php";

 $GLOBALS["debugNivel"]=10;
 
 
 

{
    if(conectarse())
    {
    

        if(seleccionar("`ID`,`NOMBRE`","PEDIDOS","`ESTADO`='3'",""))
        {



        while($row = mysqli_fetch_row($GLOBALS["result"])) {    
        
    
        

        echo '<tr >';
        echo "<td>".$row[0]."</td>";   
        echo "<td>".$row[1]."</td>";
        
       
        

            unset($row);
        }   
            cerrarSeleccion(1);  


        }
    desconectar();
    }
     
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





</div>
<footer>

</footer>
</body>
</html>