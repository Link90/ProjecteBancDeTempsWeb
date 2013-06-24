 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$usuari = "ivangay";
		$query = "SELECT biografia, telefon, poblacio, adreca, positius, negatius, nomComplet, horesTreballades, horesRebudes from Usuari
		WHERE username='$usuari' || nomComplet='$usuari';";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "L'usuari no existeix";
		else {
			echo "bio: ".mysql_result($resultado, 0, "biografia")."<br>"; 
			echo "pob: ".mysql_result($resultado, 0, "poblacio")."<br>";
			echo "telf: ".mysql_result($resultado, 0, "telefon")."<br>";
			echo "adreça: ".mysql_result($resultado, 0, "adreca")."<br>";
			echo "nom: ".mysql_result($resultado, 0, "nomComplet")."<br>";
			echo "pos: ".mysql_result($resultado, 0, "positius")."<br>";
			echo "neg: ".mysql_result($resultado, 0, "negatius")."<br>";
                        echo "horesT: ".mysql_result($resultado, 0, "horesTreballades")."<br>";
			echo "horesN: ".mysql_result($resultado, 0, "horesRebudes")."<br>";
		}
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 