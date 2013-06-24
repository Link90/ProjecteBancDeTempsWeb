 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
	$data_sol = date('Y/m/d H:i:s');
	$oferta_id = "3";
	$usuari_id = "1";
	$hores = "10";
	$query = "INSERT INTO Solicitud (`solicitud_id`, `estat`, `dataCreacio`, `dataAcceptacio`, `dataSolicitud`, `valoracio`, `hores`, `oferta_id`, `usuari_id`, `observacions`) 
	         VALUES (NULL, 'PENDENT', '$data_sol', NULL, NULL, NULL,'$hores', '$oferta_id', '$usuari_id', NULL);";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut insertar";
	echo $resultado + "ACCEPTAT";
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 