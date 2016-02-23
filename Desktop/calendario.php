<?php session_start();



	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true &&($_SESSION['tipo']=="admin" || $_SESSION['tipo']=="supervisor"))

	{



	}

	else

	{

	echo "<br/>" . "Esta pagina es solo para usuarios registrados o no tiene permiso para acceder aqui." . "<br/>";

	echo "<br/>" . "<a href='login.html'>Login Here!</a>";



	exit;

	}

?>
<html>

<head>

	<title>Calendario</title>

	
	<link rel="stylesheet" type="text/css" href="css/calendario.css">
	<style type="text/css">
	body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
    body {
	background-image: url(fondo.jpg);
}
    </style>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>

	<script type="text/javascript" src="stmenu.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">



	  <tr>



	    <td width="98" height="59"><div align="center"><img src="logo.png" width="98" height="38" alt=""></div></td>



	    <td width="1180"><script type="text/javascript" src="menu-adm.js"></script></td>



	  </tr>
	  <tr>
	    <td colspan="2" align="center"><table width="566" border="0" align="center" cellpadding="0" cellspacing="0">
	      <tr>
	        <td width="32" height="40" bgcolor="#A5DBDE">&nbsp; P</td>
	        <td width="104" height="40" bgcolor="#CAEAEC">&nbsp; Precio base</td>
	        <td width="48" height="40">&nbsp;</td>
	        <td width="36" height="40" bgcolor="#A5CFBF">&nbsp; PE </td>
	        <td width="119" height="40" bgcolor="#BFDDD2">&nbsp; Persona Extra</td>
	        <td width="50">&nbsp;</td>
	        <td width="44" bgcolor="#D5CFB3">&nbsp; NM</td>
	        <td width="133" height="40" bgcolor="#E6E3D2">&nbsp; Noches Minimas</td>
          </tr>
        </table></td>
      </tr>
	  <tr>
	    <td height="30" colspan="2" align="center" bgcolor="#009999"><font color="#FFFFFF"> CALENDARIO DE PRECIOS</font></td>
      </tr>



	</table>
<div class="calendar" id="calendar" data-color="normal" offset="0">
	  
</div>

	<script type="text/javascript">

		function objetoAjax(){

				var xmlhttp = false;

				try {

					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

				} catch (e) {

		 

					try {

						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

					} catch (E) {

						xmlhttp = false; }

				}

		 

				if (!xmlhttp && typeof XMLHttpRequest!='undefined') {

				  xmlhttp = new XMLHttpRequest();

				}

				return xmlhttp;

			}



		function consultarCalendario(mes,anio) {

			//var ini = document.getElementById("ini").value;

			//var fin = document.getElementById("fin").value;

			//instanciamos el objetoAjax

			ajax = objetoAjax();

			//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas

			ajax.open("POST", "consultarCalendario.php", true);

			//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia

			ajax.onreadystatechange = function() {

	 

	             //Cuando se completa la petición, mostrará los resultados 

				if (ajax.readyState == 4){

	 

					//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'

					document.getElementById("calendar").innerHTML = (ajax.responseText); 

				}

			} 

	 

			//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 

			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 

	 

			//enviamos las variables a 'consulta.php' 

			ajax.send("&mes="+mes+"&anio="+anio); 

		}



		(function(funcName, baseObj) {

		consultarCalendario(0,0);

		})("docReady", window);

		$(document).on('click','.calendar-month-view-arrow',cambiarMes);

		$(document).on('click','.calendar-day',editar);



		function cambiarMes(e){

			var tar = e.target.id;

			

			$(".month-year").each(function(){

		  	 	var month = $(this).attr('id');

		  	 	var year = $(this).attr('name');

		  	 	if(tar=="der" && month<12){

					consultarCalendario(parseInt(month)+1,year);

				}

				if(tar=="der" && month==12){

					consultarCalendario(1,parseInt(year)+1);

				}

				if(tar=="izq" && month>1){

					consultarCalendario(parseInt(month)-1,year);

				}

				if(tar=="izq" && month==1){

					consultarCalendario(12,parseInt(year)-1);

				}

			

			

			});

			

		}

		function editar(e){

			var tar = e.target;

			var month = $('.month-year').attr('id');

	  	 	var year = $('.month-year').attr('name');

		} 



	</script>

</body>

</html>