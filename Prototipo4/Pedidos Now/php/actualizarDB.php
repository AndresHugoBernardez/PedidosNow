<?php

include_once "logMG.php";
include_once "conectar.php";
include_once "conectarfin.php";
include_once "actualizar.php";



function actualizarDB($tabla,$settings,$where)
{




    if(conectarse()==1)
    {
        if(update($tabla,$settings,$where))
            {
            #DEBUG
            logMG(2,"actualizarDB","Elemento actualizados");
            
            } 
        else
        {
            #DEBUG
            logMG(2,"actualizarDB","Problema al actualizar elemento");
            
        }

        desconectar();
    }

}
/*


// PRUEBA:

    $GLOBALS["debugNivel"]=1;
    $randomNumber=rand(1000,99999);
    $tabla="`login`";
    $settings="`sessionpassword`='".$randomNumber."'";
    $where="`id`=1";
    actualizarDB($tabla,$settings,$where);*/
?>