<?php
function cerrarSeleccion($exito)
{
//-----------------------------------------FIN Select
        
        if($exito)
        {

          // Free result set
                mysqli_free_result($GLOBALS["result"]);


        }
         else {
          


          

        }

}

function cerrarSeleccion2($salida,$exito)
{
//-----------------------------------------FIN Select
        
        if($exito)
        {

          // Free result set
                mysqli_free_result($GLOBALS[$salida]);


        }
         else {
          


          

        }

}
///  ---------------------FIN SELECT TOTAL
?>