<?php
session_start();
// initializing variables
$nom = "";
$prenom = "";
$e_mail    = "";
$mot_de_passe = "";
$age = "";
$n_telephone="";
$errors = array(); 
 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'memoire');
if (!$db) {
  die("echec de connectiona la base de données".mysqli_error($db));
}
/*$select_db=mysqli_select_db($db, 'test');
if (!$select_db) {
  die("echec de selecion de la base de données".mysqli_error($db));
}*/

// REGISTER USER
if (isset($_POST['creer'])) {
  // receive all input values from the form
  $nom = mysqli_real_escape_string($db, $_POST['nom']);
  $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
  $e_mail = mysqli_real_escape_string($db, $_POST['e_mail']);
  $mot_de_passe =mysqli_real_escape_string($db, $_POST['mot_de_passe']);
  $conffirmer_mot = mysqli_real_escape_string($db, $_POST['conffirmer_mot']);
   $age = mysqli_real_escape_string($db, $_POST['age']);
    $n_telephone = mysqli_real_escape_string($db, $_POST['n_telephone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nom)) { array_push($errors, "nom manquant"); }
  if (empty($prenom)) { array_push($errors, "nom manquant"); }
  if (empty($e_mail)) { array_push($errors, "Email manquant"); }
  if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "format d''email invalide");
    }
  if (empty($mot_de_passe)) { array_push($errors, "mot de passe manquant"); }
  if ($mot_de_passe != $conffirmer_mot) {
    array_push($errors, "les deux mots de passes sont différents");
  }
// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM utilisateur WHERE (nom='$nom' and prenom='$prenom') OR e_mail='$e_mail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['nom'] === $nom && $user['prenom'] === $prenom) {
      array_push($errors, "nom et prenom existant");
    }

    if ($user['e_mail'] === $e_mail) {
      array_push($errors, "email existant");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
   // $mot_de_passe = sha1($mot_de_passe);//encrypt the password before saving in the database
  //$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $query = "INSERT INTO utilisateur (nom, prenom, e_mail, mot_de_passe, age, n_telephone) 
              VALUES('$nom', '$prenom', '$e_mail', '$mot_de_passe','$age','$n_telephone')";
    mysqli_query($db, $query);
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
  
     $_SESSION['comptecrée']= "vous etes maintenant connecté";
    header('location: index.php');
  }
}






//login user
if (isset($_POST['connecter'])) { 
  $e_mail = mysqli_real_escape_string($db, $_POST['e_mail']);
  $mot_de_passe =mysqli_real_escape_string($db, $_POST['mot_de_passe']);

  if (empty($e_mail)) {
    array_push($errors,"e_mail obligatoire");
  }
  if (empty($mot_de_passe)) {
    array_push($errors, "mot de passe obligatoire");
  } 

  if (count($errors)==0) {
    
    
    
    $query = "SELECT * FROM utilisateur WHERE e_mail='$e_mail' AND mot_de_passe='$mot_de_passe'"; 
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
    
   $check=mysqli_fetch_assoc($result);
$id_utilisateur=$check['id_utilisateur'];
$num=mysqli_num_rows($result);
  if ($num == 1) {
    $_SESSION['id_utilisateur']=$check['id_utilisateur'];
    $_SESSION['e_mail']=$check['e_mail'];
      header('location:index.php?');
          // header('location: profil.php?id_utilisateur=$id_utilisateur');
            }
        
    else {
      array_push($errors, "combinaison d'e_mail et mot de passe invalide");
       }
  
}
/*else{
  session_destroy();
}*/}



?>