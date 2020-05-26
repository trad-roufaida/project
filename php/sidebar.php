<?php
require  'db_connect.php';

 $i=0;
$errors = array();

 if (isset($_GET['note']) ){
    $note=$_GET['note'];

   header('location: toutesannonces.php?note=' .$note ); 
  }


else if(isset($_GET['id_ville']) ){
$id_ville=$_GET['id_ville'];
   header('location: toutesannonces.php?id_ville=' .$id_ville ); 
}
else if(isset($_GET['id_metier']) ){
$id_metier=$_GET['id_metier'];
  header('location: toutesannonces.php?id_metier=' .$id_metier ); 
 
}

?>
