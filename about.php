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
    </div>

    <div id="fh5co-author">
        <div class="container">
            <div class="row top-line animate-box">
                <div class="col-md-6 col-md-offset-3 col-md-push-2 text-left fh5co-heading">
                    <h2>A propos de nous</h2>
                    <p>Éléves en première années à l'ESGI, nous avons réalisé ce projet dans le but d'offrir à des potentiels futurs employeurs un moyen facile et ergonomique d'accéder au nos données professionnelles que nous souhaiterions partager.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="author">
                        <div class="author-inner animate-box" style="background-image: url(images/elias.e.png);">
                        </div>
                        <div class="desc animate-box">
                            <span>Partie PHP</span>
                            <h3>Elias EL KIHEL</h3>
                            <p>Éleve passionné et investie, ayant une expérience passée à EPICTECH, qu'il décida de quitter par choix, il a rejoint l'ESGI Lille avec pour but d'affûter ses compétences déjà bien aiguisées.</p>
                            <ul class="fh5co-social-icons">
                                <li><a href="https://www.facebook.com/profile.php?id=100010286824175" target="_blank"><i class="icon-facebook"></i></a></li>
                                <li><a href="https://je-code.com/esgi1/eelkihel/" target="_blank"><i class="icon-dribbble"></i></a></li>
                                <li><a href="https://github.com/xl00t" target="_blank"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="author">
                            <div class="author-inner animate-box" style="background-image: url(images/bahya.k.png);">
                            </div>
                            <div class="desc animate-box">
                                <span>Partie HTML/CSS/PHP</span>
                                <h3>Bahia KHEMISSI</h3>
                                <p>Une élève en pleine reconversion professionnelle. Assidue et sérieuse, disposant d'une très bonne base dans le développement, elle a rejoint l'ESGI pour s'offrir la chance de travailler.
                                    dans un métier qui la passionne</p>
                                <ul class="fh5co-social-icons">
                                    <li><a href="https://www.facebook.com/bahya.khm" target="_blank"><i class="icon-facebook"></i></a></li>
                                    <li><a href="https://je-code.com/esgi1/bkhemissi1/" target="_blank"><i class="icon-dribbble"></i></a></li>
                                    <li><a href="https://github.com/bahya-kh/Projet-Annuel" target="_blank"><i class="icon-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="author">
                                <div class="author-inner animate-box" style="background-image: url(images/quentin.g.png);">
                                </div>
                                <div class="desc animate-box">
                                    <span>HTML/CSS/PHP</span>
                                    <h3>Quentin GRANSART</h3>
                                    <p>Un élève lui aussi en reconversion professionnelle, sérieux et attentif, après plusieurs années à l'usine, il décida de tout plaquer pour s'investir dans un milieu qui le passionne depuis tout petit et souhaite y dédier
                                        son avenir, et c'est dans ce but qu'il a rejoit l'ESGI de Lille.</p>
                                    <ul class="fh5co-social-icons">
                                        <li><a href="https://www.facebook.com/quentin.gransart/" target="_blank"><i class="icon-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/home?lang=fr" target="_blank"><i class="icon-twitter"></i></a></li>
                                        <li><a href="https://je-code.com/esgi1/qgransart/"><i class="icon-dribbble" target="_blank"></i></a></li>
                                        <li><a href="https://github.com/qgransart" target="_blank"><i class="icon-github"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <p><a href="liste.php" class="btn btn-primary">Allons y !!</a></p>
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