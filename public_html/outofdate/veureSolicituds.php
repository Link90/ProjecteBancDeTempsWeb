 <?php
$host='mysql.hostinger.es';
$user='u762658939_ivan';
$pass='albertesgay';
$conexion=mysql_connect($host,$user,$pass);
if($conexion){
	if (mysql_select_db('u762658939_bdt',$conexion)) {
		$usuari = "1";
		$query1 = "SELECT sol.solicitud_id, sol.dataSolicitud, u.nomComplet, sol.estat, o.descripcio FROM Tasca t, Solicitud sol, Oferta o, Usuari u
		WHERE sol.usuari_id='$usuari' && sol.oferta_id=o.oferta_id && u.usuari_id=o.usuari_id &&  t.tasca_id=o.tasca_id  ;";
		$resultado = mysql_query($query1, $conexion);
        	if (!$resultado) echo "No hi ha solicituds 1 en el sistema";
		else {
                        echo "sols enviades<br>"; 
			echo "sol_id: ".mysql_result($resultado, 0, "solicitud_id")."<br>"; 
			echo "data: ".mysql_result($resultado, 0, "dataSolicitud")."<br>";
			echo "nom: ".mysql_result($resultado, 0, "nomComplet")."<br>";
			echo "estat: ".mysql_result($resultado, 0, "estat")."<br>";
                        echo "estat: ".mysql_result($resultado, 0, "descripcio")."<br>";
		}
		$query2 = "SELECT sol.solicitud_id, sol.dataSolicitud, u.nomComplet, sol.estat, o.descripcio from Tasca t,Solicitud sol, Oferta o, Usuari u
		WHERE o.usuari_id='$usuari' && sol.oferta_id=o.oferta_id && u.usuari_id=sol.usuari_id && t.tasca_id=o.tasca_id;";
                $resultado = mysql_query($query2, $conexion);
        	if (!$resultado) echo "No hi ha solicituds 2 en el sistema";
		else {
                        echo "sols rebudes<br>"; 
			echo "sol_id: ".mysql_result($resultado, 0, "solicitud_id")."<br>"; 
			echo "data: ".mysql_result($resultado, 0, "dataSolicitud")."<br>";
			echo "nom: ".mysql_result($resultado, 0, "nomComplet")."<br>";
			echo "estat: ".mysql_result($resultado, 0, "estat")."<br>";
                        echo "estat: ".mysql_result($resultado, 0, "descripcio")."<br>";
		}
	}
	 else echo "FatalERROR1122343 NOOOOO BITCH";  
}
 else echo $conexion;        

?> 