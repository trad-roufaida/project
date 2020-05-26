<?php 
  include('php/loginsignup.php');
/*require  'php/signup.php';*/
require  'db_connect.php';


$user_check_query = "SELECT * FROM utilisateur   LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);
 


if (isset($_POST['noter'])){
      if (!empty($_POST['rating'])){
          if (@$_SESSION['e_mail']){ 
            $note =  $_POST['rating'];
            $id_utilisateur=$user['id_utilisateur'];
            $id_annonce=@$_GET['id_annonce'];


            $requete="INSERT INTO etoile(id_annonce,id_utilisateur,note) VALUES ('$id_annonce','$id_utilisateur','$note')";
              mysqli_query($db, $requete);
            
          }
             else{ array_push($errors, "vous devez se connecter");}
    }}
?>




