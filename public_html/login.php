<?php 
require_once("initialize.php");

if(isset($_POST['submitted']))
{
  if($mainfunctions->Login())
  {
       $mainfunctions->RedirectToURL("solicitudspendents.php");
  }
}
   
?>

<!DOCTYPE html>   
<html lang="en">   
	<head>   
		<meta charset="utf-8">   
		<title>Banc de Temps</title>   
		<meta name="description" content="Banc de Temps! Comparteix el teu temps amb els teus companys de universitat">   
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="text/js">
		<link href="css/style.css" rel="stylesheet">  

		
	</head>  
	<body>  
		<div class="container">
			<div id= "banner">
				<!-- Banner superior + opciones superiores -->
				<div class="upoptions">
					<ul>
						<li><a href="idiomaIni.php"><b>IDIOMA</b></a></li>
						<li><a href="ajudaIni.php"><b>AJUDA</b></a></li>
						<li><a href="sobrenosaltresIni.php"><b>SOBRE NOSALTRES</b></a></li>
						<li ><a style="margin-left: 60px;" href="login.php"><b>LOGIN</b></a></li>
					</ul>
				</div>
				<img src="img/UPClogo.gif" id="unilogo">
				<div id="bannerimg">
					<img src="img/BDTlogo.png" id="bdtlogo">
				</div>
			</div>
			<div class="menu-content" style="margin-left: 200px;">
				<div class="" id="loginModal" style="width:80%;">
					<div class="modal-body">
						<div class="well">
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane active in" id="login">
									<script>
									  function required()
										{
										var user = document.forms["loginForm"]["username"].value;
										var pass = document.forms["loginForm"]["password"].value;
										inputuser = document.getElementById('username');
										inputpass = document.getElementById('password');
										if (user != null && user != "")
										  {
										  inputuser.style.backgroundColor = "white";
										  }
										if (pass != null && pass != "")
										  {
										  inputpass.style.backgroundColor = "white";
										  }
										if ((user == null || user == "") && (pass == null || pass == ""))
										  {
										  inputuser.style.backgroundColor = "#F2DEDE";
										  inputpass.style.backgroundColor = "#F2DEDE";
										  return false;
										  }
										if (user == null || user == "")
										  {
										  inputuser.style.backgroundColor = "#F2DEDE";
										  return false;
										  }
										if (pass == null || pass == "")
										  {
										  inputpass.style.backgroundColor = "#F2DEDE";
										  return false;
										  }
										return true;
										}
									</script>
									<form name="loginForm" class="form-horizontal" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="POST" onsubmit="return required()">
										<fieldset>
										  <div id="legend">
											<legend class="">Login</legend>
										  </div>
										  <input type='hidden' name='submitted' id='submitted' value='1'/>
										  <div class="control-group">
											<!-- Username -->
											<label class="control-label"  for="username">Username</label>
											<div class="controls">
											  <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
											</div>
										  </div>

										  <div class="control-group">
											<!-- Password-->
											<label class="control-label" for="password">Password</label>
											<div class="controls">
											  <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
											</div>
										  </div>


										  <div class="control-group">
											<!-- Button -->
											<div class="controls">
											  <button class="btn btn-success">Login</button>
											</div>
										  </div>
										</fieldset>
									</form>                
								</div>
							</div>
						</div>
					</div>
				</div>
				<div><span style="color:red;"><?php echo $mainfunctions->GetErrorMessage(); ?></span></div>
			</div>
	</body>  
</html>