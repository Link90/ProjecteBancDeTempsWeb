<?php 
	require_once("initialize.php");
	session_start();
      echo file_get_contents("esquelet.html");
?>
		<tr>
			<td>
				<ul class="nav nav-tabs" style="margin-bottom: 10px;">
				  <li><a href="usuarisActius.php">Usuaris Més Actius</a></li>
				  <li><a href="cercaperfilusuari1.php">Cerca Usuari</a></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td>
							<h3 style="color:#08C;"> Perfil d'usuari </h3>
						</td>
					</tr>
					<tr>
						<td>
						<!-- PHP -->
						<?php
							session_start();
							$mainfunctions->DBLogin();
							$nomu = $_SESSION['nomUs'];
							$query = mysql_query("SELECT * from Usuari WHERE nomComplet='$nomu' or username='$nomu'");
							$us_id = mysql_result($query,0,'usuari_id');
							$query_hores1 = mysql_query("SELECT SUM(hores) as hores from Usuari u,Solicitud s WHERE u.usuari_id='$us_id' and u.usuari_id= s.usuari_id and s.estat ='CONFIRMAT'");
							$query_hores2 = mysql_query("SELECT SUM(hores) as hores from Usuari u, Oferta o, Solicitud s WHERE u.usuari_id='$us_id' and u.usuari_id=o.usuari_id and s.estat ='CONFIRMAT' and o.oferta_id=s.oferta_id");
							$query_hores3 = mysql_query("SELECT SUM(hores) as hores from Usuari u, Oferta o, Solicitud s WHERE u.usuari_id='$us_id' and u.usuari_id=s.usuari_id and s.estat ='ACCEPTAT' and o.oferta_id=s.oferta_id");
							echo "<table>
								<tr>
									<td
										<div class='alert'> Nom: ".mysql_result($query,0,'nomComplet')."      </div>    
										<span class='label label-success'> +".mysql_result($query,0,'positius')."</span>
										<span class='label label-important'> -".mysql_result($query,0,'positius')."</span>
									</td>
								</tr> ";
							echo "<tr> 
								<td>Telèfon:</td>
								<td>".mysql_result($query,0,'telefon')."</td>
								
							</tr>
							<tr> 
								<td>Adreça:</td>
								<td>".mysql_result($query,0,'adreca')."</td>
							</tr>
							<tr> 
								<td>Informació general:</td>
							</tr>
							<tr>
								<td>".mysql_result($query,0,'biografia')."</td>
							</tr>
							<tr> 
								<td>hores de tasques realitzades per a altres usuaris: ".mysql_result($query_hores2,0,'hores')." hores</td>
							</tr>
							<tr>
								<td>hores de tasques realitzades per altres usuaris: ".mysql_result($query_hores1,0,'hores')." hores</td>
							</tr>
							<tr>
								<td>hores de tasques pendents de pagar: ".mysql_result($query_hores3,0,'hores')." hores</td>
							</tr></table>";
								
							
							
							
							?>
	
							<!-- FIN PHP -->
									
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</body>
</html>