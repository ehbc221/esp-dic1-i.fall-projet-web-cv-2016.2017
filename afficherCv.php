<?php 
session_start();
if($_SESSION['con'] != 'true')
	echo "<script type='text/javascript'>window.location='../index.html';</script>";

$_SESSION['newTry'] = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Afficher CV</title>
	<link rel="stylesheet" type="text/css" href="./css/afficherCv.css">
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/accueil.css">
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
					<li ><a href="accueil.html">Accueil</a></li>
                    <li class="active"><a href="./afficherCv.php">Afficher mon Cv</a></li>
					<li ><a href="./creerCv.php">Créer Cv</a></li>
					<li><a href="./editerCv.php">Editer Cv</a></li>
					<li style="float:right;"><a href="./script/deconnexion.php">Deconnexion</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
    <div id="theme1">
        <center><h1>Mon CV</h1></center>
        <br/>

        <br/>
        <div id="page-wrap">

            <div id="contact-info" class="vcard">

                <!-- Microformats! -->
            <?php $id=$_SESSION['id_User']; $bdd='gestioncv';
                $db=mysqli_connect('localhost', 'root', '') or die("erreur de connexion ");
                mysqli_select_db($db,$bdd) or die("erreur de connexion a la base de donnees");
                $query_1="select nom,prenom,email,dateNaissance from infoperso where id=$id ";
                $result=mysqli_query($db,$query_1); $enregistrement=mysqli_fetch_array($result);?>
                <h1 class="fn"><?php echo $enregistrement['prenom'].'   '.$enregistrement['nom'] ?> </h1>

                <p>
                    <strong>Email:</strong> <?php echo $enregistrement['email']; ?><br />
                    <strong>Telephone:</strong> <span class="tel">77 533 83 61</span><br />
                    <strong>Date de Naissancee:</strong> <?php echo $enregistrement['dateNaissance']; ?>
                </p>
            </div>

            <div id="objective">
                <p>

                </p>
            </div>

            <div class="clear"></div>

            <dl>
                <dd class="clear"></dd>

                <dt>Formations</dt>
                <dd>
                    <h2>ANNEE / &nbsp;&nbsp;DIPLOMES  / UNIVERSITE</h2>
                    <?php $query_1="select * from formation where personne=$id ";
                            $result=mysqli_query($db,$query_1);
                            while($enregistrement=mysqli_fetch_array($result))
                    {?>
                    <p>
                        <strong><?php echo $enregistrement['annee']?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $enregistrement['intitule']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $enregistrement['ecole']?></strong> <br />
                   </p><?php }?>
                </dd>
                <dd class="clear"></dd>
               <dd class="clear"></dd>

                <dt>Experience</dt>
                <dd>
                    <h2>PERIODE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/ &nbsp;&nbsp;&nbsp;ENTREPRISE</h2>
                    <?php $query_1="select * from stage where personne=$id ";
                            $result=mysqli_query($db,$query_1);
                            while($enregistrement=mysqli_fetch_array($result))
                    {?>
                    <p>
                        <strong><?php echo $enregistrement['debut'].' /  '.$enregistrement['fin']?> </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $enregistrement['entreprise']?> <br />
                   </p><?php }?>


                </dd>

                <dd class="clear"></dd>
                <dd class="clear"></dd>

                <dt>Hobbies</dt>
                <dd>HOBBIES</dd>


            </dl>

            <div class="clear"></div>
        </div>
    </div>
</body>
</html>