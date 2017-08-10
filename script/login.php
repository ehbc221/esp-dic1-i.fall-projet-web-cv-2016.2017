 <?php
 if(isset($_POST['ok']))
 {
  session_start();  
  ?>  

  <?php
  $_SESSION['con'] = 'false';
  $_SESSION['utilisateur'] = '';
  define('DB_HOST', 'localhost');  
  define('DB_USER', 'root');
  define('DB_PASSWORD','');
  define('DB_NAME','gestioncv');

  $dblink = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

  if($dblink) {
      $selectdatabase = mysqli_select_db($dblink,DB_NAME);
    if(!$selectdatabase) {
        echo 'erreur lors de la selection de la bdd';
        exit;
    }
  } else {
      echo 'erreur de connexion a la bdd';
      exit;
  }
  $echec = 'true';
  if(isset($_POST["email"])!='' && isset($_POST["password"])!='')
  {
    $auth = mysqli_query($dblink,'SELECT * FROM infoperso');
    while($data = mysqli_fetch_array($auth)){
      if($data['password'] == $_POST["password"] && $data['email']==$_POST['email']){  
        $_SESSION['id_User'] = $data['id'];
        $_SESSION['utilisateur'] = $_POST['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['con'] = 'true';
        echo "<script type='text/javascript'>window.location='../accueil.html';</script>";
        break;
      } 
      else
        $echec = 'false';
    }
    if($echec=='false')
    {
      echo '<script type="text/javascript">alert("Erreur Sur les identifiants");</script>';
      echo "<script type='text/javascript'>window.location='../index.html';</script>";
    }
  }
  mysqli_close($dblink);
}
else
 echo "Vous devez dabord vous identifier ";
?>
