<?php 
	require_once("initialize.php");
	session_start();
	if(isset($_POST['confirmar'])) 
	{	$nom = $_SESSION['nomtas'];
												$tasca_id = $_SESSION['nomtas'];
												$usuari_id = $_SESSION['usuari_id'];
												$desc = $_SESSION['desc'];
		  $mainfunctions->crearOferta($desc, $tasca_id, $usuari_id);
		  $mainfunctions->RedirectToURL("solicitudspendents.php");
	}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSolicituds.html");

?> 
					<tr>
						<td>
							<table border="0">
										<tr>
											<td style='font-size:small; padding-bottom:70px'>La tasca a oferir es la seguent:</td>
										</tr>
										<tr>
										<?php 
												$nom = $_SESSION['nomtas'];
												$data_ofer = date('Y/m/d H:i:s');
												$tasca_id = $_SESSION['tasca_id'];
												$usuari_id = $_SESSION['usuari_id'];
												$desc = $_SESSION['desc'];



													echo "<td colspan='2' style='font-size:large' align='center'>" .$nom."</td>
										</tr>
										<tr>
											<td colspan='2' style='font-size:small; padding-bottom:30px' align='center'>".$desc. "</tr>
										<tr>";
										
											echo '<td style="padding-right:200px"><button class="btn btn-link">Tornar enrere</button></td>';
											echo '<td align="right"><form action="'.htmlentities($_SERVER['PHP_SELF']). '"method="POST"><input name="confirmar" id="confirmar" type="hidden" value="1"><button class=" btn btn-success">Confirmar</button></form></td>';
										?>
										</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>  
</html>  