<?php
if (!isset($_SESSION))session_start();



include_once "conectar.php";
include_once "conectarfin.php";
include_once "select.php";
include_once "selectfin.php";


?>


<form action="index.php" method="post">

<input class="inputprincipales" type="submit" name="listarUsuarios" value="Mostrar Usuarios" >
<input class="inputprincipales" type="submit" name="listarEntidades" value="Mostrar Frutas">
</form>

<?php


if(isset($_SESSION["accion"]))
{
    #DEBUG
    logMG(6,"mostrar:SESSION","paso 1<br>");
    
    
    switch($_SESSION["accion"])
    {
        case "mostrarGustadores":
            #DEBUG
            logMG(6,"mostrar:SESSION","paso 2<br>");
            if (isset($_SESSION["idaccion"]))
            {
                mostrarGustadores($_SESSION["idaccion"]);
            }
            break;

        case "mostrarperfil":
            #DEBUG
            logMG(6,"mostrar:SESSION","paso 3<br>");
            if (isset($_SESSION["idaccion"]))
            {
                mostrarperfil($_SESSION["idaccion"]);
            }
            break;
        case "listarUsuarios":
            #DEBUG
            logMG(6,"mostrar:SESSION","paso 4<br>");
            
            listarUsuarios();
            break;
        case "listarEntidades":
            #DEBUG
            logMG(6,"mostrar:SESSION","paso 5<br>");
            listarEntidades();
            break;
    }
    

    unset($_SESSION["accion"]);
    unset($_SESSION["idaccion"]);

}


function mostrarperfil($id)

{
    $flag=0;
    if(conectarse())
    {


        $columnas="`usuario`";
        $tabla="`login`";
        $where="`id`=".$id;
        if(seleccionar($columnas,$tabla,$where))
        {

            $row = mysqli_fetch_row($GLOBALS["result"]);
                

                #SALIDA
                echo "<br><h1>".$row[0]."</h1><br>";
                
                unset($row);

              

            $flag=1;
            cerrarSeleccion(1);
        }else
        {
            $flag=0;
        }
        
        $SQL="SELECT `megusta`.`idente`,`entidad` FROM `megusta`,`entidades` WHERE `entidades`.`idente`=`megusta`.`idente` and `megusta`.`id`=".$id;

        if($flag){
        if(seleccionar("","","",$SQL))
        {
            #SALIDA
            echo "<p>Le gusta: </p>";

            echo '<form action="index.php" method="post">';
            echo '<input type="hidden" name="tipodeaccion" value="mostrarGustadores">';
            while($row = mysqli_fetch_row($GLOBALS["result"])) {
                

                #DEBUG
                logMG(7,"mostrar:perfil",$row[0],$row[1]);

                #SALIDA
                echo '<input class="submitopciones" type="submit" name="'.$row[0].'" value="'.$row[1].'"> <br>';

                unset($row);

              }
              echo '</form>';

            cerrarSeleccion(1);
        }
        else
        {
            #SALIDA
            echo "<p>Al usuario no le gusta nada aún.</p>";
        }

        }
        else
        {
            #DEBUG
            logMG(6,"mostrarperfil","USUARIO NO ENCONTRADO");
        }

        desconectar();
    }
}


    function listarUsuarios()
    {


        if(conectarse())
        {


            $columnas="`id`,`usuario`";
            $tabla="`login`";
            
            if(seleccionar($columnas,$tabla))
            {
                #SALIDA
                echo "<br> <h1>Usuarios:</h1><br>";

                echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="tipodeaccion" value="mostrarperfil">';
                
                while($row = mysqli_fetch_row($GLOBALS["result"])){
                    

                    
                    #DEBUG
                    logMG(7,"mostrar:usuarios",$row[1],$row[0]);

                    #SALIDA
                    echo '<input class="submitopciones" type="submit" name="'.$row[0].'" value="'.$row[1].'"><br>';
                    
                    unset($row);
                }
                
                echo '</form>';
                
                cerrarSeleccion(1);
            }else
            {
                #SALIDA
                echo "<p>La lista está vacía</p>";
            }


        desconectar();
        }

    }

    function listarEntidades(){
        if(conectarse())
        {


            $columnas="`idente`,`entidad`,`likes`";
            $tabla="`entidades`";
            
            if(seleccionar($columnas,$tabla))
            {
                #SALIDA
                echo "<br> <h1>Frutas:</h1><br>";

                echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="tipodeaccion" value="mostrarGustadores">';
                

                echo '<table class="tablaopciones">';
                echo '<tr><th>Fruta</th><th>likes</th></tr>';
                while($row = mysqli_fetch_row($GLOBALS["result"])){
                    

                    #DEBUG
                    logMG(7,"mostrar:Entidades",$row[0],$row[1],$row[2]);
                   

                    #SALIDA
                    echo '<tr><td>';
                    echo '<input class="submitopciones" type="submit" name="'.$row[0].'" value="'.$row[1].'">';
                    echo '</td><td>'.$row[2].'</td></tr>';
                    
                    unset($row);
                }
                
                echo '</table>';
                echo '</form>';
                
                cerrarSeleccion(1);
            }else
            {
                #SALIDA
                echo "<p>La lista está vacía</p>";
            }


        desconectar();
        }
    }







function mostrarGustadores($idente)

{
    $flag=0;
    if(conectarse())
    {


        $columnas="`entidad`";
        $tabla="`entidades`";
        $where="`idente`=".$idente;
        if(seleccionar($columnas,$tabla,$where))
        {

            $row = mysqli_fetch_row($GLOBALS["result"]);
                

                #SALIDA
                echo "<br><h1>".$row[0]."</h1><br>";
                
                unset($row);

              

            $flag=1;
            cerrarSeleccion(1);
        }else
        {
            $flag=0;
        }
        
        $SQL="SELECT `login`.`id`,`usuario` FROM `login`,`megusta` WHERE `login`.`id`=`megusta`.`id` and `megusta`.`idente`=".$idente;

        if($flag){
        if(seleccionar("","","",$SQL))
        {
            #SALIDA
            echo "<p>Le gusta a: </p>";

            echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="tipodeaccion" value="mostrarperfil">';

            while($row = mysqli_fetch_row($GLOBALS["result"])) {
                

                
                #DEBUG
                logMG(7,"mostrar:Gustadores",$row[0],$row[1]);
               
                #SALIDA
                echo '<input class="submitopciones" type="submit" name="'.$row[0].'" value="'.$row[1].'"><br>';

                unset($row);

              }

              echo "</form>";

            cerrarSeleccion(1);
        }
        else
        {
            #SALIDA
            echo "<p>Al nadie le gusta esta fruta aún.</p>";
        }

        }
        else
        {
            #DEBUG
            logMG(6,"mostrarperfil","FRUTA NO ENCONTRADA");
        }

        desconectar();
    }

}









//$GLOBALS["debugNivel"]=1;
/*
mostrarperfil(3);
mostrarGustadores(3);
listarUsuarios();
listarEntidades();*/


if (isset($_POST))
{

    if (isset($_POST["listarUsuarios"]))
    {

        $_SESSION["accion"]="listarUsuarios";
        $_SESSION["idaccion"]=1;
        header("Location:index.php");
        exit();
    }
    else if (isset($_POST["listarEntidades"]))
    {

        $_SESSION["accion"]="listarEntidades";
        $_SESSION["idaccion"]=1;
        header("Location:index.php");
        exit();
    }


    else if(isset($_POST["tipodeaccion"]))
    {
        
        
    switch($_POST["tipodeaccion"])
    {
    case "mostrarGustadores":

            foreach ($_POST as $nombre=>$valor){
            
                if(is_numeric($nombre))
                {
                    //DEBUG
                    echo "si es numerico numero:".$nombre." valor:".$valor;
                    $_SESSION["accion"]="mostrarGustadores";
                    $_SESSION["idaccion"]=(intval($nombre));


                }

            }

            break;
    case "mostrarperfil":
        foreach ($_POST as $nombre=>$valor){
            
            if(is_numeric($nombre))
            {
                //DEBUG
                echo "si es numerico numero:".$nombre." valor:".$valor;
                $_SESSION["accion"]="mostrarperfil";
                $_SESSION["idaccion"]=(intval($nombre));


            }

        }

        break;
    }
    
    
    header("Location:index.php");
    exit();
    }


    
    
}



?>


