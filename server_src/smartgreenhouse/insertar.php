<?php
include("conexion.php");

// recibir datos
$BMETEMP=$_POST['BMETEMP'];
$BMEPRES=$_POST['BMEPRES'];
$BMEHUM=$_POST['BMEHUM'];
$HUMSUELO=$_POST['HUMSUELO'];
$TEMPSUELO=$_POST['TEMPSUELO'];
$TEMPEXT=$_POST['TEMPEXT'];
$PRESEXT=$_POST['PRESEXT'];
$HUMEXT=$_POST['HUMEXT'];
$LUMINOSIDAD=$_POST['LUMINOSIDAD'];
$fechaHora=date('Y/m/d H:i:s');


if($BMETEMP > 20){
$ventana=1;

}else{
$ventana=0;

}


if($BMEHUM < 10){
$riego=1;

}else{
$riego=0;

}


if($TEMPSUELO < 10){
$calefaccion=1;

}else{
$calefaccion=0;

}



// procesar
//if($temp_interna > 35)
//$ventana=20;
//if($hum_aire_int < 20)
//$riego=1;
//$ventilacion=$_POST['ventilacion'];
//$calefaccion=$_POST['calefaccion'];


//if(isset($_GET['temp_externa']) && !empty($_GET['temp_externa']) && isset($_GET['hum_aire_ext']) //&& !empty($_GET['hum_aire_ext']))
//{

// conexion a la bd
$con=mysql_connect($host,$user,$pw)or die("problemas al conectar");
mysql_select_db($db,$con)or die("problemas al conectar la bd");


//echo mysql_query("INSERT INTO datos (TEMP_EXTERNA,HUM_AIRE_EXT) VALUES ('$_GET
//['temp_externa']','$_GET['hum_aire_ext']')",$con);

mysql_query("INSERT INTO datos(BMETEMP, BMEPRES, BMEHUM, HUMSUELO, TEMPSUELO, TEMPEXT, PRESEXT, HUMEXT, LUMINOSIDAD, ventana, riego, calefaccion, fechaHora) VALUES ('$BMETEMP','$BMEPRES','$BMEHUM','$HUMSUELO','$TEMPSUELO','$TEMPEXT','$PRESEXT','$HUMEXT',
'$LUMINOSIDAD','$ventana','$riego','$calefaccion','$fechaHora')") or die("error");

// actuadores

//$ventana=20;
//if($hum_aire_int < 20)
//$riego=1;
//$ventilacion=$_POST['ventilacion'];
//$calefaccion=$_POST['calefaccion'];
//ifs entonces actúo GPIO no se qué



if ($ventana==1) { 
   if(($BMETEMP > 20)and($BMETEMP < 29)){
	$a- exec("sudo python /var/www/html/smartgreenhouse/abrirVentanaMedio.py");
	echo $a;
   }

   if($BMETEMP >= 29){
	$a- exec("sudo python /var/www/html/smartgreenhouse/abrirVentanaMucho.py");
	echo $a;
   }
  
}else{
   $a- exec("sudo python /var/www/html/smartgreenhouse/cerrarVentana.py");
   echo $a;

}


if ($riego==1) { 
   $a- exec("sudo python /var/www/html/smartgreenhouse/activa_riego.py");
   echo $a;
  
}else{
   $a- exec("sudo python /var/www/html/smartgreenhouse/desactiva_riego.py");
   echo $a;

}


if ($calefaccion==1) { 
   $a- exec("sudo python /var/www/html/smartgreenhouse/activa_calefaccion.py");
   echo $a;
  
}else{
   $a- exec("sudo python /var/www/html/smartgreenhouse/desactiva_calefaccion.py");
   echo $a;

}

?>