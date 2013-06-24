<?php 
	require_once("initialize.php");

	if(isset($_POST['acceptada'])) { $mainfunctions->solicitudAcceptada(); }
	else if (isset($_POST['denegada'])) { $mainfunctions->solicitudDenegada(); }

echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSolicituds.html");
?>

					<tr>
						<td>
								<!-- Titulillos -->
								<!-- PHP -->
								<?php
								session_start();
								$mainfunctions->DBLogin();
								$usuari_id = $_SESSION['usuari_id'];
								$query = mysql_query("SELECT distinct(us.username), of.descripcio, us.telefon, us.positius, us.negatius, sol.solicitud_id FROM Solicitud sol, Oferta of, Usuari us WHERE us.usuari_id = sol.usuari_id AND sol.oferta_id = of.oferta_id AND sol.estat = 'PENDENT' AND of.usuari_id = '$usuari_id' ORDER BY sol.dataSolicitud DESC");
								if (mysql_num_rows($query) == 0)
								{
									echo
									'<h3 style="color:#08C; margin:0px;">Sol&#183licituds pendents</h3>
									<table>
										<tr>
											<td>
												<div class="alert alert-info" style="padding-right:10px; padding-left:10px; margin-top: 15px; margin-left: 0px;">
													<h5 style = "margin:0px;">Sembla que no tens sol&#183licituds pendents!</h5>
												</div>
											</td>
										</tr>
									</table>';
								}
								else
								{
									echo 
									'<table class="table">
										<tr id="list-names">
										<th style="width:80px;">Usuari</th>
										<th style="width:300px;">Descripci&oacute</th>
										<th>Telefon</th>
										<th>Valoraci&oacute </th>
										<th>Acci&oacute </th>
									</tr>';
									while ($row = mysql_fetch_array($query)) {
										echo '<tr>';
										echo '<td>'.$row[username].'</td>';
										echo '<td>'.$row[descripcio].'</td>';
										echo '<td>'.$row[telefon].'</td>';
										echo '<td><span style="color:#3ADF00">'.$row[positius].'</span>  <span style="color:red">'.$row[negatius].'</span></td>';
										echo '<td><form style="margin-bottom: 0px; padding-right: 4px; float: left;" action=' .htmlentities($_SERVER['PHP_SELF']). ' method="POST"><input name="acceptada" id="acceptada" type="hidden" value="'.$row[solicitud_id].'">';
										echo '<button class="btn btn-success" style="padding:3px; padding-top:0px; padding-bottom:0px"><i class="icon-ok"></i></button></form>';
										echo '<form style="margin-bottom: 0px; padding-right: 4px; float: left;" action=' .htmlentities($_SERVER['PHP_SELF']). ' method="POST"><input name="denegada" id="denegada" type="hidden" value="'.$row[solicitud_id].'">';
										echo '<button class="btn btn-danger" style="padding:3px; padding-top:0px; padding-bottom:0px"><i class="icon-remove" ></i></button></form>';
										echo '</td>';
										echo '</tr>';
									}
                                                                        echo '</table>';
								}
								?>
								<!-- FIN PHP -->
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>  
</html>  		