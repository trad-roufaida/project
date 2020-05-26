<?php include('php/loginsignup.php');
/*require  'php/signup.php';*/
require  'db_connect.php';
$id_utilisateur=@$_SESSION['id_utilisateur'];


$user_check_query = "SELECT * FROM utilisateur WHERE id_utilisateur='$id_utilisateur'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_array($result);


  if (isset($_POST['modifier'])) {
  // receive all input values from the form
  $nom = mysqli_real_escape_string($db, $_POST['nom']);
  $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
  $e_mail = mysqli_real_escape_string($db, $_POST['e_mail']);
  $mot_de_passe =mysqli_real_escape_string($db, $_POST['mot_de_passe']);
  $conffirmer_mot = mysqli_real_escape_string($db, $_POST['conffirmer_mot']);
   $age = mysqli_real_escape_string($db, $_POST['age']);
    $n_telephone = mysqli_real_escape_string($db, $_POST['n_telephone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nom)) { array_push($errors, "nom manquant"); }
  if (empty($prenom)) { array_push($errors, "nom manquant"); }
  if (empty($e_mail)) { array_push($errors, "Email manquant"); }
  if (!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "format d''email invalide");
    }
  if (empty($mot_de_passe)) { array_push($errors, "mot de passe manquant"); }
  if ($mot_de_passe != $conffirmer_mot) {
    array_push($errors, "les deux mots de passes sont différents");
  }

  if (count($errors) == 0) {
 
    $query = "UPDATE utilisateur SET  nom='$nom' , prenom= '$prenom' , e_mail= '$e_mail' , mot_de_passe='$mot_de_passe', age='$age', n_telephone='$n_telephone'  WHERE id_utilisateur='$id_utilisateur' ";
    mysqli_query($db, $query);
   
    header('location: index.php');
     
    
  }
}

?>




<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>modifier vos informations</title>
	<link rel="stylesheet"  href="css/signupAR.css">
  <link rel="stylesheet"  href="css/base.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
</head>
<body>
	<?php if($user){ ?>

	 <div id="nav-placeholder"></div>

        <script>
         $(function(){
         $("#nav-placeholder").load("navbar.php");
         });
  
	     
        </script>
    
	
 <div class="main_container"  >
          
 	
    <div class="box_container">

<?php if (@$_SESSION['id_utilisateur'] ) {
	 ?>           
     	<form  method="post">
         
          <div class="sections">
            <span class="box">
              <h1 >modifier vos informations</h1>
            </span>
          </div>
          

        <div class="sections">

            <div class="box"  >


			   <input type="text" placeholder="Nom" name="nom" value="<?php echo $user['nom']; ?>" required>
			   <input type="text" placeholder="prenom" id="Prenom" name="prenom" value="<?php echo $user['prenom']; ?>" required>
			   <input type="email" placeholder="E-mail" id="mail" name="e_mail" value="<?php echo $user['e_mail']; ?>" required>
			   <input type="password"  placeholder="Mot de passe" name="mot_de_passe" value="<?php echo $user['mot_de_passe']; ?>" required>
			  <div class="progress-bar" role='progressbar' id="progress"> </div>
			</div>
	
	    

	       <div class="box" >
	       	<input type="password" placeholder="Confirmer mot de passe" name="conffirmer_mot" value="<?php echo $user['mot_de_passe']; ?>" required>
		       <input type="number" placeholder="Age" name="age" value="<?php echo $user['age']; ?>" required>
		        <input type="number" placeholder="n_telephone" name="n_telephone" value="<?php echo $user['n_telephone']; ?>" required>
		    
<?php } ?>			   

 <?php  include('php/errors.php')?> 
            </div>
	    </div>
	    <div class="sections" >
	    <span class="box">
             <input type="submit" name="modifier"  value="modifier"> 
        </span>
        </div>
       </form>
     </div>
 </div>

<!-- <script type="text/javascript">
 	$(document).ready(function() {
 		$('mot_de_passe').complexify({},function(valid, complex)){
 			var progress = $('$progress');
 			progress.toggleClass('bg-success', valid);
 			progress.toggleClass('bg-danger', valid);
 			progress.css({
 				width: complex+'%',
 				property2: 'value2'
 			});

 		}
 	});
 </script>-->
<?php } ?>
</body>
</html>