<?php 
	include 'connect_db.php';
	$ini = $_POST['ini'];
	$fin = $_POST['fin'];
	$precio = $_POST['precio'];
	$extra = $_POST['extra'];
	$noche = $_POST['noche'];
	$dias = $_POST['dias'];
	$dias2 = explode(",", $dias);
	while(strtotime($ini)<=strtotime($fin)){
		list($mes, $dia, $anio) = split('[/.-]', $ini);
		setlocale(LC_ALL,"es_MX");
		$dia_nom = utf8_encode(strftime("%a",mktime(0,0,0,$mes,$dia,$anio)));
		if (in_array($dia_nom, $dias2)) {
			//echo "<br>";	
		    //echo $ini;
		    
			$sql="select * from precio WHERE Fecha = STR_TO_DATE('".$ini."', '%m/%d/%Y')";
			$res = ejecutar_select_sql($sql);
			$cont=0;
			while($fila=mysqli_fetch_array($res)){
				$cont++;	

				
			}
			if($cont>0){
				if($precio != ""){
					$sql="UPDATE precio SET Precio =".$precio." WHERE Fecha = STR_TO_DATE('".$ini."', '%m/%d/%Y')";
					$res = ejecutar_select_sql($sql);
				}
				if($extra != ""){
					$sql="UPDATE precio SET Persona_Extra =".$extra." WHERE Fecha = STR_TO_DATE('".$ini."', '%m/%d/%Y')";
					$res = ejecutar_select_sql($sql);
				}
				if($precio != ""){
					$sql="UPDATE precio SET Noches =".$noche." WHERE Fecha = STR_TO_DATE('".$ini."', '%m/%d/%Y')";
					$res = ejecutar_select_sql($sql);
				}
			}
			else{
				$sql_insert = "INSERT INTO precio(Fecha,Precio,Persona_Extra,Noches) VALUES( STR_TO_DATE('".$ini."', '%m/%d/%Y'),".$precio.",".$extra.",".$noche.")";	
				ejecutar_insert_sql($sql_insert);
			}
		}
		
		$ini = date("m/d/Y", strtotime($ini . " + 1 day"));
	}
	//echo $precio." ".$extra." ".$noche;

 ?>