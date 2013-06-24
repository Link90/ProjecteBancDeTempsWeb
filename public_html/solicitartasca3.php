<?php 
	require_once("initialize.php");
if(isset($_POST['rowselected']))
{
		session_start();

		$_SESSION['oferta_id'] = $_POST['rowselected'];
      $mainfunctions->RedirectToURL("solicitartasca4.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSolicitar.html");
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
$usuari_id= $_SESSION['usuari_id'];
											$query1 = mysql_query("SELECT tasca_id from Tasca WHERE nom='$nomt'");
											$tasca = mysql_result($query1, 0, "tasca_id");
											$query2 = mysql_query("SELECT o.oferta_id,o.descripcio,o.usuari_id,o.tasca_id,o.dataOferta,u.nomComplet from Oferta o, Usuari u
																	WHERE o.tasca_id=$tasca && u.usuari_id=o.usuari_id and u.usuari_id<>$usuari_id ORDER BY o.dataOferta DESC");
											while ($row = mysql_fetch_array($query2)) {
												echo '<tr><form action=' .htmlentities($_SERVER['PHP_SELF']). ' method="POST"><input name="rowselected" id="rowselected" type="hidden" value="'.$row['oferta_id'].'">';
												echo '<td><button style="padding: 0;border: none;background: none;" >'.$row['descripcio']. '</button></td>';
												echo '<td>' .$row['nomComplet']. '</td>';
												echo '<td>' .$row['dataOferta']. '</td>';
												echo '</form></tr>';
											}
										?>
										<!-- FIN PHP -->
                                                                                
									</table>
                                                                         <tr><td> *Clica el nom de la oferta que vulguis veure per poder sol&#183licitar-la</td></tr>
								</td></tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>