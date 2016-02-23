<?php 
	include 'connect_db.php';
	$precio = $_POST['precio'];
	$extra = $_POST['extra'];
	$noche = $_POST['noche'];
	$dias = $_POST['dias'];
	$dias2 = explode(",", $dias);
	foreach ($dias2 as $value) {
		$sql="select * from precio WHERE Fecha = STR_TO_DATE('".$value."', '%m-%d-%Y')";
		$res = ejecutar_select_sql($sql);
		$cont=0;
		while($fila=mysqli_fetch_array($res)){
				$cont++;	
		}
	
		if($cont>0){
					if($precio != ""){
						$sql="UPDATE precio SET Precio =".$precio." WHERE Fecha = STR_TO_DATE('".$value."', '%m-%d-%Y')";
						$res = ejecutar_select_sql($sql);
					}
					if($extra != ""){
						$sql="UPDATE precio SET Persona_Extra =".$extra." WHERE Fecha = STR_TO_DATE('".$value."', '%m-%d-%Y')";
						$res = ejecutar_select_sql($sql);
					}
					if($noche != ""){
						$sql="UPDATE precio SET Noches =".$noche." WHERE Fecha = STR_TO_DATE('".$value."', '%m-%d-%Y')";
						$res = ejecutar_select_sql($sql);
					}
				}
				else{
					$sql_insert = "INSERT INTO precio(Fecha,Precio,Persona_Extra,Noches) VALUES( STR_TO_DATE('".$value."', '%m-%d-%Y'),".$precio.",".$extra.",".$noche.")";	
						ejecutar_insert_sql($sql_insert);
				}
	}
 ?>