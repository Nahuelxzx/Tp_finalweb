
/**********************  VALIDACION DE FORMULARIO DE PAGO   ***********************/
window.onload = inicio
        
    function inicio(){
        document.getElementById("PagoFormu").onsubmit = validar;
    }

function validar(){
    
    if(isNaN(document.getElementById("dni").value)){
        alert ("El campo Dni acepta solo numeros");
        return false;
    }

    if(isNaN(document.getElementById("numTarj").value)){
        alert ("El campo Numero de Tarjeta acepta solo numeros");
        return false;
    }

    var anio = document.getElementById("anio").value;
    var mes = document.getElementById("mes").value-1;
    var dia = document.getElementById("dia").value;

    var valor = new Date(anio, mes, dia);

    if(dia != valor.getDate() || mes != valor.getMonth() || anio != valor.getFullYear()) {
        alert("la fecha es incorrecta ");
        return false;
    }

    if(!document.getElementById("sexo1").checked && !document.getElementById("sexo2").checked){
        alert ("El campo sexo es obligatorio");
        return false;
    }

    if(document.getElementById("email").value != document.getElementById("remail").value){
        alert ("El Email y Verficar Email deben ser iguales");
        return false;
    }
    
    return true;
}

/**********************  VALIDACION DE FORMULARIO DE RESULTADO VUELO   ***********************/

window.onload = inicio
        
    function inicio(){
        document.getElementById("form_vuelo").onsubmit = valida;
    }

function valida(){
    
    ida = document.getElementsByName("ida");

    var seleccionado = false;

    for(var i=0; i<ida.length; i++) {    
      if(ida[i].checked) {
        seleccionado = true;
        break;
      }
    }
     
    if(!seleccionado) {

        alert("Debe seleccionar al menos una opccion de ida");
      return false;
    }

//validacion de vuelta

    if (document.getElementById("iyv").checked) {

        vuelta = document.getElementsByName("vuelta");

        var seleccionado1 = false;

        for(var j=0; j<vuelta.length; j++) {    
          if(vuelta[j].checked) {
            seleccionado1 = true;
            break;
          }
        }
         
        if(!seleccionado1) {

            alert("Debe seleccionar al menos una opccion de vuelta");
          return false;
        }
    }else{};
}

/********************** DATEPICKER FECHAS  *************************/

//$('#txtStartDate').datepicker({ minDate: "D" });  });
$(function() {
	$('#txtStartDate').datepicker({
	onSelect: function(dateText, inst) {
	var lockDate = new Date($('#txtStartDate').datepicker('getDate')); 
	$('input#txtEndDate').datepicker('option', 'minDate', lockDate); }
	});
});

$(function() {
	$('#txtEndDate').datepicker({
	});
});

/**********************  OCULTAR DIV REGRESO  ***********************/

$(document).ready(function(){
        $('input[type="radio"]').click(function(){
            if($(this).attr("value")=="si"){
                $("#ocultarDiv").hide();
            }
            if($(this).attr("value")=="iyv"){
                $("#ocultarDiv").show();
            }
        });
    });

/********************** BOTON DE LOGUEO  ***********************/

$(function() {
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});