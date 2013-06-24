<?php 
	require_once("initialize.php");

echo file_get_contents("esquelet.html");
echo file_get_contents("navTasquesSuggerir.html");
?> 
				<tr>
                 
					<td>
						<h3 style="color:#08C;"> Tasca Suggerida </h3>
					</td>
				 </tr><tr>
					 <td><div class="alert">
						<?php
							session_start();
							echo $_SESSION['desc'];
						?>
					</div></td>
		
			       </tr>
                               <tr>
					<td>*El suggeriment s'ha enviat a l'administrador del bancdetemps.hol.es</td>
			       </tr>
			</div>
		</div> 
	</body>
</html>
