<?php 
	require_once("initialize.php");
        echo file_get_contents("esquelet.html");

?> 
					<tr>
						<td>
							<ul class="nav nav-tabs" style="margin-bottom: 10px;">
							  <li><a href="consultarsaldo1.php">Consultar Saldo</a></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<table>
								<tr><td>
									<p style="margin-bottom:20px;">Saldo d'hores</p>
								</td></tr>
									<tr>
										<td>El teu saldo d'hores actual és:
									
											<table border="0">	
											<!-- PHP -->
											<?php
												session_start();
												$mainfunctions->DBLogin();
                                                                                                $us_id = $_SESSION['usuari_id'];
							                                        $query_hores1 = mysql_query("SELECT SUM(hores) as hores from Usuari u, Oferta o, Solicitud s WHERE u.usuari_id='$us_id' and u.usuari_id=o.usuari_id and s.estat ='CONFIRMAT' and o.oferta_id=s.oferta_id");
                                                                                                $query_hores2 = mysql_query("SELECT SUM(hores) as hores from Usuari u,Solicitud s WHERE u.usuari_id='$us_id' and u.usuari_id= s.usuari_id and s.estat ='CONFIRMAT'");
                                                                                                $treballades = mysql_result($query_hores1,0,'hores');
                                                                                                $rebudes= mysql_result($query_hores2,0,'hores');
                                                                                                $diff = $treballades-$rebudes;
                                                                                                echo "".$diff."</td></tr>";
                                                                                                echo "<tr>
                                                                                                       <td>Hores de tasques realitzades per a altres usuaris: ".$treballades." hores</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                       <td>Hores de tasques realitzades per altres usuaris: ".$rebudes." hores</td>
                                                                                                </tr>";
                                                                                                
												
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