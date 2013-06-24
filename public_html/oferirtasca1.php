<?php 
	require_once("initialize.php");
if(isset($_POST['submitted']))
{
		session_start();
		$_SESSION['nomcat'] = $_POST['nomcat'];
       $mainfunctions->RedirectToURL("oferirtasca2.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesOferir.html");
?> 
					<tr>
						<td>
							<table>
								<tr><td>
									<p style="margin-bottom:20px;">Selecciona Categoria:</p>
								</td></tr>
										<form id="filter" name="filter" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST">
												<!-- PHP -->
												<?php
													session_start();
													$mainfunctions->DBLogin();
													$options = '';
													$query = mysql_query("SELECT * from Categoria");
													while ($row = mysql_fetch_array($query)) {
														$options .="<option>" .$row['nom']. "</option>";
													}
													$menu="<table border='0'>
														<tr>
															<td>
																<input type='hidden' name='submitted' id='submitted' value='1'/>
																<select name='nomcat'>
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