<?php include('php/loginsignup.php');
require  'db_connect.php';

$id_utilisateur=@$_SESSION['id_utilisateur'];
$id_annonce=@$_GET['id_annonce'];
$requete= "SELECT * FROM annonce,metier,ville,utilisateur WHERE utilisateur.id_utilisateur = '$id_utilisateur' AND annonce.id_annonce='$id_annonce'AND annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND  annonce.id_ville = ville.id_ville " ;
$requ = mysqli_query($db, $requete);
$annoedit = mysqli_fetch_array($requ);


 if (isset($_POST['modifier'])) {
  
    $n_telephone = mysqli_real_escape_string($db, $_POST['n_telephone']);
    $ville = mysqli_real_escape_string($db, $_POST['ville']);
   $metier = mysqli_real_escape_string($db, $_POST['metier']); 
   $experience = mysqli_real_escape_string($db, $_POST['experience']); 
   $competences = mysqli_real_escape_string($db,$_POST['competences']);
     
   if (empty($image)) { $image=$annoedit['image']; }
    else { //tester si le fichier est une image
        $image=mysqli_real_escape_string($db,$_FILES["image"]["name"]);

       $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check == false) {
       array_push($errors, "veuiller choisir une image"); }}
    
  if (count($errors) == 0) {
 
    $query = "UPDATE annonce SET  id_utilisateur='$id_utilisateur' , id_metier= '$metier' , id_ville= '$ville' , experience='$experience', competences='$competences', date_creation=NOW() , valide=0 WHERE id_annonce='$id_annonce' ";
    mysqli_query($db, $query);
     header('location: index.php');}
  }   
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>modifier annonce</title>
	
	<link rel="stylesheet"  href="css/signupAR.css"> 
	<script src="js/jquery/jquery-3.3.1.min.js"></script>

	<style type="text/css" > 
		body{background: url(img/cordonnier.jpg);
	     background-repeat: no-repeat; background-size: cover;
     font-family: BRLNSB;}
	    select option{ background-color: black;}  
	</style>

</head>
<body >
	

	      <div id="nav-placeholder"></div>

        <script>
         $(function(){
         $("#nav-placeholder").load("navbar.php");
         });
        </script>
    
	
 <div class="main_container"  >
    <div class="box_container">
           <form action="" method="post" enctype="multipart/form-data">
         
          <div class="sections">
            <span class="box">
              <h1 >modifier annonce</h1>
            </span>
          </div>
          

        <div class="sections">

            <div class="box"  >

            
             <input type="number" placeholder="n_telephone" name="n_telephone" value="<?php echo $annoedit['n_telephone']; ?>" required>
              <?php 
              $ville_check_query = "SELECT * FROM ville  ";
              $results1 = mysqli_query($db, $ville_check_query);
              ?>
              
              <select name="ville" >
                <option value="<?php echo $annoedit['id_ville'] ?>"> <?php echo $annoedit['nom_ville']; ?></option>

                <?php  while ($ville = mysqli_fetch_array($results1)) { ?>
                   <option value="<?php echo $ville['id_ville'] ?>"> <?php echo $ville['nom_ville']; ?></option>
                 <?php } ?>
             </select>
            
              <input type="file" name="image" id="image" >
            </div>
     

         <?php 
          $metier_check_query = "SELECT * FROM metier order by id_metier ";
          $results = mysqli_query($db, $metier_check_query);
          
          ?>
      
      <div class="box" >
          <select name="metier" >
           <option value="<?php echo $annoedit['id_metier'] ?>"> <?php echo $annoedit['nom_metier']; ?></option>

              <?php  while ($metier = mysqli_fetch_array($results)) { ?>
                <option value="<?php echo $metier['id_metier'] ?>"> <?php echo $metier['nom_metier']; ?></option>
                  <?php } ?>
           </select>
           
          <input type="text" placeholder="experience" name="experience" value="<?php echo $annoedit['experience']; ?>" required="">
             <textarea rows="6" cols="8"  placeholder="competences" type="text" name="competences" value="<?php echo $annoedit['experience']; ?>"></textarea>
      

          <!--$annoutil = mysqli_fetch_array($requ)-->
             
            <?php  include('php/errors.php')?> 
      </div>
   </div>
      <div class="sections" >
            <span class="box">
             <input type="submit" name="modifier" value="modifier"> 
            </span>
      </div>

    </form>
    </div>
</div>

</body>
</html>
