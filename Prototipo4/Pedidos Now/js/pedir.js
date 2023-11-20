

var BotonOrdenar;

var nombre;
var hamburguesa;
var coca       ;  
var papas      ; 
var empanada   ; 
var choripan   ;
var sprite     ;


var Phamburguesa;
var Pcoca       ;  
var Ppapas      ; 
var Pempanada   ; 
var Pchoripan   ;
var Psprite     ;


var Ptotal;

var submitForm;
var pantallaInicial;

var pedido;





window.addEventListener('load',(event)=>{



    BotonOrdenar= document.getElementById("pedirnow");


    nombre=document.getElementById("nombre");

    hamburguesa=document.getElementById("hamburguesa");
    coca       =document.getElementById("coca");
    papas      =document.getElementById("papas");
    empanada   =document.getElementById("empanada");
    choripan   =document.getElementById("choripan"); 
    sprite     =document.getElementById("sprite");   


    Phamburguesa=document.getElementById("Phamburguesa");
    Pcoca       =document.getElementById("Pcoca");
    Ppapas      =document.getElementById("Ppapas");
    Pempanada   =document.getElementById("Pempanada");
    Pchoripan   =document.getElementById("Pchoripan");   
    Psprite     =document.getElementById("Psprite");  


    Ptotal   =document.getElementById("Ptotal"); 


    submitForm =document.getElementById("submitForm");  

    pantallaInicial=document.getElementById("pantallaInicial");
   

    BotonOrdenar.addEventListener('click',()=>verificarOrden());


hamburguesa.addEventListener('change',()=>TotalAPagar());
       coca.addEventListener('change',()=>TotalAPagar());
      papas.addEventListener('change',()=>TotalAPagar());
   empanada.addEventListener('change',()=>TotalAPagar());
   choripan.addEventListener('change',()=>TotalAPagar());  
     sprite.addEventListener('change',()=>TotalAPagar()); 
   
   

     nombre.addEventListener('keypress',(event)=>{evaluacion(event)});

    
    setTimeout(desaparecer,4500);
    

    


});


function TotalAPagar()
{
    var Acumulador=0
    
    
    Acumulador+=hamburguesa.value*Phamburguesa.value;
    Acumulador+=       coca.value*       Pcoca.value;       
    Acumulador+=      papas.value*      Ppapas.value;      
    Acumulador+=   empanada.value*   Pempanada.value;   
    Acumulador+=   choripan.value*   Pchoripan.value;  
    Acumulador+=     sprite.value*     Psprite.value;   
    Ptotal.value=Acumulador;
}


function desaparecer()
{
    pantallaInicial.style.display="none";
}


function evaluacion(eventoA)
    {let evento;
        evento=eventoA||windows.event;
        if((evento.charCode==32||evento.keyCode==32)&&(nombre.value==" "||nombre.value==""))eventoA.preventDefault();
    }







function agregarCadena(item)
{
    let cadena
    cadena="";
    if(item.value>0)
    {
        cadena=" "+item.value+" "+item.name+"\n";
        pedido=true;
    }
    return cadena;
        
}




function verificarOrden(){

    let cadena;

    

    if (!submitForm.checkValidity()) submitForm.reportValidity();

    else 
    {
        pedido=false;
        cadena=nombre.value+"\nhace un pedido de: \n";
        
        cadena+=agregarCadena(coca);
        cadena+=agregarCadena(sprite);
        cadena+=agregarCadena(hamburguesa);
        cadena+=agregarCadena(papas);
        cadena+=agregarCadena(empanada);
        cadena+=agregarCadena(choripan);
   

        cadena+="\n Total a Pagar: $"+Ptotal.value+"\n";

        if(pedido)
        {

        var retVal = confirm(cadena);
    if( retVal == true ){
        submitForm.submit();


    

        }else{
            
    
        }
    }
    
    }

}
