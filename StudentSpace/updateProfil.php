<?php
require_once('../config.php');

// Get Student details by pseudo
$pseudo = $_SERVER['REMOTE_USER'];
$stmt = $bdd->prepare('SELECT * FROM listingEsgiGroupe2 WHERE pseudo = :pseudo');
$stmt->bindParam(':pseudo',$pseudo,PDO::PARAM_STR, 11);
$stmt->execute();
$row = $stmt->fetch();

// update student details after submit
//TODO
$msg="";

if(isset($_POST['send'])){
	if(isset($_POST['firstname'], $_POST['lastname'], $_POST['link'], $_POST['linkLinkedin'], $_POST['description'])){
		$firstname = htmlspecialchars($_POST['firstname']);
		$lastname = htmlspecialchars($_POST['lastname']);
		$link = htmlspecialchars($_POST['link']);
		$linkLinkedin = htmlspecialchars($_POST['linkLinkedin']);
		$description = htmlspecialchars($_POST['description']);
		(isset($_POST['actif'])) ? $actif = 1: $actif = 0;
		$stmt = $bdd->prepare('UPDATE listingEsgiGroupe2 SET firstname = :firstname, lastname = :lastname, link = :link, linkLinkedin = :linkLinkedin, description = :description, actif = :actif WHERE pseudo = :pseudo');
		$stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
		$stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
		$stmt->bindParam(':link', $link, PDO::PARAM_STR);
		$stmt->bindParam(':linkLinkedin', $linkLinkedin, PDO::PARAM_STR);
		$stmt->bindParam(':description', $description, PDO::PARAM_STR);
		$stmt->bindParam(':actif', $actif, PDO::PARAM_STR);
		$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
		$stmt->execute();
		$msg = "Vos informations ont bien été modifiés";
		header("refresh:3;url=../student.php?id=".$row['id']);
	}
}


?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Modifier mon profil</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Page d'acceuil ESGI Lille" />

		<!-- Animate.css -->
		<link rel="stylesheet" href="../css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="../css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="../css/bootstrap.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="../css/style.css">

		<!-- Modernizr JS -->
		<script src="../js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
			
		
		<div id="page">
			<nav class="fh5co-nav" role="navigation">
				<div class="container">
					<div class="fh5co-top-logo">
						<div id="fh5co-logo"><a href="../index.php">ESGI Lille</a></div>
					</div>
				</div>
			</nav>
	
	<div id="fh5co-contact">
		<div class="container">
			<div class="row top-line animate-box">
				<div class="col-md-6 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
					<h2>Formulaire de modification</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="col-md-7 animate-box">
						<form method="POST" action="">
							<div class="row form-group">
							<?php 
							//<input type="text" id="fname" class="form-control" value="'.$row["lastname"].'">
							// <input type="text" id="fname" class="form-control" value="'.$row["firstname"].'">
							// <input type="text" id="cvEnLigne" class="form-control" value="'.$row["link"].'">
							// <input type="text" id="cvLinkedin" class="form-control" value="'.$row["linkLinkedin"].'">
							// <textarea name="message" id="message" cols="30" rows="10" class="form-control" value="'.$row["description"].'"></textarea>	
							if($row["actif"]){
								$check = "checked";
							}
							else{
								$check = "";
							}

							echo '
								<div class="col-md-12">
									<label for="fname">Nom</label>
									<input name="lastname" type="text" id="fname" class="form-control" value="'.$row["lastname"].'">
								</div>
                                <div class="col-md-12">
									<label for="fname">Prénom</label>
									<input name="firstname" type="text" id="fname" class="form-control" value="'.$row["firstname"].'">
								</div>
								
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="cvEnLigne">CV en ligne</label>
									<input name="link" type="text" id="cvEnLigne" class="form-control" value="'.$row["link"].'">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="cvLinkedin">CV sur Linkedin</label>
									<input name="linkLinkedin" type="text" id="cvLinkedin" class="form-control" value="'.$row["linkLinkedin"].'">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Description</label>
									<textarea name="description" name="message" id="message" cols="30" rows="10" class="form-control">'.$row["description"].'</textarea>
								</div>
							</div><br>
                            <div class="col-md-12">
                                <label for="actif">J`\'autorise le partage de mes infos sur le site </label>
                                <input name="actif" type="checkbox" id="actif"'.$check.'>
                            </div>';
							?>

							 <br>
							<div class="form-group">
								<input name="send" type="submit" value="Enregistrer" class="btn btn-primary">
							</div>

							<?= $msg; ?>

						</form>		
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; BK GQ EE. All Rights Reserved.</small> 
					</p>
					
					<ul class="fh5co-social-icons">
						<li><a href="https://twitter.com/ESGI?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="icon-twitter"></i></a></li>
						<li><a href="https://www.facebook.com/ESGIParis"><i class="icon-facebook"></i></a></li>
						<li><a href="https://www.linkedin.com/school/esgi/?originalSubdomain=fr"><i class="icon-linkedin"></i></a></li>
						<li><a href="https://www.instagram.com/esgiparis/?hl=fr"><i class="icon-instagram"></i></a></li>
					</ul>
					
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

</body>
</html>