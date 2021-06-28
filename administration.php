<?php
session_start();
require_once("config.php");
$data = $bdd->query('SELECT * FROM listingEsgiGroupe2');
$count = $data->rowCount();
$welcome = "";
$logout = "";
$updatebtn="";

if (isset($_SESSION['sess_usr_id']) && $_SESSION['sess_usr_id']!='') {
	$login = 0;
	$updatebtn = '<button name="submit" class="btn btn-warning btn-block name="update">Update</button>';
	$login = '';

	if (isset($_POST['submit'])) {
		if(isset($_POST['eleve'])){
			$eleves = $_POST['eleve'];
			$arr = array();
			foreach ($eleves as $eleve => $value) {
				array_push($arr, $value);
			}
			for ($j=1; $j <= $count; $j++) { 
				if (!in_array($j, $arr)) {
					$stmt = $bdd->prepare("UPDATE listingEsgiGroupe2 SET actif = 0 WHERE id = ?");
					$stmt->execute([$j]);
				}
				else {
					$stmt = $bdd->prepare("UPDATE listingEsgiGroupe2 SET actif = 1 WHERE id = ?");
					$stmt->execute([$j]);
				}
			}
		}
		else {
			for ($j=1; $j <= $count; $j++) { 
				$stmt = $bdd->prepare("UPDATE listingEsgiGroupe2 SET actif = 0 WHERE id = ?");
				$stmt->execute([$j]);
			}
		}
		header("Location: administration.php");
		exit();
	}
}

else{
	$login = 1;
	$msg = ""; 
	if(isset($_POST['sbmtlog']) && isset($_POST['username'], $_POST['password'])) {
	  $username = trim($_POST['username']);
	  $password = $_POST['password'];
	  if($username != "" && $password != "") {
	    try {
		    $stmt = $bdd->prepare("SELECT * FROM adminEsgiGroupe2 WHERE username = ?");
			$stmt->execute([$_POST['username']]);
			$row = $stmt->fetch();

	      if($row && password_verify($_POST['password'], $row['password'])){
	        $_SESSION['sess_usr_id']   = $row['id'];
	        $_SESSION['sess_name'] = $row['name'];
	       	header("refresh:3;url=administration.php");
	       	$msg ='<br><center><div class="alert alert-success">Bienvenue '.htmlspecialchars($_SESSION['sess_name']).'<div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div></center>';
	      } 
	      
	      else {
	        $msg = '<br><center><div class="alert alert-warning">Mauvais login ou mot de passe !</div></center>';
	      }
	    } 
	    catch (PDOException $e) {
	      echo "Error : ".$e->getMessage();
	    }
	  } else {
	    $msg = '<br><center><div class="alert alert-warning">Veuillez remplir tout les champs.</div></center>';
	  }
	}
}

?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>INDEX.ESGI</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Page d'acceuil ESGI Lille" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
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

        <script type="text/javascript" src="js/password.js"></script>

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
							}
							?>
						</ul>
					</div>
				</div>
			</nav>
			<?php 
			if($login == 0){?>
			<br>
			<div class="container">
	    <div class="row center">
			<?php echo "<h1>Hello ".$_SESSION['sess_name'].'</h1>'; ?>
	        <div class="col-sm-5 col-centered">
	        	<form  method="POST">
					<table class="table ">
					<thead>
						<tr>
						<th scope="col">ID</th>
						<th scope="col">Nom</th>
						<th scope="col">Actif</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($count> 0) {
								while ($row = $data->fetch()) {
									if($row['actif'] == 1){
										$color = 'style="color: green;"';
										$actif = 'checked';
										$href = '#';
									}
									else {
										$color = 'style="color: red; text-decoration: none;"';
										$actif = '';
										$href = '#';
									}

									echo '<tr><th scope="row">'.$row["id"].'</th><td><a '.$color.' href="'.$href.'">'.$row["firstname"].' '.$row["lastname"].'</a></td><td><input name="eleve[]" value="'.$row["id"].'" class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" '.$actif.'></td></tr>';
								}
							}
							else{
								echo '<li class="list-group-item text-center"><a href="">Aucun résultat</a></li>';
							}
						?>
							</tbody>
							</table>
								<?= $updatebtn;?>
							</form>
						</div>
					</div>
				</div>
				<br><br>
				<?php }
				else {
					?>

					<div class="container login-form">
						<h2 class="login-title">Login Administrateur</h2>
						<div class="panel panel-default">
							<div class="panel-body">
								<form method="POST">
									<div class="input-group login-userinput">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input id="txtUser" type="text" class="form-control" name="username" placeholder="Username">
									</div>
									<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
									<input  id="txtPassword" type="password" class="form-control" name="password" placeholder="Password">
									<span id="showPassword" class="input-group-btn">
									<button onclick="showPassword()" class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
									</span>  
									</div>
									<button class="btn btn-primary btn-block login-button" name="sbmtlog" type="submit"><i class="fa fa-sign-in"></i> Login</button>
									<?= $msg; ?>
								</form>
							</div>
						</div>
						<p style="color: white;">admin1:StrongPassword5585*_</p>
						<p style="color: white;">admin2:StrongPa$$word1454</p>
						<p style="color: white;">admin3:57rongpassWord4777/</p>
						</div>

					<?php
				}
				?>

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

