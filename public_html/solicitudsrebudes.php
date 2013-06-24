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
								$query = mysql_query("SELECT sol.solicitud_id, sol.dataSolicitud, t.nom, u2.nomComplet, sol.estat FROM Tasca t, Solicitud sol, Oferta o, Usuari u, Usuari u2 WHERE o.usuari_id='$usuari_id' && sol.oferta_id=o.oferta_id && u2.usuari_id=sol.usuari_id && u.usuari_id=o.usuari_id &&  t.tasca_id=o.tasca_id ORDER BY sol.dataSolicitud DESC ;");
								if (mysql_num_rows($query) == 0)
								{
									echo
									'<h3 style="color:#08C; margin:0px;">Sol&#183licituds rebudes</h3>
									<table>
										<tr>
											<td>
												<div class="alert alert-info" style="padding-right:10px; padding-left:10px; margin-top: 15px; margin-left: 0px;">
													<h5 style = "margin:0px;">Sembla que no has rebut cap sol&#183licitud!</h5>
												</div>
											</td>
										</tr>
									</table>';
								}
								else
								{									
									echo 
									'<h3 style="color:#08C; margin:0px;">Sol&#183licituds rebudes</h3>
									<table class="table">
										<tr id="list-names">
										<th>Data</th>
										<th style="width:300px;">Tasca</th>
										<th style="width:80px;">Alumne</th>
										<th>Estat</th>
									</tr>';
									while ($row = mysql_fetch_array($query)) {
										echo '<tr>';
										echo '<td>' .substr($row[dataSolicitud], 0, 10).'</td>';
										echo '<td>'.$row[nom].'</td>';
										echo '<td>'.$row[nomComplet].'</td>';
										echo '<td>'.$row[estat].'</td>';
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