 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$usuari = "1";
		$dataOfer = "2013-06-10 00:00:00";
		$tasca = "1";
		$query = "SELECT o.descripcio,u.telefon,u.positius,u.negatius from Oferta o, Usuari u
		WHERE o.usuari_id='$usuari'&& o.tasca_id='$tasca' && o.dataOferta='$dataOfer' 
		&& o.usuari_id=u.usuari_id";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi ha oferta en el sistema";
		else {
			echo "telf: ".mysql_result($resultado, 0, "telefon")."<br>"; 
			echo "Pos: ".mysql_result($resultado, 0, "positius")."<br>";
			echo "Neg: ".mysql_result($resultado, 0, "negatius")."<br>";
			echo "Desc: ".mysql_result($resultado, 0, "descripcio")."<br>";
		}
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 