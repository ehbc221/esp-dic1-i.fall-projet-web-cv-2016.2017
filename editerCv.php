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
	<title>Editer CV</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/creerCv.css">
	<link rel="stylesheet" type="text/css" href="./css/accueil.css">
	<link rel="stylesheet" href="./css/cv.css">
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
					<li ><a href="./creerCv.php">Créer Cv</a></li>
					<li class="active"><a href="./editerCv.php">Editer Cv</a></li>
					<li style="float:right;"><a href="./script/deconnexion.php">Deconnexion</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<center><h1>Editer CV</h1></center>
	<br/>
	<hr/>
	<div style="position:absolute;left:10%;width:80%;text-align:center;">
	<form method="post" class="form-horizontal" role="form" action="./script/edit.php">
	<?php  
			$id=$_SESSION['id_User'];
	 		$bdd='gestioncv';
			$db=mysqli_connect('localhost', 'root', '') or die("erreur de connexion ");
			mysqli_select_db($db,$bdd) or die("erreur de connexion a la base de donnees");
			$query_1="select * from formation where personne=$id";
			$result=mysqli_query($db,$query_1);
			$i=0;
			while($enregistrement=mysqli_fetch_array($result))
				{?> 
					<div class="form-group">
      					<label class="col-sm-2" for="formation">Formation <?php $i++; echo $i;?> </label>
      					<div class="col-sm-5"><input class="form-control" id="intitule" type="text" placeholder="intitule" name="nom_<?php echo $i ;?>" value="<?php echo $enregistrement["intitule"]?>"></div>
    				</div>
    				<div class="form-group">
      					<label class="col-sm-2" for="formation">Ecole</label>
      					<div class="col-sm-5"><input class="form-control" id="ecole" type="text" placeholder="intitule" name="cite_<?php echo $i ;?>" value="<?php echo$enregistrement["ecole"]?>"></div>
    				</div>
    				<div class="form-group">
      					<label class="col-sm-2" for="formation">Année</label>
      					<div class="col-sm-5"><input class="form-control" id="date" type="text" placeholder="annee" name="date_<?php echo $i ;?>" value="<?php echo $enregistrement["annee"]?>"></div>
    				</div><?php }
	?>  <input type="hidden" name="nbreFormation" value="<?php echo $i?>" >
		<br/><br/>
		<?php
			$query_2="select * from stage where personne=$id ";
			$resultat=mysqli_query($db,$query_2);
			$j=0;
			while($enregistrement=mysqli_fetch_array($resultat))
				{?> 
					<div class="form-group">
      					<label class="col-sm-2" for="formation">Stage <?php $j++; echo $j ;?> </label>
      					<div class="col-sm-5"><input class="form-control" id="entreprise" type="text" placeholder="intitule" name="entreprise_<?php echo $j ;?>" value="<?php echo $enregistrement["entreprise"]?>"></div>
    				</div>
    				<div class="form-group">
      					<label class="col-sm-2" for="formation">Date Debut</label>
      					<div class="col-sm-5"><input class="form-control" id="debut" type="text" placeholder="debut" name="debut_<?php echo $j ;?>" value="<?php echo$enregistrement["debut"]?>"></div>
    				</div>
    				<div class="form-group">
      					<label class="col-sm-2" for="formation">Date Fin</label>
      					<div class="col-sm-5"><input class="form-control" id="fin" type="text" placeholder="fin" name="fin_<?php echo $j ;?>" value="<?php echo $enregistrement["fin"]?>"></div>
    				</div><?php }
	?>
		<input type="hidden" name="nbreStage" value="<?php echo $j?>" >
        <div class="form-group">
      		<div class="col-sm-6">
        		<button class="btn btn-theme pull-right" type="submit">Valider</button>
      		</div>
    	</div>
	</form>
	</div>
</body>
</html>