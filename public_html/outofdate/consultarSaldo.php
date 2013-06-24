 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$usuari = "1";
		$query = "SELECT horesTreballades, horesRebudes from  Usuari 
		WHERE usuari_id='$usuari';";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "Hores no disponibles";
		else {
			echo "horesT: ".mysql_result($resultado, 0, "horesTreballades")."<br>"; 
			echo "horesR: ".mysql_result($resultado, 0, "horesRebudes")."<br>";
		}
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 