<?php 
session_start();
if($_SESSION['con'] != 'true')
     echo "<script type='text/javascript'>window.location='./Acceuil.html';</script>";

$_SESSION['newTry'] = 1;
?>

<?php
if(isset($_POST['ok']))
{
     $nom = $_REQUEST['nom'];
     $prenom = $_REQUEST['prenom'];
     $email = $_REQUEST['email'];
     $password = $_REQUEST['password'];
     $ddn = $_REQUEST['ddn'];

     $echec="1";

     if($nom=="")
     {
          $echec=0 ;
          echo "Le champ nom est obligatoire<br>";
     }
     
     if($prenom=="")
     {
          $echec=0;  
          echo "Le champ prenom est obligatoire";
     }

     if($email=="")
     {
          $echec=0;
          echo "Le champ email est obligatoire";
     }
     if($ddn=="" )
     {
          $echec=0;
          echo "Le champ ddn est obligatoire";
     }
     if($password=="")
     {

          $echec=0;
          echo "Le champ Mot de passe est obligatoire<br>";

     }
     if($echec=="1") {
          mysql_connect('localhost', 'root', '');
          $bdd="gestioncv";
          mysql_select_db($bdd) or die("erreur de selection de base");
          $query="INSERT INTO infoperso VALUES ('$nom', '$prenom', '$ddn', '$email', '$password')";
          $resultat1=mysql_query($query);
          mysql_close();
          echo "<script type='text/javascript'>window.location='./index.html';</script>";

          print $message;
     }
     else {
          $message="Echec.<br>Corrigez votre saisie.<br>".$echec;
          print $message;
     }
}
else echo "passer d'abord par le formulaire";
?>