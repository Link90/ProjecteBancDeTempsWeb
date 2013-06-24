<?php 
	require_once("initialize.php");
if(isset($_POST['confirmar']))
{
		session_start();
		$_SESSION['desc'] = $_POST['desc'];
       $mainfunctions->RedirectToURL("suggerirtasca2.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSuggerir.html");
?> 
					<tr>
						<td>
						<table style="margin-top: 10px;">
<?php echo '<form action="'.htmlentities($_SERVER['PHP_SELF']). '"method="POST">'; ?>
								<tr>
									<td>
										Descriu la nova tasca a suggerir:
									</td>
								</tr>
								<tr>
									<td><input name="confirmar" id="confirmar" type="hidden" value="1"/>
										<textarea name='desc' rows="5" style="width:487px;"></textarea>
									</td>
								</tr>
								<tr>
									<td align="right"><button class=" btn btn-primary">Suggerir</button></td>
								</tr>

							</form></table>

						</td>
					</tr>
				</table>
			</div>
		</div> 
	</body>
</html>