 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$input = "coses nazis i gays";
		$query1 = "SELECT categoria_id from Categoria WHERE nom='$input'";
		$resultado1 = mysql_query($query1, $conexion);
		$categoria = mysql_result($resultado1, 0, "categoria_id");
		$query = "SELECT * from Tasca WHERE categoria_id=$categoria";
		$resultado = mysql_query($query, $conexion);
        	if (!$resultado) echo "No hi ha categories en el sistema";
		else echo "Nombre: ".mysql_result($resultado, 0, "nom")."<br>"; 
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 