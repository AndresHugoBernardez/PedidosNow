<?php

//   logMG
//
//    En programa principal elegir $GLOBALS["debugNivel"]  (int)
//
//    
//

/*

    #DEBUG
    logMG(1,"probando");

*/
//


function logMG($Nivel,$log="",$variable1="",$variable2="",$variable3="",$variable4="",$variable5="",$variable6="")
{

    if (isset($GLOBALS["debugNivel"]))
        if (($GLOBALS["debugNivel"]) <= $Nivel)
        {

 

            echo "<p> LOG:".$log.":";
            
            if($variable1!="")
            {
                echo " v1:".$variable1;
            }
            if($variable2!="")
            {
                echo " v2:".$variable2;
            }
            
            
            if($variable3!="")
            {
                echo " v3:".$variable3;
            }
            
            if($variable4!="")
            {
                echo " v4:".$variable4;
            }
            if($variable5!="")
            {
                echo " v5:".$variable5;
            }
            if($variable6!="")
            {
                echo " v6:".$variable6;
            }
            


            echo "</p>";


    }
/*
    unset($log);
    unset($variable1);
    unset($variable2);
    unset($variable3);
    unset($variable4);
    unset($variable5);
    unset($variable6);*/
}




?>