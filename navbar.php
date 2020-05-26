<?php 
require  'db_connect.php';
session_start();
/*$id_utilisateur=$_REQUEST['id_utilisateur'];
isset($id_utilisateur)*/
/*$id_utilisateur=isset($_REQUEST['id_utilisateur'])? $_REQUEST['id_utilisateur']: NULL;

$query = "SELECT * FROM utilisateur WHERE id_utilisateur='$id_utilisateur' "; 
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
    
   $check=mysqli_fetch_assoc($result);
   $nom =$check['nom'];
   header 1*/
?>
<head>
	<link rel="stylesheet" href="css/navbar.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
	
</head>
<body>


<nav >
	<img class="logo" src="img/nchlh brabi.jpg">
    <div class="menu">
        <ul>
        	<?php 
			 if (!@$_SESSION['id_utilisateur'])   { ?>

        	<li><a href="index.php" >Acceuil</a></li>
        	<li><a href="toutesannonces.php" >Annonces</a></li>
			<!--<li><a href="signup.php" >S'inscrire</a></li>-->
			<li><a href="login.php" >Se connecter</a></li>
			<li><a href="contactus.html" >Contactez-Nous</a></li>

			<?php } 

			else if(@$_SESSION['id_utilisateur'] == 1) { ?>

			<li><a href="index.php" >Acceuil</a></li>
			<div class="dropdown">
			<li><a  class="dropbtn">Annonce</a></li>
			<div class="dropdown-content">
             <a id="hov"  href="annonce.php">Publier annonce</a>
             <a id="hov"  href="mes_annonces.php">Modifier annonce</a>

         </div>
     </div>
			<div class="dropdown">
               <li><a class="dropbtn">Compte</a></li>
                <div class="dropdown-content">
                  <a id="hov" name="Déconnexion" href="php/logout.php">Déconnexion</a>
                  <a id="hov" href="editprofile.php" >modifier informations</a>
                </div>
           </div>
            
         <?php  } 

			else{ ?>
               
			<li><a href="index.php" >Acceuil</a></li>
			<div class="dropdown">
			<li><a  class="dropbtn">Annonce</a></li>
			<div class="dropdown-content">
             <a id="hov"  href="annonce.php">Publier annonce</a>
             <a id="hov"  href="mes_annonces.php">Mes annonce</a>
              <a href="toutesannonces.php" >Annonces</a>
         </div>
     </div>
			<div class="dropdown">
               <li><a class="dropbtn">Compte</a></li>
                <div class="dropdown-content">
                  <a id="hov" name="Déconnexion" href="php/logout.php">Déconnexion</a>
                  <a id="hov" href="editprofile.php" >modifier informations</a>
                </div>
           </div>
            <li><a href="contactus.html" >Contactez-Nous</a></li>
         <?php  }?>


			

			
		 </ul>
	</div>
	

</nav>

		




	







<script type="text/javascript">

	$(window).on("scroll",function(){
		if($(window).scrollTop()) {
			$('nav').addClass('black');
		}
		else{
			$('nav').removeClass('black');
		}	
		
	})
	
</script>
</body>

