<?php  require  'db_connect.php';
 //include('php/search.php');
session_start(); 
$errors = array();
$i=0;
$k=0;
 
  if(isset($_POST['recherche']) && empty($artisant)&& empty($ville)){ 
      array_push($errors, "recherche invalide"); }

  else if (isset($_POST['recherche'])) {
       
  	$artisant=mysqli_real_escape_string($db,$_POST['artisant']);
  	$ville=mysqli_real_escape_string($db,$_POST['ville']);

      if(!empty($ville) && !empty($artisant)){
    		  	$query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.nom_metier = '$artisant' AND ville.nom_ville ='$ville'";
    		  	$query_exe = mysqli_query($db, $query); 

    		  	if($annoutil = mysqli_fetch_array($query_exe)){
    		  	 header("location:searchad.php?artisant=$artisant &ville=$ville ");}
             else {array_push($errors, "aucun artisan trouvé"); }
		  }
        else if(!empty($artisant)&& empty($ville)) {
        		$query= "SELECT * FROM annonce,metier,ville,utilisateur WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND annonce.id_ville = ville.id_ville AND metier.nom_metier = '$artisant'";
		  
  			  	$query_exe = mysqli_query($db, $query); 

  			  	if($annoutil = mysqli_fetch_array($query_exe)){
  			  	 header("location:searchad.php?artisant=$artisant");}
  	        }

               else {array_push($errors, "aucun artisan trouvé"); }
  	    }
 
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>mon site</title>
	<link rel="stylesheet"  href="css/base.css">
	<link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/lightslider.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
	<script src="js/header.js"></script>
  <script src="js/lightslider.js"></script>
	<link rel="stylesheet" href="css/annonces.css">
    <style type="text/css">
      .star-rating{ padding-top: 10px;}
      .rated{color: #f2b600;}

      .box{width: 350px;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: space-between;
        margin-left: 0px;}

      .main-content{display: flex;
        justify-content: center;
        align-items: center;}

     .ads  a{
        float:right;
        color: black;
        margin: 20px auto;
        transition: 0.25s;
        text-decoration:none;
        padding: 1px 6px;
      }

      .ads a:hover{
        color: #f0932b;
        transform-style: preserve-3d;
        transform: scale(1.02);
        transition: all ease 0.3s;
      }
      ul{list-style: none;}
      input[type='submit']{
        background: #f0932b;
        border: 3px solid #f0932b;    }
        .box1{
          width: 100%;
          color:#f0932b; text-align: center; text-transform: uppercase; font-size: 22px; font-family: BRLNSB;
          background: white;
          padding: 50px;
          box-shadow: -1px 2px 5px 1px rgba(0, 0, 0, 0.7); 
        }
    </style>	
	
	
</head>

<body>
	<header>
	

	
    <div id="nav-placeholder"></div>

		<script>
         $(function(){
         $("#nav-placeholder").load("navbar.php");
         });

        </script>

   
<form action="index.php" method="post">
  <h5>Vous voulez un artisan proffessionnel ?!</h5>
        <h5> Un clique vous en sépare</h5>   

  <div class="form-box">
    <input type="text" class="search-field artisant" name="artisant" placeholder="ex : menuisier ..">
    <input type="text" class="search-field location" name="ville" placeholder="ex : Annaba ..">
    <input class="search-btn" name="recherche" type="submit" value="Rechercher"></input>
  </div>
  
</form>
<div class="erreur" style=" text-align:center; font-size: 20px;">
<?php   include('php/errors.php'); ?></div>
</header>



<!----------------------meilleurs artisans -------------------------->
<div class="box1">
 <p  >Artisans les plus apréciés </p>
</div>

<?php
$req="SELECT etoile.id_annonce,AVG(note) AS notemoyenne,utilisateur.nom,utilisateur.prenom,ville.nom_ville,annonce.experience,utilisateur.n_telephone,annonce.date_creation,annonce.image,metier.nom_metier FROM etoile,annonce,utilisateur,ville,metier WHERE annonce.id_utilisateur = utilisateur.id_utilisateur AND etoile.id_annonce = annonce.id_annonce AND annonce.id_ville=ville.id_ville AND annonce.id_metier=metier.id_metier GROUP BY etoile.id_annonce HAVING notemoyenne>=3 ORDER BY notemoyenne DESC";

$quer = mysqli_query($db, $req); 
?>
 
<ul id="autoWidth" class="cs-hidden">
  <?php  while($annou= mysqli_fetch_array($quer)) { ?>
 <div class="best" >   
 <div class="main-content">
   
  <li>
  <div class="ads "> 
    
  <a href="searchad2.php?id_annonce=<?= $annou['id_annonce']?>"   >  <form   class="box" action="" method="post"> 
       
        <?php if(!empty($annou['image'])) { ?>
        <tr   class='ad-image'>
        <td><img src="img/<?php echo $annou['image']  ?>" alt='image' width='150px' height='150' ></td>
               </tr >
        <?php } else {?>
        <tr   class='ad-image'>
        <td><img src="img/default.png" alt='image' width='150px' height='150'></td>
              </tr >
             <?php } ?> 
         
                   <div class="ads-info">  <tr>
                  <td><h2><?php echo $annou['nom_metier']  ?></h2>
                  </td>
                </tr>
                <br>
              
                <tr>
                  <td>Nom et Prenom: </td>
                  <td><?= $annou['nom']; ?></td>
                  <td><?= $annou['prenom']; ?></td>
                </tr>
                  <br>
                <tr>
                  <td>Experience:</td>
                  <td><?php echo $annou['experience'] ; ?></td>
                </tr>
                      <br>
                      <tr>
                  <td>N-telephone:</td>
                  <td><?php echo $annou['n_telephone'] ; ?></td>
                </tr>
                      <br>


                <tr>
                  <i class="fas fa-calendar-alt"></i>
                  <td><?php echo $annou['date_creation'] ; ?></td>
                </tr>

                <tr>
                  <i class="fas fa-map-marker-alt"></i>
                  <td><?php echo $annou['nom_ville'] ; ?></td>
                </tr>
                 <br>
            
             </div>
     

<?php $id_annonce=$annou['id_annonce'];
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
            </form>
         </div>
     <li>

   
   
  
    </a>
      <br>
 </div>  
  </div> 
    <?php  } $i++;
    ?>
</ul>


<script type="text/javascript">
   $(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
         
    });  
  });
</script>

	

	
</body>
</html>