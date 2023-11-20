




var formElement;
var updateElement;
var estadoElement;
var recargarElement;

window.addEventListener("load",()=>{

    formElement=document.getElementById("submitPendientes");
    updateElement=document.getElementById("update");
    estadoElement=document.getElementById("estado");
    recargarElement=document.getElementById("recargar");


    recargarElement.addEventListener('click',()=>{window.location.reload();});

    


});

function cambiarYSubmit(update,estado){
    updateElement.value=update;
    estadoElement.value=estado;
    formElement.submit();
}








