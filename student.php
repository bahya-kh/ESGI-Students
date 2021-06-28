<?php
session_start();
require_once('config.php');

// GET Student Details by Id
$id = $_GET['id'];
$data = $bdd->query("SELECT * FROM listingEsgiGroupe2 where id='.$id.'");
$row = $data->fetch();

if(!$row[0]){
	header("Location: index.php");
    exit;
}

// GET NEXT and PREVIOUS ID
//$data1 = $bdd->query('SELECT * FROM listingEsgiGroupe2');
$lastId =12;

$nextId = 0;
$prevId  = 0;
if($row["id"] < 2){
	$nextId = $row["id"] + 1;
	$prevId = $lastId;
}
else if($row["id"] >= $lastId){
	$nextId = 1;
	$prevId = $row["id"] - 1;
}
else{
	$nextId = $row["id"] + 1;
	$prevId = $row["id"] - 1;
}



?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Profil</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">


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

			<div id="fh5co-author">
				<div class="container">
					<div class="row top-line animate-box">
						<div class="col-md-6 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
						<?php
							echo '<p class="col-md-4 text-center animate-box"><img src="images/'.$row["pseudo"].'.png" class="img-responsive" alt="Free HTML5 Template by FreeHTML5.co"></p><br>
						
								<h2>'.$row["firstname"].' '.$row["lastname"].'</h2>
								<p> '.$row["description"].'.</p>';
							
							?>
							

							<div class="role">
								<h3>Compétences</h3>
								<ul>
									<li>Front-end: HTML ,CSS ,JavaScript, wordpress</li>
									<li>Back-end: PHP, SQL</li>
									<li>Langues: Français, Anglais</li>
								</ul>
							</div>

							<ul class="fh5co-social-icons">
								<li><a href=""><i class="icon-twitter"></i></a></li>
								<li><a href=""><i class="icon-linkedin"></i></a></li>
								<li><a href=""><i class="icon-instagram"></i></a></li>
							</ul>

						</div>
					</div>
					<?php
						
						
							if($row['actif']){
								echo '<div class="col-md-4 text-center animate-box">
								<a class="work" href="'.$row["link"].'">
								<div class="work-grid" style="background-image:url(images/'.$row["pseudo"].'-cvEnligne.png);">
								<div class="inner">
								<div class="desc">
													<h3>CV en ligne</h3>
													<span class="cat">Go</span>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="col-md-4 text-center animate-box">
									<a class="work" href="'.$row["linkLinkedin"].'">
										<div class="work-grid" style="background-image:url(images/'.$row["pseudo"].'-cvLinkedin.png);">
											<div class="inner">
											<div class="desc">
												<h3>télécharger CV</h3>
												<span class="cat">Go</span>
											</div>
										</div>
									</div>
								</a>
							</div>';
							}else {
								echo '<p> Cet étudiant ne souhaite pas que vous accédez à son CV </p>';
							}
				
							?>
					
								
								
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="row row-pt-md portfolio-navigation">
								<div class="col-xs-4 text-left">
								<?php
							echo '<a href="student.php?id='.$prevId.'" class="btn btn-primary btn-outline"><i class="icon-chevron-left"></i> Prev </a>';
							
							?>
								
									
								</div>
								<div class="col-xs-4 text-center">
									<a href="list.php" class="btn btn-primary btn-outline"><i class="icon-grid2"></i> View All</a>
								</div>
								<div class="col-xs-4 text-right">
								<?php
							echo '<a href="student.php?id='.$nextId.'" class="btn btn-primary btn-outline">Next <i class="icon-chevron-right"></i></a>';
							
							?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<<div id="fh5co-started">
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

