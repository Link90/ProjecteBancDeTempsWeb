<?php 
	require_once("initialize.php");
        session_start();
	if(isset($_POST['submitted'])) { $mainfunctions->crearSolicitud($_POST['hores'],$_SESSION['oferta_id'],$_SESSION['usuari_id']); }

echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSolicitar.html");  
?>

<tr>
<td>
					<h3 style="color:#08C;"> Sol&#183licitar Tasca </h3>
					<!-- PHP -->
					<?php
					session_start();
					$mainfunctions->DBLogin();
					$nomt = $_SESSION['nomtas'];
					$ofid = $_SESSION['oferta_id'];
					$query1 = mysql_query("SELECT u.username, u.positius, u.negatius, u.telefon, o.descripcio FROM Oferta o, Usuari u WHERE o.oferta_id = $ofid AND o.usuari_id = u.usuari_id");
					$row = mysql_fetch_array($query1);
					echo '<table border="0" style="width:600px">';
					echo 	'<tr>';
					echo		'<td>' .$nomt. '</td>';
					echo		'<td align="right">'.$row['username'].'</td>';
					echo 	'</tr>';
					echo	'<tr>';
					echo		'<td colspan="2" align="right">';
					echo		'<p style="margin-bottom:30px;">(<span style="color:#3ADF00;">'.$row['positius'].'</span> <span style="color:red;">'.$row['negatius'].'</span>)</p>';
					echo		'</td>';
					echo	'</tr>';
					echo	'<tr>';
					echo		'<td colspan="2" align="center" style="padding-bottom:100px;">'.$row['descripcio'].'</td>';
					echo	'</tr>';
					echo	'<tr>';
					echo		'<td colspan="2" align="right" style="padding-bottom:30px;">Telefon: '.$row['telefon'].'</td>';
					echo	'</tr>';
					echo	'<tr>';
					echo	'<form action=' .htmlentities($_SERVER['PHP_SELF']). ' method="POST">';
					echo	'<input type="hidden" name="submitted" id="submitted" value="1"/>';
					echo	'<td><label class="control-label"  for="hores">Hores:</label><input type="text" id="hores" name="hores" placeholder="hores" class="input-small"></td>';
					echo	'<td align="right">';
					echo	'<button class="btn btn-success" >Sol&#183licitar hores</button>';
					echo	'</td></form></tr></table>';
					?>
					<!-- FIN PHP -->
				</td></tr>
			</div>
		</div>
	</body>  
</html>