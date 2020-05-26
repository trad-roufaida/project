<?php
require  'db_connect.php';
//include 'php/rating.php';

$errors = array();

   $query="SELECT * FROM annonce WHERE "
    $query_exe = mysqli_query($db, $query); 
    $quer=mysqli_num_rows($query_exe);
    $i=0;
    
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
  <?php $quer=$quer-1; ?>
  <p style="color: white; text-align: center; text-transform: uppercase;"><?= $quer ?>  <?= $annoutil['nom_metier'],"s"  ?> trouvés </p>
 </div>
  <?php  include('php/errors.php')?>     
<div class="main-content">
     
  <div class="ads"> 
  <?php  while($annoutil= mysqli_fetch_array($query_exe)) {  ?>  
  <a href="searchad2.php?id_annonce=<?= $annoutil['id_annonce']?>">  <form   class="box" action="" method="post"> 

       <?php if(!empty($annoutil['image'])) { ?>
        <tr   class='ad-image'>
        <td><img src="img/<?php echo $annoutil['image']  ?>" alt='image' width='150px' height='150' ></td>
               </tr >
        <?php } else {?>
        <tr   class='ad-image'>
        <td><img src="img/default.png" alt='image' width='150px' height='150'></td>
              </tr >
             <?php } ?> 
         <div class="ad-info">  
               <!--    <tr>
                  <td><h2><?php echo $annoutil['nom_metier']  ?></h2>
                  </td>
                </tr>-->
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

         </div>
     
    </form>
    
  <?php  } $i++; ?>
  </a>
      <br>
   
</div> 

</div>