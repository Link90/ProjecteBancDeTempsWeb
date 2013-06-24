<?php 
	require_once("initialize.php");
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
								<tr><td>
									<h3 style="color:#08C;"> Usuaris Actius </h3>
								</td></tr>
									<tr>
										<td>Els 10 usuaris més actius són:</td>
									</tr>
											<table border="0">	
											<!-- PHP -->
											<?php
												session_start();
												$mainfunctions->DBLogin();
												$query_array = mysql_query("SELECT nomComplet FROM Usuari");
												$array_act=array();
												while ($row = mysql_fetch_array($query_array)) {
													$nom = $row["nomComplet"];
				
													$query = sprintf("SELECT Count(*) as Activitat FROM Usuari u, Solicitud s WHERE u.usuari_id = s.usuari_id and s.estat<>'CONFIRMAT'and u.nomComplet='%s'",mysql_real_escape_string($nom));
													$data = mysql_query($query);
													$row = mysql_fetch_assoc($data);
													$activitat1 = $row['Activitat'];

													$query = sprintf("SELECT Count(*) as Activitat FROM Usuari u, Oferta o WHERE u.usuari_id=o.usuari_id and u.nomComplet='%s'",mysql_real_escape_string($nom));
													$data = mysql_query($query);
													$row = mysql_fetch_assoc($data);
													$activitat2 = $row['Activitat'];

													$query = sprintf("SELECT Count(*) as Activitat FROM Usuari u, Solicitud s WHERE u.usuari_id = s.usuari_id and s.estat='CONFIRMAT' and u.nomComplet ='%s'",mysql_real_escape_string($nom));
													$data = mysql_query($query);
													$row = mysql_fetch_assoc($data);
													$activitat3 = $row['Activitat'];

													$query = sprintf("SELECT Count(*) as Activitat FROM Usuari u, Oferta o, Solicitud s WHERE u.usuari_id=o.usuari_id and o.oferta_id=s.oferta_id and s.estat='CONFIRMAT' and u.nomComplet ='%s'",mysql_real_escape_string($nom));
													$data = mysql_query($query);
													$row = mysql_fetch_assoc($data);
													$activitat4 = $row['Activitat'];


													$activitat_total = $activitat1+($activitat2*2)+($activitat3*2)+($activitat4*4);
													$new_array = array($nom => $activitat_total);
													$array_act = array_merge((array)$array_act, (array)$new_array);
		
												}
												asort($array_act);
												$array_act = array_reverse((array) $array_act,true);
												$i = 1;
												echo '<tr>
													<th width="50" align="left">Pos</th>
													<th width="150" align="left">Alumne</th>
													<th align="left">Activitat</th>
												</tr>';
												foreach($array_act as $key => $value) {
												    if ($i <= 10) {
												       echo '
													 <tr>
														<td width="50" align="left">'.$i.'</td>
														<td width="150" align="left">'.$key.'</td>
														<td align="left">'.$value.'</td>													</tr>';
													$i = $i+1;
												    }
												}
											?>
											<!-- FIN PHP -->
											</table>

							</table>
						</td>
					</tr>
				</table>
			</div>
		</div> 
	</body>
</html>