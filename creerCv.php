<?php 
	session_start();
	if($_SESSION['con'] != 'true')
		echo "<script type='text/javascript'>window.location='./index.html';</script>";
	
	$_SESSION['newTry'] = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Créer CV</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/creerCv.css">
	<link rel="stylesheet" type="text/css" href="./css/accueil.css">
	<link rel="stylesheet" type="text/css" href="./css/cv.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Site de CV en ligne</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="pull-left"><a href="accueil.html">Accueil</a></li>
                    <li><a href="./afficherCv.php">Afficher mon Cv</a></li>
					<li class="active"><a href="./creerCv.php">Créer Cv</a></li>
					<li><a href="./editerCv.php">Editer Cv</a></li>
					<li style="float:right;"><a href="./script/deconnexion.php">Deconnexion</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<h1 style="text-align: center">Creation CV</h1>
	<br/>
	<div id ="form">
		<form  method="post" action="./script/creerCv.php">
			<br/>
			<br/>
			<div >
				<h4 style="text-decoration: underline;">Fournir les formations</h4>
				<span id="formation_1"><button class="btn btn-theme" onclick=""><a href="javascript:create_formation(1)">Ajouter une formation</a></button></span>
				<br/>
				<br/>
			</div>
			<br/> 
			<div >  
				<h4 style="text-decoration: underline;">Fournir Vos Stages</h4>
				<span id="stage_1"><button  class="btn btn-theme" onclick=""><a href="javascript:create_stage(1)">Ajouter un Stage</a></button></span>
			</div>	
			<br/><input type="submit" class="btn btn-default" name="ok" value="Valider" /><br />

			
		</form>
	</div>
	<script>
		function create_formation(i) {

			var j = i + 1;
			if(document.getElementById('formation_'+i))
			{
				document.getElementById('formation_'+i).innerHTML = '<fieldset ><legend>Formation'+i+'</legend><table style="font-family:Verdana"><tr><td>Intitule: </td><td><input type="text" width="50" name="nom_'+i+'"/></td></tr><tr><td>Etablissement : </td><td><input type="text" width="" name="cite_'+i+'"/></td></tr><tr><td>Année: </td><td><input type="date" width="50" name="date_'+i+'"/></td></tr></table><input type="hidden" name="nbreFormation" value="'+i+'"/></fieldset>';
				document.getElementById('formation_'+i).innerHTML += '<span id="formation_'+j+'"><button  class="btn btn-danger"><a href="javascript:create_formation('+j+')">Ajouter une formation</a></button></span>';
			}
			
		}
		function create_stage(i) {

			var j = i + 1;
			if(document.getElementById('stage_'+i))
			{
				document.getElementById('stage_'+i).innerHTML = '<fieldset ><legend>Stage'+i+'</legend><table style="font-family:Verdana"><tr><td>Entreprise: </td><td><input type="text" width="50" name="entreprise_'+i+'"/></td></tr><tr><td>Debut : </td><td><input type="date" width="50" name="debut_'+i+'"/></td></tr><tr><td>Fin: </td><td><input type="date" width="50" name="fin_'+i+'"/></td></tr></table><input type="hidden" name="nbreStage" value="'+i+'"/> </fieldset>';
				document.getElementById('stage_'+i).innerHTML += '<span id="stage_'+j+'"><button  class="btn btn-danger"><a href="javascript:create_stage('+j+')">Ajouter un stage</a></button></span>';
			}
			
		}
	</script>
</body>
</html>