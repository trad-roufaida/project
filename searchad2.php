<?php
require  'db_connect.php';
include 'php/rating.php';
include 'php/commenter.php';
include 'php/sidebar.php';


   $id_annonce=@$_GET['id_annonce'];
    
    $query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND annonce.id_annonce='$id_annonce'" ;
     $query_exe = mysqli_query($db, $query); 
    $quer=mysqli_num_rows($query_exe);
    $annoutil= mysqli_fetch_array($query_exe);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
<link rel="stylesheet"  href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
  <script src="js/jquery/jquery-3.3.1.min.js"></script>
 <link rel="stylesheet" href="css/annonces.css">
    
<style type="text/css">
.box{
  margin-block-end:0px; 
  padding-bottom: 0px;
} 
label{
    color: #bbb;
    cursor: pointer;
    transition: color .3s ease-in-out;
}

label:hover,label:hover ~ label,
input[type='radio']:checked ~ label{
  color: #f2b600
}
textarea {
  width: 85%;
    padding: 10px;
    line-height: 2;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 1px 1px 1px #999;
    background: none;
    margin: 9px auto;
    text-align: center;
    border: 2px solid grey;
    padding:  5px 5px;
    border-radius: 24px;
    color: black;
    font-size: 15px;
    font-family: BRLNSB;
  }

.com{
  background: none;
  color: grey;
  margin: 9px auto;
  text-align: center;
  border: 2px solid grey;
  padding:  5px 5px;
  border-radius: 24px;
 
}
textarea:focus{
   border: 3px solid #f0932b;
}
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
 
<div class="content clearfix">
      <?php  include('php/errors.php')?>
  <div class="main-content">

  <div class="ads"> 
    <form   class="box clearfix" action="" method="post"> 

       <?php if(!empty($annoutil['image'])) { ?>
        <tr   class='ad-image'>
        <td><img src="img/<?php echo $annoutil['image']  ?>" alt='image' width='150px' height='150' ></td>
               </tr >
        <?php } else {?>
        <tr   class='ad-image'>
        <td><img src="img/default.png" alt='image' width='150px' height='150'></td>
              </tr >
             <?php } ?> 
         <div class="ads-info">  
                   <tr>
                  <td><h2><?php echo $annoutil['nom_metier']  ?></h2>
                  </td>
                </tr>
                <br>
               
               <tr>
                  <td> <p class="title" >Nom et Prenom: </p>
                  <td>   <?= $annoutil['nom']; ?></td>
                  <td>    <?= $annoutil['prenom']; ?></td> 
                   
                </tr>
                  <br>
                <tr>
                  <td><p class="title">Experience: </p></td>
                  <td><?php echo $annoutil['experience'] ; ?></td>
                </tr>
                      <br>
                      <tr>
                  <td ><p class="title">N-telephone:</p></td>
                 <!--<i class="fas fa-phone-square-alt"></i>-->
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
                 
                  <tr>
                  <td ><p class="title">Competences:</p></td> 
                  <br>
                  <td><?php echo $annoutil['competences'] ;
                   ?></td>
                </tr>
                      <br>
              <br>
            <div class="star-rating" >
                    <input type="submit" name="noter" value="Noter"> 
                   <input id="star-5" type="radio" name="rating" value="5">
                   <label for="star-5" title="5 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                   
                   <input id="star-4" type="radio" name="rating" value="4">
                   <label for="star-4" title="4 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                  
                   <input id="star-3" type="radio" name="rating" value="3">
                   <label for="star-3" title="3 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                  
                   <input id="star-2" type="radio" name="rating" value="2">
                   <label for="star-2" title="2 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                  
                   <input id="star-1" type="radio" name="rating" value="1">
                   <label for="star-1" title="1 stars">
                     <i class="fa fa-star" aria-hidden="true" ></i> 
                   </label>
                   
             </div>
   
         </div>

    </form>
    <form class="box" method="post">
        <div class="commentaire">
               <textarea name="commentaire"  placeholder="commentaire ..."></textarea>
               <input type="submit" name="commenter" value="Commenter" style="font-family: BRLNSB;  float: right; width: 15%; padding:  25px 20px;">
             </div>
      <br>
    </form>

    
        <?php   
           $id_annonce=@$_GET['id_annonce'];
          $id_utilisateur=$annoutil['id_utilisateur'];          
          $query= "SELECT * FROM commentaire,annonce WHERE commentaire.id_annonce=annonce.id_annonce AND commentaire.id_utilisateur=annonce.id_utilisateur AND commentaire.id_utilisateur='$id_utilisateur ' AND commentaire.id_annonce='$id_annonce'" ;
          $query_exe = mysqli_query($db, $query); 
          while ($quer=mysqli_fetch_array($query_exe)) {
        ?>
        <form class="box">
        <div class="commentaire">
        <p class="com"><?= $quer['commentaire']; ?></p>
        </div>
      <?php } ?>
         
      <br>
    </form>
</div> 

</div>
<?php   
   
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

</body>
</html>