
<?php
include_once "logMG.php";
function desconectar()
{
///-----------------CERRAR CONEXIÓN


$GLOBALS["conn"]->close();

#DEBUG
logMG(1,"desconectar","ok");

}

///------------------fin cerrar conexión
?>

