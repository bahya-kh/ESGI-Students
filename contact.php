<?php

	session_start();
	require_once("config.php");
	$msg ="";

	if (isset($_POST['contact']) && isset($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message']) && $_POST['name']!='' && $_POST['email']!='' && $_POST['subject']!='' && $_POST['message'] !='') {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$stmt= $bdd->prepare("INSERT INTO contactEsgiGroupe2 (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)");
		$stmt->bindParam(':nom', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':sujet', $subject);
		$stmt->bindParam(':message', $message);
		$stmt->execute();

		$msg ="Merci de nous avoir contacté";
	}

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INDEX.ESGI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page d'accueil ESGI Lille" />
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
        <?php 
		if (isset($_SESSION['sess_usr_id']) && $_SESSION['sess_usr_id']!=''){
			
			$data = $bdd->query("SELECT * FROM contactEsgiGroupe2");
			$count = $data->rowCount();

			if ($count> 0) {
			    
			?>
            <br><br><br><br><br><br>
            <div class="container">
                        <div class="row">
                            <div class="col-sm-16 col-centered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Sujet</th>
                                            <th scope="col" style="width: 50%">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = $data->fetch()) {
                                                echo '<tr><th scope="row">'.$row["id"].'</th><td>'.$row["nom"].'</td><td>'.$row["email"].'</td><td>'.$row["sujet"].'</td><td><textarea rows="2" class="form-control md-textarea">'.$row["message"].'</textarea></td></tr>';}
                                            }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                        <?php
                    }
                else {
                    ?>



        <div id="fh5co-contact">
            <div class="container">
                <div class="row top-line animate-box">
                    <div class="col-md-6 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
                        <h2>Contact</h2>
                        <p>Vous pouvez nous contacter si vous souhaitez de plus amples informations à propos de la formation ou à propos du site.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-5 col-md-pull-1 animate-box">
                            <div class="fh5co-contact-info">
                                <h3>Contact Infomations</h3>
                                <ul>
                                    <li class="address"><a href="https://www.google.fr/maps/place/ESGI+Lille/@50.6374158,3.0739366,17z/data=!3m1!4b1!4m5!3m4!1s0x47c2d5d0f999cb23:0xe4f6cf4f390a486f!8m2!3d50.6374124!4d3.0761253" target="_blank">50 Allée de Safed, 59777 Lille </a></li>
                                    <li class="phone"><a href="tel://0622666142">+0622666142</a></li>
                                    <li class="email"><a href="mailto:qgransart@myges.fr">qgransart@myges.fr</a></li>
                                    <li class="email"><a href="mailto:eelkihel@myges.fr">eelkihel@myges.fr</a></li>
                                    <li class="email"><a href="mailto:khemissi1@myges.fr">bkhemissi1@myges.fr</a></li>
                                    <li class="url"><a href="http://je-code.com">je-code.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <form method="POST" action="">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="fname">Votre nom</label>
                                        <input type="text" id="fname" class="form-control" name="name">
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="sujet">Sujet</label>
                                        <input type="text" id="sujet" class="form-control" name="subject">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="btn btn-primary" name="contact">
                                </div>
                                <div class="status"> <?=$msg?></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
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