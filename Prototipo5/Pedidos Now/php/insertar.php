
<?php

include_once "logMG.php";
include_once "conectar.php";
include_once "conectarfin.php";
include_once "insert.php";



function insertarDB($tablaColumnas,$values)
{
$Flag_return=0;

$connected=conectarse();

    if($connected)
    {
        if(insertar($tablaColumnas,$values))
            {
            #DEBUG
            logMG(2,"insertar","Nuevo Registro Insertado");
            $Flag_return=1;
            } 
        else
        {
            #DEBUG
            logMG(2,"insertar","Falla al insertar nuevo Registro");
            $Flag_return=0;
        }

        desconectar();
    }

    return ($Flag_return);
}

    PRUEBA:
    $GLOBALS["debugNivel"]=1;
    $tablaColumnas=" `login`(`id`,`usuario`,`password`,`sessionpassword`)";
    $values="('12','laurita','789789','44444')";
    insertarDB($tablaColumnas,$values);

?>
