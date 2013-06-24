<?php 
	require_once("initialize.php");
if(isset($_POST['submitted']))
{
		session_start();
		$_SESSION['nomtas'] = $_POST['nomtas'];
       $mainfunctions->RedirectToURL("solicitartasca3.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSolicitar.html");
?>
					<tr>
						<td>
							<table>
								<tr><td>
									<p style="margin-bottom:20px;">Selecciona Tasca:</p>
								</td></tr>
								<form id="filter" name="filter" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST">
												<!-- PHP -->
												<?php
													session_start();
													$mainfunctions->DBLogin();
													$nomc = $_SESSION['nomcat'];
													$options = '';
													$query1 = mysql_query("SELECT categoria_id from Categoria WHERE nom='$nomc'");
													$categoria = mysql_result($query1, 0, "categoria_id");
													$query2 = mysql_query("SELECT * from Tasca WHERE categoria_id='$categoria'");
													while ($row = mysql_fetch_array($query2)) {
														$options .="<option>" .$row['nom']. "</option>";
													}
													$menu="<table border='0'>
														<tr>
															<td>
																<input type='hidden' name='submitted' id='submitted' value='1'/>
																<select name='nomtas'>
																	" .$options. "
																</select>
															</td>
														</tr>
														<tr>
															<td>
																<button class='btn btn-success' style='margin-left:137px; margin-top:35px;'>Acceptar</button>
															</td>
														</tr>
													</table>";
													echo $menu;
												?>
												<!-- FIN PHP -->
										</form>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>  
</html>