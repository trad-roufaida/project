<?php include('php/loginsignup.php');
require  'db_connect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Se connecter</title>
	<link rel="stylesheet"  href="css/login.css">
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

	
	<form class="box" action="login.php" method="post">
		
			<h1>Se connecter</h1>
			<input type="email" placeholder="E-mail" name="e_mail">
			<input type="password" placeholder="Mot de passe" class="my_input" name="mot_de_passe" >
             <?php  include('php/errors.php')?>
             
            <!-- <input type="button" class="my_button" value="afficher"></input> -->  
		    
			<input type="submit" name="connecter" value="Se connecter">

            <h5>Pas de compte?</h5>
			<a href="signup.php">Créer un compte</a>
	</form>

  
<!--<script>
	let input=document.querySelector('.my_input');
	let show=document.querySelector('.my_button');
	show.addEventListener('click', e=>{
		if(input.type === 'password'){
			input.type = 'text';
			show.classList.remove('icon');
			show.classList.add('icon');


		}
		 else{
		 	input.type = 'password';
		 	show.classList.toggle('icon');
		 }
	       
	});	
	
	
	/*var myButton = document.getElementById('my_button'),
	    myInput = document.getElementById('my_input');
	myButton.onclick = function(){
		'use strict';
		if (this.textContent ==== 'afficher') {
			myInput.setAttribute('type', 'text');
			this.textContent = 'masquer';
		};

	}; */  
</script>-->

</body>
</html>