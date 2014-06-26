
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

function ocultar(elemento) {

  if(elemento.value == "si") {
      document.getElementById("ocultarDiv").style.display = "none";

   } else {
     document.getElementById("ocultarDiv").style.display = "block";
   }
}

/********************** AUTOCOMPLETAR BUSQUEDA  ***********************/

/*var data;

$.post('pruebaBase.php', {}, function (ciudad) {
  data = ciudad;
  console.log(ciudad);
}, 'post');

$(function() {
	$("#search").autocomplete({
		source: "pruebaBase.php",
		minLength:2
	});	
});

$(function() {
	$("#search1").autocomplete({
		source: "pruebaBase.php",
		minLength:2
	});	
});*/

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