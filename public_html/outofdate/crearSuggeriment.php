 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
	$data = date('Y/m/d H:i:s');
	$tasca = "nova tasca";
	$usuari_id = "1";
	$desc = "mola molt";
	$query = "INSERT INTO Suggeriment(`suggeriment_id`, `nom`, `descripcio`, `data`, `usuari_id`) 
                  VALUES (NULL,'$tasca','$desc','$data','$usuari_id')";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha creat el suggeriment";
	else echo "sugeriment creat";
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 