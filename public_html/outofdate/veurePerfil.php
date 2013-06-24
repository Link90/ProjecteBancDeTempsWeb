 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$usuari = "1";
		$query = "SELECT biografia, telefon, poblacio, adreca from Usuari
		WHERE usuari_id='$usuari';";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi ha oferta en el sistema";
		else {
			echo "bio: ".mysql_result($resultado, 0, "biografia")."<br>"; 
			echo "pob: ".mysql_result($resultado, 0, "poblacio")."<br>";
			echo "telf: ".mysql_result($resultado, 0, "telefon")."<br>";
			echo "adreça: ".mysql_result($resultado, 0, "adreca")."<br>";
		}
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 