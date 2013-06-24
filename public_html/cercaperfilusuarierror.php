<?php 
	require_once("initialize.php");
if(isset($_POST['submitted']))
{
		session_start();
        $mainfunctions->DBLogin();
		$user = $_POST['nomUs'];
		$query = mysql_query("Select nomComplet From Usuari Where nomComplet='$user' or username='$user'");
		if (!mysql_result($query,0,"nomComplet")) {
		    $_SESSION['nomUs'] = $_POST['nomUs'];
			$mainfunctions->RedirectToURL("cercaperfilusuarierror.php");
	   }
	   else {
			$_SESSION['nomUs'] = $_POST['nomUs'];
		    $mainfunctions->RedirectToURL("cercaperfilusuari2.php");
	   }
}

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
						<form id="filter" name="filter" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST">
							<?php
							echo '<table style="margin-top: 10px;">
								<tr>
									<td>';
									session_start();
									$mainfunctions->DBLogin();
									$nomu = $_SESSION['nomUs'];
									echo '<div class="alert alert-error">'.$nomu.' no existeix en el sistema</div>';	
								echo	'</td>
								</tr>
								<tr>
									<td>
										Introdueix el nom del usuari que vols cercar:
									</td>
								</tr>
								<tr>
								    <input type="hidden" name="submitted" id="submitted" value="1"/>
									<td><textarea name="nomUs" rows="1" style="width:487px;" align="middle"></textarea></td>
								</tr>
								<tr>
								    <td><button class="btn btn-success" align="left" style="margin-left:137px; margin-top:35px;">Cerca</button></td>
								</tr>
							</table>'; ?>
						</form>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>  
</html>  