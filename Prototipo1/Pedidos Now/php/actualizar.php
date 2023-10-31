<?php

include_once "logMG.php";

//
function update($tabla,$settings,$where)
{

//  ----------------------INSERT INTO
// variables para inset into: $tablaColumnas,$values
//
//
//
//

$sql = "UPDATE ".$tabla." SET ".$settings." WHERE ".$where;

if ($GLOBALS["conn"]->query($sql) === TRUE) {

    #DEBUG
    logMG(1,"actualizar","logrado");
    return(1);
}
else
{
    #DEBUG
    logMG(1,"actualizar","error");
    return(0);
}

// ----------------------fin primera parte de insert into
}
?>