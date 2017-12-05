<?php
    //lleno mi arrays desde el archivo texto


    
	$file = fopen("data.txt", "r");
    $array;
    $index =0;
	while(!feof($file)) {
	    $fila = fgets($file);
	if ($fila==''){
	}else{
	     $array[$index] = explode(",",$fila); 
	     $index++;
	}
	}
	fclose($file);
    //-------------------------

    //muestro en pantalla el correo y clave del txt
	foreach ($array as  $fila) {
        if (!isset($fila[2])){
        	echo '<h3 style="color:blue; text-align:center;">'.$fila[0].','.$fila[1].'</h3>';
		    break;
		}
	 }
	 //--






?>