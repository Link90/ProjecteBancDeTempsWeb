 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
        $solicitud= "1";
	$query = "UPDATE Solicitud SET estat='DENEGAT' WHERE solicitud_id='$solicitud';";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut insertar";
	echo "DENEGAT";
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 