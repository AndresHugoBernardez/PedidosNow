

<?php
if(!isset($_SESSION))session_start();
include_once "conectar.php";
include_once "conectarfin.php";
include_once "select.php";
include_once "selectfin.php";
include_once "logMG.php";
include_once "megusta.php";
include_once "chkSession.php";


$ArrayUsuarioActual=array();




function mostrarinputs()
{

    

    if (conectarse()){

    if (checkSession()){
        
    
        
        echo '<form action="megustaMG.php" method="post">';

        


        $columnas="`idente`";
        $tabla="`megusta`";
        $where="`id`=".$_SESSION["id"];
        


        //FASE recuperar que cosas le gustan al usuario
        if(seleccionar($columnas,$tabla,$where))
        {


            $i=0;
           
            // cada valor
            while($row = mysqli_fetch_row($GLOBALS["result"])) {

                
                #debug
                logMG(4,"mostrarinputs",$where,$row[0]);


                // recuperando cada dato que le gusta al usuario
                $ArrayUsuarioActual[$i]=$row[0];
                
                
                echo '<input type="hidden" name="arrayUsuarioViejo[]" value="'.$row[0].'">';
                
                $i++;


                //limpiar row
                unset($row);
            }
        

            cerrarSeleccion(1) ;
        }
        else
        {
            #debug
            logMG(4,"mostrarinputs",$where,"error");
        }

        

        $columnas="`idente`,`entidad`";
        $tabla="`entidades`";
        if(seleccionar($columnas,$tabla))
        {



            
            // cada valor
            while($row = mysqli_fetch_row($GLOBALS["result"])) {

                $siLeGusta=0;
                if (isset ($ArrayUsuarioActual))
                {
                    $siLeGusta=in_array($row[0], $ArrayUsuarioActual);
                    #debug
                    logMG(4,"mostrarinputs",$row[0],$row[1],"resultado".$siLeGusta);


                    

                    
                    
                    
                }
                else
                {
                    #debug
                    logMG(4,"mostrarinputs",$row[0],$row[1]);
                }



                echo '<input type="checkbox"  name="chckbx[]"  value="'.$row[0].'"';

                // si el dato es el que le gusta al usuario se mostrará chequeado.
                if ($siLeGusta) 
                    {echo "checked ";
                    }

                echo '> <label for="entidad'.$row[0].'">'.$row[1].' </label><br>';

                


                //limpiar row
                unset($row);
            }

            
            
            echo '<input type="submit" name="megusta!" value="Guardar" >';
            echo '</form>';


            



            cerrarSeleccion(1) ;

        }
        else
        {
            #debug
            logMG(4,"mostrarinputs","error al seleccionar");
        }

        if(isset($ArrayUsuarioActual)) unset($ArrayUsuarioActual);


    }
    desconectar();

    }





}





if (isset($_POST))
{
    //session_start();
    #DEBUG
    //$GLOBALS["debugNivel"]=1;

    


    
    if (isset($_POST["megusta!"])){

      



        // eliminar todo lo que le dejó de gustar

        if (conectarse()){
        if (checkSession()){



            if(isset( $_POST["chckbx"]))
            {
                if (isset($_POST["arrayUsuarioViejo"]))
                {
                    foreach($_POST["arrayUsuarioViejo"] as $idente)
                    {
                        if(!(in_array($idente, $_POST["chckbx"])))
                        {
                            #DEBUG
                            logMG(4,"mostrarinputs:POST: ya no le gusta:",$idente);
                        
                            nomegusta($_SESSION["id"],$idente);
                        
                        }

                        
                        
                    }

                    // agregar lo nuevo que me gusta
                    foreach($_POST["chckbx"] as $idente)
                    {
                        if(!(in_array($idente, $_POST["arrayUsuarioViejo"])))
                        {

                        #DEBUG
                        logMG(4,"mostrarinputs:POST: ahora le gusta:",$idente);

                        megusta($_SESSION["id"],$idente);
                        
                        }

                        
                    }
                }
                else
                {
                    // agregar lo nuevo que me gusta
                    foreach($_POST["chckbx"] as $idente)
                    {
                        

                        #DEBUG
                        logMG(4,"mostrarinputs:POST: ahora le gusta:",$idente);

                        megusta($_SESSION["id"],$idente);
                        
                        

                        
                    }
                }
            }
            else
            {
                
                if (isset($_POST["arrayUsuarioViejo"]))
                {
                    // borrar todo lo que le gusta
                    foreach($_POST["arrayUsuarioViejo"] as $idente)
                    {
                        
                            #DEBUG
                            logMG(4,"mostrarinputs:POST: ya no le gusta:",$idente);
                        
                            nomegusta($_SESSION["id"],$idente);
                        
                        
                        
                    }
                }
                    

            }


        }
            desconectar();
            
        }

    }


}

/*
//-----------EJEMPLO

//$GLOBALS["debugNivel"]=1;
//mostrarinputs();*/


?>