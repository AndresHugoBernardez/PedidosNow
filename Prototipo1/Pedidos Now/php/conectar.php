<?php

include_once "logMG.php";
$GLOBALS["conn"]=null;



function conectarse()
{
//---------------------crear conexión


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pedidosnowdb";

// Create connection


$GLOBALS["conn"] = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($GLOBALS["conn"]->connect_error) {
    die("Connection failed: " . $GLOBALS["conn"]->connect_error);


    #DEBUG
    logMG(1,"conectarse","Conexión fallida",$GLOBALS["conn"]->connect_error);

   
    return(0);
  }

  else
  {
    #DEBUG
    logMG(1,"conectarse","|conectado!!!|");
    return(1);
  }
}
//-------------------------crear conexión fin
?>