 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$input = "menja rabs a tutiplen";
		$query1 = "SELECT tasca_id from Tasca WHERE nom='$input'";
		$resultado1 = mysql_query($query1, $conexion);
		$tasca = mysql_result($resultado1, 0, "tasca_id");
		$query = "SELECT o.usuari_id,o.tasca_id,o.dataOferta,u.nomComplet from Oferta o, Usuari u 
		      WHERE o.tasca_id=$tasca && u.usuari_id=o.usuari_id";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi ha ofertes en el sistema";
		else {
			echo "Usuari: ".mysql_result($resultado, 0, "usuari_id")."<br>";
			echo "Tasca: ".mysql_result($resultado, 0, "tasca_id")."<br>";
			echo "DataOfer: ".mysql_result($resultado, 0, "dataOferta")."<br>";
			echo "Nom Complet: ".mysql_result($resultado, 0, "nomComplet")."<br>";
		} 
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 