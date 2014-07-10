<html>
<BODY>
	<?php
		echo "<script language='javascript'>
			var keylist='abcdefghijklmnopqrstuvwxyzs0123456789';
			var temp='';

			function generatepass(){
				temp='';
				for (i=0;i<6;i++)
				temp+=keylist.charAt(Math.floor(Math.random()*keylist.length));
				return temp
			}

			function populateform(){
				var codigo;
				codigo = generatepass();
				alert(codigo);
				return codigo
			}
		</script>"
	?>
<form name="pgenerate">
	<input type="button" value="Generar Clave" onClick="populateform()">
</form>
</BODY>
</html>