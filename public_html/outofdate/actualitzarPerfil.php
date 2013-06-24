 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
        $usuari= "1";
        $biografia= " aaa";
        $telefon = "666666";
        $poblacio = "bcn";
        $adreca = "campus";
	$query = "UPDATE Usuari SET biografia='$biografia', telefon='$telefon', poblacio='$poblacio', adreca='$adreca' WHERE usuari_id='$usuari';";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut editar";
	echo "ACCEPTAT";
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 