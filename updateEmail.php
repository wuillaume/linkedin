 <?php
 
 if(isset($_GET['valor'])){ $valor  = $_GET['valor']; }
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

    function WriterTXT(){
    //se escribe el arrays en el en archivo texto
     $fileWrite = fopen("data.txt","w");
     GLOBAL $array;
     foreach ($array as  $fila){
            $valor=$fila[0].",".$fila[1];
        if (isset($fila[2])){
          $valor=rtrim($valor).','.$fila[2];
        }
        if (isset($fila[3])){
          $valor=rtrim($valor).','.$fila[3];
        }
        $valor=rtrim($valor);
        fwrite($fileWrite,$valor.PHP_EOL);   
        }
       fclose($fileWrite);
    //End
      }
 if ($valor==''){
    //muestro en pantalla el correo y clave del txt
    $id =0;
	foreach ($array as  $fila){
        if (!isset($fila[2])){
        	echo '<h3 style="color:blue; text-align:center;">'.$fila[0].','.$fila[1].'</h3>';
        	array_push($array[$id],"use");
		    break;
		    }
		$id++;
	 }
  WriterTXT();
}else{
  //se guarda el valor block al array 
	$id =0;
	foreach ($array as  $fila){
		if ($fila[0]==$valor){
          array_push($array[$id],"block");
          break;
		}
     $id ++; 
	}
	//End
  WriterTXT();
  header('Location: updateEmail.php?valor=');
}
	
?>


 