
<?php


//-------------------------SELECT INICIO
// VARIABLES PARA SELECT       $columnas,$tabla,$where
//
//
// atencion la variable $GLOBALS["result"] debe cerrarse luego de esta función con mysqli_free_result($GLOBALS["result"]);
//          esta función no la cierra debe hacerse manualmento con la función cerrarSeleccion($exito) de selectfin.php
//

    //-----------------------------------------SEPARADOR

include_once "logMG.php";



function seleccionar($columnas,$tabla,$where="",$SQL="")
{
  if($SQL=="")
  {
        
        if($where=='')
        {
        $sql = "SELECT ".$columnas." FROM ".$tabla;
        }
        else
        {
          $sql = "SELECT ".$columnas." FROM ".$tabla." where ".$where;
        }
      }
  else
  {
    $sql=$SQL;
  }

        #DEBUG
        logMG(1,"select",$sql);
        

        $GLOBALS["result"] = mysqli_query($GLOBALS["conn"],$sql);

        if($GLOBALS["result"])       
        {
        if (mysqli_num_rows($GLOBALS["result"]) > 0) {

          #DEBUG
          logMG(1,"select","select exitoso");
          
          return(1);
        }
        else
        {
          #DEBUG
          logMG(1,"select","error 098");
          mysqli_free_result($GLOBALS["result"]);
          return(0);
        }
        }
        else 
        {
          #DEBUG
          logMG(1,"select","error 079: NO result");
          return (0);
        }


}




function seleccionar2($salida,$columnas,$tabla,$where="",$SQL="")
{
  if($SQL=="")
  {
        
        if($where=='')
        {
        $sql = "SELECT ".$columnas." FROM ".$tabla;
        }
        else
        {
          $sql = "SELECT ".$columnas." FROM ".$tabla." where ".$where;
        }
      }
  else
  {
    $sql=$SQL;
  }

        #DEBUG
        logMG(1,"select",$sql);
        

        $GLOBALS[$salida] = mysqli_query($GLOBALS["conn"],$sql);

        if($GLOBALS[$salida])       
        {
        if (mysqli_num_rows($GLOBALS[$salida]) > 0) {

          #DEBUG
          logMG(1,"select","select exitoso");
          
          return(1);
        }
        else
        {
          #DEBUG
          logMG(1,"select","error 098");
          mysqli_free_result($GLOBALS[$salida]);
          return(0);
        }
        }
        else 
        {
          #DEBUG
          logMG(1,"select","error 079: NO result");
          return (0);
        }


}
/*
          // cada valor
while($row = mysqli_fetch_row($GLOBALS["result"])) {
  echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
}




        // Buscar un único valor
        mysqli_data_seek($GLOBALS["result"],14);

        // Fetch row
        $row=mysqli_fetch_row($GLOBALS["result"]);

        //printf ("Lastname: %s Age: %s\n", $row[0], $row[1]);


       */



///  -------------FIN SELECT primera parte
?>