<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>INDEX.ESGI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Page d'acceuil ESGI Lille" />


		
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
						<div class="col-md-7 col-md-push-5 text-left intro">
						<h2>ESGI Lille</h2>
							<p>
								ESGI Lille forme les étudiants et délivre un enseignement d’excellence pour tous les métiers de l’informatique à travers plusieurs spécialisations, telles que l’ingénierie du web, la cybersécurité ou encore le développement web. Cette grande école de l’informatique fait partie du campus EDUCTIVE EURALILLE qui rassemble Maestris BTS, PPA et l’ENGDE.
								
								L’une des plus grandes villes étudiantes de France, Lille offre un cadre professionnel, géographique, culturel et universitaire de premier choix.</p>
						</div>				
					</div>
				</div>
			</div>
			
			<div id="fh5co-author" class="fh5co-bg-section">
				<div class="container">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>Qui sommes nous?</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="author">
								<div class="author-inner animate-box" style="background-image: url(images/esgi.jpg);">
								</div>
								<div class="desc animate-box">
									<h3>GRANSART Quentin, KHEMISSI Bahya et EL KIHEL Elias	</h3>
									<p>Nous somme 3 étudiants de L'ESGI Lille, et pour notre projet annuel nous avons construit ce site web qui présente la liste des étudiants de notre promotion, ainsi que leurs CVs et leur réseau sociaux.</p>
									<p><a href="about.php" class="btn btn-primary btn-outline">plus de détails</a></p>
								</div>
							</div>
						</div>
					</div>
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

