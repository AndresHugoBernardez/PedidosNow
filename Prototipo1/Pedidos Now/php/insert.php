<?php
include_once "logMG.php";

function insertar($tablaColumnas,$values)
{

//  ----------------------INSERT INTO
// variables para inset into: $tablaColumnas,$values
//
//
//
//
$sql = "INSERT INTO ".$tablaColumnas." VALUES ".$values;

logMG(1,$sql);

if ($GLOBALS["conn"]->query($sql) === TRUE) {

    #DEBUG
    logMG(1,"insert","Nuevo Registro Actualizado");
    
    return(1);
}
else
{
    #DEBUG
    logMG(1,"insertar","Falla al insertar Registro");
    return(0);
}

// ----------------------fin primera parte de insert into
}
?>