 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
	$desc = "Holaaaa, q ase???";
	$data_ofer = date('Y/m/d H:i:s');
	$tasca_id = "1";
	$usuari_id = "1";
	$query = "INSERT INTO Oferta(oferta_id,descripcio,dataOferta,tasca_id,usuari_id)
	          VALUES (NULL,'$desc','$data_ofer','$tasca_id','$usuari_id')";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut insertar";
	echo $resultado;
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 