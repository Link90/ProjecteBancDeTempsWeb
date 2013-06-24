<?php 
	require_once("initialize.php");
if(isset($_POST['acceptar']))
{
	session_start();
       $mainfunctions->RedirectToURL("oferirtasca4.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesOferir.html");

?> 
					<tr>
						<td>
							<table>
								<tr><td>
									<p class="etsoltasca" style="margin-bottom:30px;">Actualment existeixen aquestes ofertes per a la tasca seleccionada:</p>
								</td></tr>
								<tr><td>
									<table class="table table-bordered">
										<tr>
											<th scope="col">Nom</th>
											<th scope="col">Alumne</th>
											<th scope="col">Data</th>
										</tr>
										<!-- PHP -->
										<?php
											session_start();
											$mainfunctions->DBLogin();
											$nomt = $_SESSION['nomtas'];
											$query1 = mysql_query("SELECT tasca_id from Tasca WHERE nom='$nomt'");
											$tasca = mysql_result($query1, 0, "tasca_id");
											$query2 = mysql_query("SELECT o.oferta_id,o.descripcio,o.usuari_id,o.tasca_id,o.dataOferta,u.nomComplet from Oferta o, Usuari u 
																	WHERE o.tasca_id=$tasca && u.usuari_id=o.usuari_id ORDER BY o.dataOferta DESC");
											while ($row = mysql_fetch_array($query2)) {
												echo '<tr><td>' .$row['descripcio'].'</td>';
												echo '<td>' .$row['nomComplet']. '</td>';
												echo '<td>' .substr($row[dataOferta], 0, 10). '</td>';
												echo '</tr>';
											}
										?>
				
										<!-- FIN PHP -->
									</table>
								</td></tr>
<?php
																						echo '<td align="right"><form action="'.htmlentities($_SERVER['PHP_SELF']). '"method="POST"><input name="acceptar" id="acceptar" type="hidden" value="1"><button class=" btn btn-success">Acceptar</button></form></td>';
										?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>