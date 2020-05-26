<?php
require  'db_connect.php';
//include 'php/rating.php';
//include('php/sidebar.php');
 $i=0;
$errors = array();

 if (isset($_GET['note']) ){ 
  $note=$_GET['note'];
    $query="SELECT etoile.id_annonce,ROUND(AVG(note)) AS notemoyenne,utilisateur.nom,utilisateur.prenom,ville.nom_ville,annonce.experience,utilisateur.n_telephone,annonce.date_creation,annonce.image,metier.nom_metier FROM etoile,annonce,utilisateur,ville,metier WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND etoile.id_annonce = annonce.id_annonce AND annonce.id_ville=ville.id_ville AND annonce.id_metier=metier.id_metier GROUP BY etoile.id_annonce HAVING notemoyenne='$note' ";

    $query_exe = mysqli_query($db, $query);
  }

/*if(!isset($_GET['id_ville']) && !isset($_GET['id_metier'])){
   $query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville ";
    $query_exe = mysqli_query($db, $query); 
    $quer=mysqli_num_rows($query_exe);
}*/
else if(isset($_GET['id_ville']) ){
$id_ville=$_GET['id_ville'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND ville.id_ville = '$id_ville'";
  $query_exe = mysqli_query($db, $query);  var_dump($query);
}
else if(isset($_GET['id_metier']) ){
$id_metier=$_GET['id_metier'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.id_metier = '$id_metier'";
  $query_exe = mysqli_query($db, $query); var_dump($query);

}

else{$query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville ";
    $query_exe = mysqli_query($db, $query); 
    $quer=mysqli_num_rows($query_exe);}
     header('location: toutesannonces.php');
?>
<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
<div class="sidebar box">
            <?php 
              $ville_check_query = "SELECT * FROM ville  ";
              $results1 = mysqli_query($db, $ville_check_query);
              ?>
              <form  >
              <select name="id_ville"  onchange="this.form.submit()" >
                <option value="0" >Ville</option>
                <?php  while ($ville = mysqli_fetch_array($results1)) { ?>
                   <option value="<?php echo $ville['id_ville'] ?>"> <?php echo $ville['nom_ville']; ?></option>
                 <?php } ?>
             </select>
                  

             </form>
             
             <?php 
          $metier_check_query = "SELECT * FROM metier order by id_metier ";
          $results = mysqli_query($db, $metier_check_query);
          
          ?>

      <form>
              <select name="id_metier"  onchange="this.form.submit()"  >
            <option value="0" >Metier</option>

            <?php  while ($metier = mysqli_fetch_array($results)) { ?>

         <option value="<?php echo $metier['id_metier'] ?>"> <?php echo $metier['nom_metier']; ?></option>
                <?php } ?>
         </select>
       </form>


        <form>
              <select name="note"  onchange="this.form.submit()"  >
             <option value="0" >Etoile</option>
             <option  value="1">1 etoile </option>
             <option  value="2">2 etoiles </option>
             <option  value="3">3 etoiles </option>
             <option  value="4">4 etoiles </option>
             <option  value="5">5 etoiles </option>
     
         </select>
         
       </form>

</div>

</body>
</html>