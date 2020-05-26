<?php
require  'db_connect.php';
include 'php/sidebar.php';

$errors = array();
$i=0;
   $artisant=@$_GET['artisant'];
    $ville=@$_GET['ville'];
  
  if(!empty($artisant) && !empty($ville)){
    $query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.nom_metier = '$artisant' AND ville.nom_ville = '$ville'";
   

    if (isset($_GET['note']) ){ 
  $note=$_GET['note'];
    $query="SELECT etoile.id_annonce,ROUND(AVG(note)) AS notemoyenne,utilisateur.nom,utilisateur.prenom,ville.nom_ville,annonce.experience,utilisateur.n_telephone,annonce.date_creation,annonce.image,metier.nom_metier FROM etoile,annonce,utilisateur,ville,metier WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND etoile.id_annonce = annonce.id_annonce AND annonce.id_ville=ville.id_ville AND annonce.id_metier=metier.id_metier GROUP BY etoile.id_annonce HAVING notemoyenne='$note' AND metier.nom_metier = '$artisant' AND ville.nom_ville = '$ville' ";

  }
else if(isset($_GET['id_ville']) ){
$id_ville=$_GET['id_ville'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND ville.id_ville = '$id_ville' AND metier.nom_metier = '$artisant' AND ville.nom_ville = '$ville'"; 
}
else if(isset($_GET['id_metier']) ){
$id_metier=$_GET['id_metier'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.id_metier = '$id_metier' AND metier.nom_metier = '$artisant' AND ville.nom_ville = '$ville'";

}}


else if(!empty($artisant) && empty($ville)){
      $query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.nom_metier = '$artisant'";
     
     if (isset($_GET['note']) ){ 
     $note=$_GET['note'];
     $query="SELECT etoile.id_annonce,ROUND(AVG(note)) AS notemoyenne,utilisateur.nom,utilisateur.prenom,ville.nom_ville,annonce.experience,utilisateur.n_telephone,annonce.date_creation,annonce.image,metier.nom_metier FROM etoile,annonce,utilisateur,ville,metier WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND etoile.id_annonce = annonce.id_annonce AND annonce.id_ville=ville.id_ville AND annonce.id_metier=metier.id_metier GROUP BY etoile.id_annonce HAVING notemoyenne='$note' AND metier.nom_metier = '$artisant' ";

  }

else if(isset($_GET['id_ville']) ){
$id_ville=$_GET['id_ville'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND ville.id_ville = '$id_ville' AND metier.nom_metier = '$artisant'";
}
else if(isset($_GET['id_metier']) ){
$id_metier=$_GET['id_metier'];
  $query="SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.id_metier = '$id_metier' AND metier.nom_metier = '$artisant'";

} }


  $query_exe = mysqli_query($db, $query); 
    $quer=mysqli_num_rows($query_exe);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>mes annonces</title>
<link rel="stylesheet"  href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
  <script src="js/jquery/jquery-3.3.1.min.js"></script>
 <link rel="stylesheet" href="css/annonces.css">
    <style type="text/css">
      .star-rating{ padding-top: 10px;}
      .rated{color: #f2b600;}
      .box select{
    border:none;
    outline: none;
    background: none;
    color: black;
    display: block;
    margin: 9px auto;
    text-align: center;
    border: 2px solid grey;
    padding: 14px 10px;
    width: 200px;
    transition: 0.25s;
    font-family: BRLNSB;}

    .box select:focus{
    width: 250px;
    border-color: #f0932b;

   }

    </style>

</head>

<body>
    <div id="nav-placeholder"></div>
           <script>
        $(function(){
         $("#nav-placeholder").load("navbar.php");
         });

 </script>

  
    <div  style="margin-top: 0px;padding-top: 200px;"></div>
 <?php  if($annoutil= mysqli_fetch_array($query_exe)  ) { 
            ?> 
      
          <div class="content clearfix">
  
 <div class="box">
  <?php $quer=$quer; ?>
  <p style="color:#f0932b; text-align: center; text-transform: uppercase; font-size: 22px; font-family: BRLNSB;">
 <?php if($quer=1)  { echo $quer; echo '&nbsp'; echo $annoutil['nom_metier']; echo '&nbsp'; echo "trouvé";} else {echo $quer; echo '&nbsp'; echo $annoutil['nom_metier']; echo "s trouvés"; } ?>
  <!--  <?= $quer ?>  <?= $annoutil['nom_metier'],"s"  ?> trouvés </p>-->
 </div>
     
<div class="main-content">
     <?php  include('php/errors.php')?> 
  <div class="ads"> 
  <?php do  { 
  ?>  
  <a href="searchad2.php?id_annonce=<?= $annoutil['id_annonce']?>">  <form   class="box best" action="" method="post"> 
       
        <?php if(!empty($annoutil['image'])) { ?>
        <tr   class='ad-image'>
        <td><img src="img/<?php echo $annoutil['image']  ?>" alt='image' width='150px' height='150' ></td>
               </tr >
        <?php } else {?>
        <tr   class='ad-image'>
        <td><img src="img/default.png" alt='image' width='150px' height='150'></td>
              </tr >
             <?php } ?> 
         
                   <div class="ads-info">  <tr>
                  <td><h2><?php echo $annoutil['nom_metier']  ?></h2>
                  </td>
                </tr>
                <br>
              
                <tr>
                  <td>Nom et Prenom: </td>
                  <td><?= $annoutil['nom']; ?></td>
                  <td><?= $annoutil['prenom']; ?></td>
                </tr>
                  <br>
                <tr>
                  <td>Experience:</td>
                  <td><?php echo $annoutil['experience'] ; ?></td>
                </tr>
                      <br>
                      <tr>
                  <td>N-telephone:</td>
                  <td><?php echo $annoutil['n_telephone'] ; ?></td>
                </tr>
                      <br>


                <tr>
                  <i class="fas fa-calendar-alt"></i>
                  <td><?php echo $annoutil['date_creation'] ; ?></td>
                </tr>

                <tr>
                  <i class="fas fa-map-marker-alt"></i>
                  <td><?php echo $annoutil['nom_ville'] ; ?></td>
                </tr>
                 <br>
            <?php ?>
<?php $id_annonce=$annoutil['id_annonce'];
    $requete="SELECT etoile.id_utilisateur,etoile.id_annonce,AVG(note) AS notemoyenne FROM etoile,annonce,utilisateur WHERE etoile.id_utilisateur = utilisateur.id_utilisateur AND etoile.id_annonce = annonce.id_annonce AND etoile.id_annonce='$id_annonce' GROUP BY etoile.id_annonce";
    $execute=mysqli_query($db, $requete);
      $etoile=mysqli_fetch_array($execute);
    $note= round($etoile['notemoyenne']) ;
         ?>

            <div class="star-rating" >

              <?php for($j=$note;$j<5;$j++){ ?>
                   <input id="star-'<?= $i ?>'" type="radio" name="rating" value="5">
                   <label for="star-'<?= $i ?>'" title="5 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                   <?php $i++; ?>
                   <?php } ?>
             
              <?php for($j=0;$j<$note;$j++){ ?>
                   <input id="star-'<?= $i ?>'" type="radio" name="rating" value="5" class="rated">
                   <label for="star-'<?= $i ?>'" title="5 stars" class="rated">
                     <i class="fa fa-star" aria-hidden="true" class="rated"></i> 
                   </label>
                   <?php $i++; ?>
                   <?php } ?>
              </div>
            <!-- -->
           
         </div>
     
    </form>
    
  <?php  } while($annoutil= mysqli_fetch_array($query_exe)); $i++; ?>
  </a>
      <br>
   
</div> 

</div>
<?php   }
else{ ?>
 <div class="box">
  <p style="color:#e15f41; text-align: center; text-transform: uppercase; font-size: 22px;">aucun resultat n'a été trouvés </p>
 </div>
<?php
 } 
   
 $metier_check_query = "SELECT * FROM metier order by id_metier ";
          $results = mysqli_query($db, $metier_check_query); ?>

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
</div>

</body>
</html>

