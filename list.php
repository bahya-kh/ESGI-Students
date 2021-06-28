<?php
require_once('config.php');
session_start();

?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Etudiants ESGI LILLE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Liste des étudiants de l'ESGI lille" />


		
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>

	</head>


	<body>
			
		<div class="fh5co-loader"></div>
		
		<div id="page">
			<nav class="fh5co-nav" role="navigation">
				<div class="container">
					<div class="fh5co-top-logo">
						<div id="fh5co-logo"><a href="index.php">ESGI Lille</a></div>
					</div>
					<div class="fh5co-top-menu menu-1 text-center">
						<ul>
							<li><a href="list.php">Liste des étudiants</a></li>
							<li><a href="about.php">à propos de nous</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="administration.php">Administration</a></li>
							<?php if (isset($_SESSION['sess_usr_id']) && $_SESSION['sess_usr_id']!='') {
								echo '<li><a href="logout.php">Logout</a></li>';
							}else{
                                echo'<li><a href="StudentSpace/updateProfil.php">Espace Etudiant</a></li>';
                            }
							?>
						</ul>
					</div>
				</div>
			</nav>
		
			<div id="fh5co-work">
				<div class="container">
					<div class="row top-line animate-box">
						<div class="col-md-6 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
							<h2>Nos étudiants</h2>
							<p>Ci-dessous vous retrouvez la liste des étudiants de la 1ère promotion de l' ESGI à LILLE.</p>
						</div>
					</div>
					<div class="row">
						<?php
							$data = $bdd->query('SELECT * FROM listingEsgiGroupe2');
							while ($row = $data->fetch()) {
								if($row['actif']){
									echo '<div class="col-md-4 text-center animate-box">';
									echo '<a class="work" href="student.php?id='.$row['id'].'">';
									echo '<div class="work-grid" style="background-image:url(images/'.$row['pseudo'].');">';
									echo '<div class="inner">';
									echo '<div class="desc">';
									echo '<h3>'.$row['firstname'].' '.$row['lastname'].'</h3>';
									echo '<span class="cat">Profil</span>';
									echo '</div></div></div></a></div>';
								}
							}
						?>
					</div>
				</div>
			</div>
		

			<div id="fh5co-started">
				<div class="container">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>Liste des étudiants</h2>
							<p>Voici la liste des étudiants de la 1ère promotion de l'ESGI à lille</p>
							<p><a href="list.php" class="btn btn-primary">Allons y !!</a></p>
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
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>

	</body>
</html>

