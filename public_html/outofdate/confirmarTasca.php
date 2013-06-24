 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$mybd='u762658939_bdt';
$conexion=mysqli_connect($host,$user,$pass,$mybd);
if($conexion){
        $user = "1";
        $val = "1";
        $solicitud= "1";
	$query = "UPDATE Solicitud SET estat='CONFIRMAT' WHERE solicitud_id='$solicitud';";
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut confirmar";
	else echo "confirmat";
        if($val>0){
            $query = "UPDATE Usuari SET positius = positius+1 WHERE usuari_id='$user';";
        }
	else if($val<0){
            $query = "UPDATE Usuari SET negatius = negatius+1 WHERE usuari_id='$user';";
        }
	$resultado = mysqli_query($conexion,$query);
	if (!$resultado) echo "No s'ha pogut valorar";
	else echo "valorat";
}
 else echo $conexion; 
 mysqli_close($conexion);    

?> 