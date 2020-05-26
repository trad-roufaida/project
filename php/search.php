<?php
require  'db_connect.php';
session_start(); 
 

  if (isset($_POST['recherche'])) {

  	$artisant=mysqli_real_escape_string($db,$_POST['artisant']);
  	$ville=mysqli_real_escape_string($db,$_POST['ville']);

  	$query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.nom_metier = '$artisant' AND ville.nom_ville = '$ville'";
  
  	//'ville.nom_ville' LIKE '%$ville%*/
  	$query_exe = mysqli_query($db, $query); 
$annoutil = mysqli_fetch_array($query_exe);
var_dump($annout);
  /*  if(!$annoutil){

     array_push( $errors,"recherche invalide");

    }
    else { header("location:searchad.php?artisant=$artisant &ville=$ville "); }*/
    
  }

?>
