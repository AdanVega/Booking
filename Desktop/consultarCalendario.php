<?php 

	include 'connect_db.php';

	$mes = $_POST['mes'];

	$anio = $_POST['anio'];

	if($anio==0){

	$anio =date('Y'); 

	}

	if($mes==0){

	$mes= date('n'); 

	}

	$meses = array(

				"1" => "Enero",

				"2" => "Febrero",

				"3" => "Marzo",

				"4" => "Abril",

				"5" => "Mayo",

				"6" => "Junio",

				"7" => "Julio",

				"8" => "Agosto",

				"9" => "Septiembre",

				"10" => "Octubre",

				"11" => "Noviembre",

				"12" => "Diciembre");

	echo '<div class="calendar-month-view">

			<div class="calendar-month-view-arrow" id="izq" data-dir="left"><</div>

			<p class="month-year" id="'.$mes.'" name="'.$anio.'">';

	echo $meses[$mes]." ".$anio;

	echo '</p>

			<div class="calendar-month-view-arrow" id="der" data-dir="right">></div>

		</div>';

	echo '<div class="letrasDay">

			<div>Lun</div><div>Mar</div><div>Mier</div><div>Jue</div><div>Vie</div><div>Sab</div><div>Dom</div>

		</div>';

	echo '<div class="calendar-holder">

			<div class="calendar-grid">';

	//lochido

			$dias = array(

				"lun" => 1,

				"mar" => 2,

				"mié" => 3,

				"jue" => 4,

				"vie" => 5,

				"sáb" => 6,

				"dom" => 7);

			setlocale(LC_ALL,"es_MX");

			$dia_nom = utf8_encode(strftime("%a",mktime(0,0,0,$mes,1,$anio)));

			$ultimo_Dia = date("d",(mktime(0,0,0,$mes+1,1,$anio)-1));

			$cont=1;

			$dia_correcto=false;



			for($i=0;$i<42;$i++){

				if($i+1==$dias[$dia_nom]){

					$dia_correcto=true;

					

				}

				if($dia_correcto==false){

					echo'<div class="calendar-day"></div>';

				}

				if($dia_correcto&&$cont <= $ultimo_Dia)

				{	

					$precio = "";

					$extra = "";

					$noche= "";

					$sql="select * from precio WHERE Fecha = STR_TO_DATE('".$mes."/".$cont."/".$anio."', '%m/%d/%Y') ";

					$res = ejecutar_select_sql($sql);

					while($fila=mysqli_fetch_array($res)){

						 $precio = $fila['Precio'];

						 $extra = $fila['Persona_Extra'];

						 $noche = $fila['Noches'];



				}

					echo'<div class="calendar-day"><font size="+1" color="#FFFFFF"><center><b>'.$cont.'</b></center></font><p><font color="#B4DEF5">P:$'.$precio.'&nbsp;&nbsp;</font><font color="#D1F3D8"> PE:$'.$extra.'&nbsp;&nbsp;</font><font color="#F1EABE"> NM:'.$noche.'</font></p></div>';

					$cont++;

				}



			}

			

	echo '</div>

		

			<div class="calendar-specific">

				<div class="specific-day">

				</div>

				<div class="specific-day-scheme"></div>

			</div>

		</div>';				 		

 ?>