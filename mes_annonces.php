<?php include('php/loginsignup.php');
require  'db_connect.php';
include 'php/suppanno.php';
$id_utilisateur=@$_SESSION['id_utilisateur'];

$requete= "SELECT * FROM annonce,metier,ville,utilisateur WHERE utilisateur.id_utilisateur = '$id_utilisateur' AND annonce.id_utilisateur = utilisateur.id_utilisateur AND annonce.id_metier = metier.id_metier AND  annonce.id_ville = ville.id_ville ORDER BY id_annonce " ;
$requ = mysqli_query($db, $requete);

?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>mes annonces</title>
<link rel="stylesheet"  href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<script src="js/jquery/jquery-3.3.1.min.js"></script>
	 <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/annonces.css">
    <style type="text/css">
    	.box .supp{
	float:right;
	color: #f0932b;
	margin: 20px auto;
	transition: 0.25s;
	text-decoration:none;
	padding: 14px 14px;
}

.box .supp:hover{
	color: grey;
	text-decoration:underline;
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

        
	   <h1 style="margin-top: 0px;padding-top: 200px;"> </h1> 
<div class="content clearfix">

<div class="main-content">	
	<div class="ads" >
 <?php  while($annoutil = mysqli_fetch_array($requ)) { ?>
	  <form class="box" action="" method="post">
		      
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
				<td><h2><?php echo $annoutil['nom_metier'] ; ?></h2>
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
                  <td><?php echo $annoutil['n_telephone']; ?></td>
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
              
            <a  href="editannonces.php?id_annonce=<?= $annoutil['id_annonce']?> " >modifier </a>
		    <a href="php/suppanno.php?id_annonce=<?= $annoutil['id_annonce']?>">supprimer</a>
		
     </div>
    </form>
	

<?php }  include('php/errors.php'); ?>

<br>
</div> 
</div>

<?php $metier_check_query = "SELECT * FROM metier order by id_metier ";
          $results = mysqli_query($db, $metier_check_query); ?>
<div class="sidebar box">
	 <?php  while ($metier = mysqli_fetch_array($results)) { ?>
	<div class="section metier">
		 <?php echo $metier['nom_metier'];?>	
	</div>
<?php }?>
</div>

</div>

</body>
</html>
