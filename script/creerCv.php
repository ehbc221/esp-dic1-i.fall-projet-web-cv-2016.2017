<?php 
session_start();
if($_SESSION['con'] != 'true')
	echo "<script type='text/javascript'>window.location='../index.html';</script>";

$_SESSION['newTry'] = 1;
?>

<?php 

if(isset($_POST['ok']))
{
    $id=$_SESSION['id_User'];
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=gestioncv;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
	$nbreFormation=$_POST['nbreFormation'];
	$nbreStage=$_POST['nbreStage'];
	for($i=1;$i<=$nbreFormation;$i++)
	{

		$libelle = $_POST['nom_'.$i];
		$ecole = $_POST['cite_'.$i];	
		$date = $_POST['date_'.$i];
        $req = $db->prepare("INSERT INTO formation (intitule,ecole,annee,personne) VALUES ('$libelle', '$ecole', '$date','$id');");
        $req->execute(array(
            'intitule' => $libelle,
            'ecole' => $ecole,
            'annee' => $date,
            'personne' => $id
        ));
	}
	for($i=1;$i<=$nbreStage;$i++)
	{

		$entreprise = $_POST['entreprise_'.$i];
		$debut = $_POST['debut_'.$i];	
		$fin = $_POST['fin_'.$i];
        $req = $db->prepare("INSERT INTO stage (entreprise,debut,fin, personne) VALUES ('$entreprise', '$debut', '$fin',$id);");
        $req->execute(array(
            'entreprise' => $entreprise,
            'debut' => $debut,
            'fin' => $fin,
            'personne' => $id
        ));
	}

	header('Location: ../accueil.html');
}	  
?>