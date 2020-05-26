<?php include('php/loginsignup.php');
/*require  'php/signup.php';*/
require  'db_connect.php';

$id_utilisateur=@$_SESSION['id_utilisateur'];

$user_check_query = "SELECT * FROM utilisateur  WHERE id_utilisateur='$id_utilisateur' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);
 



if (isset($_POST['publier'])) {

   $ville = mysqli_real_escape_string($db, $_POST['ville']);
   $metier = mysqli_real_escape_string($db, $_POST['metier']); 
   $experience = mysqli_real_escape_string($db, $_POST['experience']); 
   $competences = mysqli_real_escape_string($db,$_POST['competences']);
   
   //tester si le fichier est une image
   $image=mysqli_real_escape_string($db,$_FILES["image"]["name"]);
   if (!empty($image)) {
       $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check == false) {
       
      array_push($errors, "veuiller choisir une image"); }
    }

   if (empty($metier) ) {
      array_push($errors, "veuiller choisir un metier");
    }
   if (empty($ville) ) {
      array_push($errors, "veuiller choisir une ville");
    }
    if(empty($experience)) { array_push($errors, "mot de passe manquant"); }
  

    if(count($errors) == 0) {
 
    $query = "INSERT INTO annonce  (id_utilisateur,id_metier,id_ville,experience,competences,date_creation,image,valide) 
              VALUES('$id_utilisateur','$metier','$ville','$experience', '$competences', NOW(),'$image',0)"  ;
    mysqli_query($db, $query);
    }
}

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>annonce</title>
	
	<link rel="stylesheet"  href="css/signupAR.css">
  <link rel="stylesheet"  href="css/base.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>

	<style type="text/css" > 
		body{background: url(img/cordonnier.jpg);
	     background-repeat: no-repeat; background-size: cover;}
	     
	</style>

</head>
<body >
	<?php if($user){  ?>

	 <div id="nav-placeholder"></div>

        <script>
         $(function(){
         $("#nav-placeholder").load("navbar.php");
         });
  
	     
        </script>
    
	
 <div class="main_container"  >
          
 	
    <div class="box_container">
 <!-- <?php if (@$_SESSION['e_mail'] ) { 
	 ?> -->  
           
     	<form action="annonce.php?id_utilisateur=<? = $user['id_utilisateur']; ?>" method="post" enctype="multipart/form-data">
         
          <div class="sections">
            <span class="box">
              <h1 >publier annonce</h1>
            </span>
          </div>
          

        <div class="sections">

            <div class="box"  >

			   <input type="number" placeholder="n_telephone" name="n_telephone" value="<?php echo $user['n_telephone']; ?>" required>
           
           <?php 
          $ville_check_query = "SELECT * FROM ville  ";
          $results1 = mysqli_query($db, $ville_check_query);
          
          
          ?>
           <select name="ville" >
            <option value="0" >ville</option>

            <?php  while ($ville = mysqli_fetch_array($results1)) { ?>

         <option value="<?php echo $ville['id_ville'] ?>"> <?php echo $ville['nom_ville']; ?></option>
                <?php } ?>
         </select>

             
			 
    <input type="file" name="image" id="image">

			</div>





        	<?php 
        	$metier_check_query = "SELECT * FROM metier order by id_metier ";
          $results = mysqli_query($db, $metier_check_query);
          
          ?>
			
	    
<div class="box" >
			
			 
	       	
			   <select name="metier" >
			      <option value="0" >metier</option>

			      <?php  while ($metier = mysqli_fetch_array($results)) { ?>

				 <option value="<?php echo $metier['id_metier'] ?>"> <?php echo $metier['nom_metier']; ?></option>
                <?php } ?>
			   </select>

			  <input type="text" placeholder="experience" name="experience" required="">
		       <textarea rows="6" cols="8"  placeholder="competences" type="text" name="competences" ></textarea>
		

	      <!---->
			   
		      
			   

<!--<?php } ?>-->
 <?php  include('php/errors.php')?> 
            </div>
	    </div>
	    <div class="sections" >
	    <span class="box">
             <input type="submit" name="publier" value="publier"> 
        </span>
        </div>
       </form>
     </div>
 </div>
<?php } ?>

</body>
</html>