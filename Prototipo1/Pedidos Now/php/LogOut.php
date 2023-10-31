<?php

include_once "logMG.php";
include_once "conectar.php";
include_once "conectarfin.php";
include_once "actualizar.php";


function logout()
{
    $returnFLAG=0;

//FASE: cambiar sessionpassword

    
    if (isset($_SESSION["id"]))
    {
    if(conectarse())
    {

            

            
                //FASE: Actualizar sessionpassword

                $randomNumber=rand(1000,99999);
                $tabla="`login`";
                $settings="`sessionpassword`='".$randomNumber."'";
                $where="`id`=".$_SESSION["id"];

                if(update($tabla,$settings,$where))
                {

                    //FASE: destruir $_SESSION
                    session_destroy();
                    

                    #DEBUG
                    logMG(1,"LogOut","usuario deslogueado");

                    #SALIDA
                    echo "|usuario deslogeado|";
                    $returnFLAG=1;
                }
                else
                {
                    #DEBUG
                    logMG(1,"logout","|>error en UPDATE<|");
                    $returnFLAG=0;
                    
                }


     

    


    desconectar();
    }


    }
    else
    {
        #DEBUG
        logMG(1,"LogOut","No hay usuario conectado");
    }
    return($returnFLAG);
}


function logoutconected()
{
    $returnFLAG=0;

//FASE: cambiar sessionpassword

    
    if (isset($_SESSION["id"]))
    {


            

            
                //FASE: Actualizar sessionpassword

                $randomNumber=rand(1000,99999);
                $tabla="`login`";
                $settings="`sessionpassword`='".$randomNumber."'";
                $where="`id`=".$_SESSION["id"];

                if(update($tabla,$settings,$where))
                {

                    //FASE: destruir $_SESSION
                    session_destroy();
                    

                    #DEBUG
                    logMG(1,"LogOut","usuario deslogueado");

                    #SALIDA
                    echo "|usuario deslogeado|";
                    $returnFLAG=1;
                }
                else
                {
                    #DEBUG
                    logMG(1,"logout","|>error en UPDATE<|");
                    $returnFLAG=0;
                    
                }


     

    


   


    }
    else
    {
        #DEBUG
        logMG(1,"LogOut","No hay usuario conectado");
    }
    return($returnFLAG);
}

/*session_start();


//ejemplo


$GLOBALS["debugNivel"]=1;
logout();*/

?>