<!DOCTYPE html>
<html lang="es">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <title>¡Pedidos Now!</title>

    <script src="../js/pedir.js"></script>

    <link rel="StyleSheet" href="../css/pedir.css" type="text/css" media="screen" />
    <link rel="StyleSheet" href="../css/comun.css" type="text/css" media="screen" /> 

</head>

<body>





<div id="pantallaInicial"><div>




    <br>
    <br>
    <h1> ¡PEDIDOS NOW!</h1>
    <br>
    <br>

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
 
 
 



if (isset($_POST))
{
    if(isset($_POST["nombre"]))
    {
        if(isset($_POST["hamburguesa"])
         &&isset($_POST["coca"       ])
         &&isset($_POST["papas"      ])
         &&isset($_POST["empanada"   ])
         &&isset($_POST["choripan"   ])
        
        )
        
            if(($_POST["hamburguesa"]<11)
            && ($_POST["coca"       ]<11)
            && ($_POST["papas"      ]<11)
            && ($_POST["empanada"   ]<11)
            && ($_POST["choripan"   ]<11)
            )

            if(($_POST["hamburguesa"]>0)
             ||($_POST["coca"       ]>0)
             ||($_POST["papas"      ]>0)
             ||($_POST["empanada"   ]>0)
             ||($_POST["choripan"   ]>0)
            )
         {       
        $cadena="";
        

        conectarse();

        $nuevoID=0;
        if(seleccionar("","","","SELECT `ID` FROM `PEDIDOS` ORDER BY ID DESC"))
        {
        $row=mysqli_fetch_row($GLOBALS["result"]);
        $nuevoID=$row[0]+1;

        unset($row);
        cerrarSeleccion(1);    
        }
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $FECHA=date("d/m/Y H:i:s");
        
        $PRECIOAPAGAR=-1;
        if(isset($_POST["Ptotal"]))$PRECIOAPAGAR=$_POST["Ptotal"];
         
            
        insertar("`PEDIDOS`(`ID`,`NOMBRE`,`HORA`,`PRECIO`,`ESTADO`)","('".$nuevoID."','".$_POST["nombre"]."','".$FECHA."','".$PRECIOAPAGAR."','1')");
/*1	Coca-cola 500cc	600
2	Empanada de carne	400
3	Choripan	1300
4	Hamburguesa	1000
5	Cono de papas fritas	800 */
        if($_POST["hamburguesa"]>0) insertar("`ORDENES`(`ID`, `PRODUCTO_ID`, `CANTIDAD`)"," ('".$nuevoID."','4','".$_POST["hamburguesa"]."')");
        if($_POST["coca"       ]>0) insertar("`ORDENES`(`ID`, `PRODUCTO_ID`, `CANTIDAD`)"," ('".$nuevoID."','1','".$_POST["coca"       ]."')");
        if($_POST["papas"      ]>0) insertar("`ORDENES`(`ID`, `PRODUCTO_ID`, `CANTIDAD`)"," ('".$nuevoID."','5','".$_POST["papas"      ]."')");
        if($_POST["empanada"   ]>0) insertar("`ORDENES`(`ID`, `PRODUCTO_ID`, `CANTIDAD`)"," ('".$nuevoID."','2','".$_POST["empanada"   ]."')");
        if($_POST["choripan"   ]>0) insertar("`ORDENES`(`ID`, `PRODUCTO_ID`, `CANTIDAD`)"," ('".$nuevoID."','3','".$_POST["choripan"   ]."')");

        desconectar();

            echo "<h2> Su número de orden es <b>".$nuevoID."</b></h2><br><br>";

        }    



        



    }
}


/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
/************************************************************************************
 */
?>


</div>    
</div>

<header>
<div id="titulo">
<div >
    <H1>¡PEDIDOS NOW!</H1>
    
</div>

    </div>
</header>

<div>

<form method="post" id="submitForm" action="pedir.php">


<br>
<div id="BarraPedir">
<h3>Nombre: </h3>


<input type="text" id="nombre" name="nombre" required > 
<input type="text" class="preciototal" id="Ptotal" name="Ptotal" value=0>

<input type="button" id="pedirnow" value="ordenar" ><br><br>
</div>
<div class="item"><input type="number" name="hamburguesa" id="hamburguesa" min="0" max="10" step="1" value="0" required><div class="alpha">Hamburguesa -----$   <input type="text" class="precioscaja"    name="Phamburguesa"    id="Phamburguesa"    value="1000"    readonly ></div> <img src="../img/hamburguesa.png">    </div> <br>
<div class="item"><input type="number" name="coca"        id="coca"        min="0" max="10" step="1" value="0" required><div class="alpha">Coca -----$          <input type="text" class="precioscaja"    name="Pcoca"           id="Pcoca"           value="600"     readonly ></div> <img src="../img/coca.jpg">           </div><br>
<div class="item"><input type="number" name="papas"       id="papas"       min="0" max="10" step="1" value="0" required><div class="alpha">Papas -----$         <input type="text" class="precioscaja"    name="Ppapas"          id="Ppapas"          value="1500"    readonly ></div> <img src="../img/papas.png">          </div><br>
<div class="item"><input type="number" name="empanada"    id="empanada"    min="0" max="10" step="1" value="0" required><div class="alpha">Empanada -----$      <input type="text" class="precioscaja"    name="Pempanada"       id="Pempanada"       value="500"     readonly ></div> <img src="../img/empanada.png">       </div><br>
<div class="item"><input type="number" name="choripan"    id="choripan"    min="0" max="10" step="1" value="0" required><div class="alpha">Choripan -----$      <input type="text" class="precioscaja"    name="Pchoripan"       id="Pchoripan"       value="1800"    readonly ></div> <img src="../img/choripan.jpeg">      </div><br>

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