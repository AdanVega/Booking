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

	<title>Agregar precios</title>

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

 	 <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

  	 <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  	 <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/calendario2.css">
	<style type="text/css">
	body {
	background-image: url(fondo.jpg);
}
    </style>
	<meta charset="utf-8">

  	 <script type="text/javascript" src="stmenu.js"></script>

</head>

<body>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">



	  <tr>



	    <td width="98" height="59"><div align="center"><img src="logo.png" width="98" height="38" alt=""></div></td>



	    <td width="1180"><script type="text/javascript" src="menu-adm.js"></script></td>



	  </tr>



	</table>
<p>&nbsp;</p>
<h3>Agregar precios</h3>
<p>&nbsp;</p>
<p>Seleccione <strong>Rango</strong> para agregar precios por un rango de fechas de inicio a&nbsp; final,&nbsp; &nbsp; o&nbsp; <strong>Click</strong>&nbsp; para seleccionar días específicos en un calendario.</p>
<p>&nbsp;</p>
<p>
  <input type="radio" id="rango" name="precio" value="Rango" checked>
  
  <label for="rango">Rango</label>
  
  <input type="radio" id="click" name="precio" value="Click">
  
  <label for="click">Click</label>
  
</p>
    <div id="rangodiv">

	  <p>&nbsp;</p>
	  <p>Fecha de Inicio:</p>

		<input type="text" class="datepicker" id ="ini" size="13"/>

		<p>Fecha Final:</p>

		<p>
		  <input type="text" class="datepicker" id ="fin" size="13"/>
	  </p>
		<p>&nbsp;</p>
	  <p>&nbsp;</p>
		<p>
		  <input type="checkbox" id="lunes" name="dias" value="lun">
		  
		  <label for="lunes">Lunes</label>
		  
		  <input type="checkbox" id="martes" name="dias" value="mar">
		  
		  <label for="lunes">Martes</label>
		  
		  <input type="checkbox" id="miercoles" name="dias" value="mié">
		  
		  <label for="lunes">Miercoles</label>
		  
		  <input type="checkbox" id="jueves" name="dias" value="jue">
		  
		  <label for="lunes">Jueves</label>
		  
		  <input type="checkbox" id="viernes" name="dias" value="vie">
		  
		  <label for="lunes">Viernes</label>
		  
		  <input type="checkbox" id="sabado" name="dias" value="sáb">
		  
		  <label for="lunes">Sabado</label>
		  
		  <input type="checkbox" id="domingo" name="dias" value="dom">
		  
		  <label for="lunes">Domingo</label>
		  
		  <input type="checkbox" id="todos" value="Todos">
		  
		  <label for="lunes">Todos</label>
	  </p>
		<p>&nbsp;</p>

	</div>

	<div id="datos">

		<label for="precio">Precio</label>

		<input type="text" id="precio">

	&nbsp;	
	&nbsp; 
	&nbsp; 
	&nbsp; 
	&nbsp; 
	<label for="extra">Persona extra</label>

		<input type="text" id="extra">

		<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Noches minimas para reservar</label>

		<select name="noche" id="noche">

					  <option value="0">0</option>	

                      <option value="1">1</option>

                      <option value="2">2</option>

                      <option value="3">3</option>

                      <option value="4">4</option>

                      <option value="5">5</option>

                      <option value="6">6</option>

                      <option value="7">7</option>

                      <option value="8">8</option>

                      <option value="9">9</option>

                      <option value="10">10</option>

                      <option value="11">11</option>

                      <option value="12">12</option>

                    </select>

	</div>

	<p>&nbsp;</p>
	<?php 
    if($_SESSION['tipo']=="admin")
    { 

	
	echo'<button onClick="guardar()" id="guardarRango">Guardar</button>';
}
	 ?>
	<div id="resultado"></div>

	<div id="calendarios" style="display:none"></div>

	
	<?php
	 if($_SESSION['tipo']=="admin")
    { 

	
	echo'<button onClick="guardar2()" style="display:none" id="guardarCalendario">Guardar</button>';

		}
	 ?>





	<script type="text/javascript">

	$(function() {

		    $( ".datepicker" ).datepicker();

		 	 });

			$(function($){



    $.datepicker.regional['es'] = {

        closeText: 'Cerrar',

        prevText: '<Ant',

        nextText: 'Sig>',

        currentText: 'Hoy',

        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],

        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],

        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],

        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],

        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],

        weekHeader: 'Sm',

        firstDay: 1,

        isRTL: false,

        showMonthAfterYear: false,

        yearSuffix: ''



    };



    $.datepicker.setDefaults($.datepicker.regional['es']);



});

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

		function guardar(){

			var ini = document.getElementById("ini").value;

			var fin = document.getElementById("fin").value;

			var precio = document.getElementById("precio").value;

			var extra = document.getElementById("extra").value;

			var noche = document.getElementById("noche").value;

			var dias=[]; 

			var els = document.getElementsByName('dias');

			for (var i=0;i<els.length;i++){

			  if ( els[i].checked ) {

			    dias.push(els[i].value);

			  }

			}

         

        



			if(ini!=""&&fin!=""&&validate_fechaMayorQue(ini,fin))



    {

			//instanciamos el objetoAjax

			ajax = objetoAjax();

			//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas

			ajax.open("POST", "guardarRangoPrecio.php", true);

			//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia

			ajax.onreadystatechange = function() {

	 

	             //Cuando se completa la petición, mostrará los resultados 

				if (ajax.readyState == 4){

	 

					//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'

					document.getElementById("resultado").innerHTML = (ajax.responseText); 

				}

			} 

	 

			//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 

			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 

	 

			//enviamos las variables a 'consulta.php' 

			ajax.send("&ini="+ini+"&fin="+fin+"&dias="+dias+"&precio="+precio+"&extra="+extra+"&noche="+noche); 

		}

		else{alert("Por favor introduce una fecha valida");}

		}

		function guardar2(){

			var precio = document.getElementById("precio").value;

			var extra = document.getElementById("extra").value;

			var noche = document.getElementById("noche").value;

			var days=[];

			var els = document.getElementsByName('day');

			for (var i=0;i<els.length;i++){

			  if ( els[i].checked ) {

			    days.push(els[i].value);

			  }

			}

			//instanciamos el objetoAjax

			ajax = objetoAjax();

			//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas

			ajax.open("POST", "guardarCalendarioPrecio.php", true);

			//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia

			ajax.onreadystatechange = function() {

	 

	             //Cuando se completa la petición, mostrará los resultados 

				if (ajax.readyState == 4){

	 

					//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'

					document.getElementById("resultado").innerHTML = (ajax.responseText); 

				}

			} 

	 

			//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 

			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 

	 

			//enviamos las variables a 'consulta.php' 

			ajax.send("&dias="+days+"&precio="+precio+"&extra="+extra+"&noche="+noche); 

         



		}

		function validate_fechaMayorQue(fechaInicial,fechaFinal)

        {

            valuesStart=fechaInicial.split("/");

            valuesEnd=fechaFinal.split("/");

            // Verificamos que la fecha no sea posterior a la actual

            var dateStart=new Date(valuesStart[2],valuesStart[0],(valuesStart[1]-1));

            var dateEnd=new Date(valuesEnd[2],valuesEnd[0],(valuesEnd[1]-1));

            if(dateStart>=dateEnd)

            {

                return 0; 

            }

            return 1;

        }

        function consultarCalendario(anio) {

			//var ini = document.getElementById("ini").value;

			//var fin = document.getElementById("fin").value;

			anio=2016;

			//instanciamos el objetoAjax

			ajax = objetoAjax();

			//Abrimos una conexión AJAX pasando como parámetros el método de envío, y el archivo que realizará las operaciones deseadas

			ajax.open("POST", "consultarCalendario2.php", true);

			//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia

			ajax.onreadystatechange = function() {

	 

	             //Cuando se completa la petición, mostrará los resultados 

				if (ajax.readyState == 4){

	 

					//El método responseText() contiene el texto de nuestro 'consultar.php'. Por ejemplo, cualquier texto que mostremos por un 'echo'

					document.getElementById("calendarios").innerHTML = (ajax.responseText); 

				}

			} 

	 

			//Llamamos al método setRequestHeader indicando que los datos a enviarse están codificados como un formulario. 

			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 

	 

			//enviamos las variables a 'consulta.php' 

			ajax.send("&anio="+anio); 

		}

		(function(funcName, baseObj) {

		consultarCalendario(0);

		})("docReady", window);



		$('#todos').on('click', function(e) {

		var els = document.getElementsByName('dias');

  		if(this.checked){

  			

			for (var i=0;i<els.length;i++){

			  els[i].checked  = true;

			}   

  		}

  		else{

  			for (var i=0;i<els.length;i++){

			  els[i].checked  = false;

			} 

  		}

	});

		$('#rango').on('change', function(e) {

		var els = document.getElementById('rangodiv');

		var els2 = document.getElementById('calendarios');

		var button = document.getElementById("guardarRango");

		var button2 = document.getElementById("guardarCalendario");

  		if(this.checked){

			els.style.display = "initial";  

			els2.style.display = "none";

			button.style.display = "initial";

			button2.style.display = "none";

  		}

  		

	});

		$('#click').on('change', function(e) {

		var els = document.getElementById('rangodiv');

		var els2 = document.getElementById('calendarios');

		var button = document.getElementById("guardarRango");

		var button2 = document.getElementById("guardarCalendario");

  		if(this.checked){

			els.style.display = "none";  

			els2.style.display = "initial";

			button.style.display = "none";

			button2.style.display = "initial";

  		}

  		

	});

	</script>

</body>

</html>