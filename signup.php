<?php include('php/loginsignup.php');
require  'db_connect.php';?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Creer un compte</title>
	<link rel="stylesheet"  href="css/signupAR.css">
	<link rel="stylesheet"  href="css/base.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
</head>
<body>

	 <div id="nav-placeholder"></div>

        <script>
         $(function(){
         $("#nav-placeholder").load("navbar.php");
         });
  
	     
        </script>
    
	
 <div class="main_container"  >
          
 	
    <div class="box_container">

           
     	<form action="signup.php" method="post">
         
          <div class="sections">
            <span class="box">
              <h1 >Creer un compte</h1>
            </span>
          </div>
          

        <div class="sections">

            <div class="box"  >


			   <input type="text" placeholder="Nom" name="nom" value="<?php echo $nom; ?>" required>
			   <input type="text" placeholder="Prenom" id="Prenom" name="prenom" value="<?php echo $prenom; ?>" required>
			   <input type="email" placeholder="E-mail" id="mail" name="e_mail" value="<?php echo $e_mail; ?>" required>
			   <input type="password"  placeholder="Mot de passe" name="mot_de_passe" required>
			  <div class="progress-bar" role='progressbar' id="progress"> </div>
			</div>
	
	    

	       <div class="box" >
	       	<input type="password" placeholder="Confirmer mot de passe" name="conffirmer_mot" required>
		      <!-- <input type="text" placeholder="N°telephone" id="telephone">-->
		       <input type="number" placeholder="Age" name="age" required>
	        <input type="number" placeholder="N°telephone" name="n_telephone" required>
		       <!--
			   <input type="text" placeholder="adresse">
			   <select>
				 <option>menuisier</option>
				 <option>maçon</option>
				 <option>plombier</option>
				 <option>peintre</option>
			   </select>
			   <input type="text" placeholder="compétence">-->

 <?php  include('php/errors.php')?> 
            </div>
	    </div>
	    <div class="sections" >
	    <span class="box">
             <input type="submit" name="creer" value="Creer un compte"> 
        </span>
        </div>
       </form>
     </div>
 </div>

 <script type="text/javascript">
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
 </script>

</body>
</html>