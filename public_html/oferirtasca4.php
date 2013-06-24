<?php 
	require_once("initialize.php");
	session_start();
if(isset($_POST['confirmar']))
{
		session_start();
		$_SESSION['desc'] = $_POST['desc'];
       $mainfunctions->RedirectToURL("oferirtasca5.php");
}
echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesOferir.html");
?>
					<tr>
						<td>
						<table style="margin-top: 10px;">
<?php echo '<form action="'.htmlentities($_SERVER['PHP_SELF']). '"method="POST">'; ?>
								<tr>
									<?php echo '<td>Nom tasca: '.$_SESSION['nomtas']. ''; ?>  
									</td>
								</tr>
								<tr>
									<td>
										Descripci&oacute detallada
									</td>
								</tr>
								<tr>
									<td><input name="confirmar" id="confirmar" type="hidden" value="1"/>
										<textarea name='desc' rows="5" style="width:487px;"></textarea>
									</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-inverse" style="width:100px;">Cancel&middotlar</button>
	<td align="right"><button class=" btn btn-primary">Realitzar</button></td>

											
									</td>
								</tr>

							</form></table>

						</td>
					</tr>
				</table>
			</div>
		</div>
	</body>  
</html>  