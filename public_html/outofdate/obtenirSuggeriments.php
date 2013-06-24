 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$query = "SELECT nom, data from Suggeriment s;";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi suggeriments en el sistema";
		else{
                    echo "Data: ".mysql_result($resultado, 0, "data")."<br>";
                    echo "tasca: ".mysql_result($resultado, 0, "nom")."<br>"; 
                }

	}

	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 