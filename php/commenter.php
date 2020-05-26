<?php 
 // include('php/loginsignup.php');
require  'db_connect.php';


$user_check_query = "SELECT * FROM utilisateur   LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);
 


if (isset($_POST['commenter'])){
      if (!empty($_POST['commentaire'])){
          if (@$_SESSION['e_mail']){ 
            $commentaire =  $_POST['commentaire'];
            $id_utilisateur=$user['id_utilisateur'];
            $id_annonce=@$_GET['id_annonce'];


            $requete="INSERT INTO commentaire(id_annonce,id_utilisateur,commentaire) VALUES ('$id_annonce','$id_utilisateur','$commentaire')";
              mysqli_query($db, $requete);
            }
             else{ array_push($errors, "vous devez se connecter");}
    }}
?>