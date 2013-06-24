 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$query = "SELECT s.descripcio, u.username from Suggeriment s, Usuari u Where u.usuari_id=s.usuari_id;";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi suggeriments en el sistema";
		else{
                    echo "Username: ".mysql_result($resultado, 0, "username")."<br>";
                    echo "Descripcio: ".mysql_result($resultado, 0, "descripcio")."<br>"; 
                }
	}

	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 