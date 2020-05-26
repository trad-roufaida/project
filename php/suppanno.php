<?php 
require  'db_connect.php';
if(isset($_GET['id_annonce']) & !empty($_GET['id_annonce'])){
$id_annonce=$_GET['id_annonce'];
	$query="DELETE FROM annonce WHERE id_annonce='$id_annonce' ";
	$execute = mysqli_query($db, $query);
	var_dump($query);
	header('location: ..\mes_annonces.php');
}

?>

