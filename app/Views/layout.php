<!-- <!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title><?= $this->e($title) ?></title>

		<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
		<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

	</head>
	<body>
		<div class="container">
			<header>
				<h1>W :: <?= $this->e($title) ?></h1>
			</header>

			<section>
				<?= $this->section('main_content') ?>
			</section>

			<footer>
			</footer>
		</div>

		<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
		<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	</body>
</html> -->














<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<!--title-->
	    <title>Weather & Wear</title>
		
		<!--CSS-->
	    <link href="<?= $this->assetUrl('css/bootstrap.css') ?>" rel="stylesheet">
	    <link href="<?= $this->assetUrl('css/font-awesome.min.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('magnific-popup/magnific-popup.css') ?>" rel="stylesheet"><!-- URL A REVOIR? -->
		<link href="<?= $this->assetUrl('twentytwenty/twentytwenty.css') ?>" rel="stylesheet" type="text/css" /><!-- URL A REVOIR? -->
		<link href="<?= $this->assetUrl('css/main.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/tr-animation.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/blue.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/responsive.css') ?>" rel="stylesheet">		
		
		<!--Google Fonts-->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,900' rel='stylesheet' type='text/css'>
		
	    <!--[if lt IE 9]>
		    <script src="js/html5shiv.js"></script>
		    <script src="js/respond.min.js"></script>
	    <![endif]-->       
	    <link rel="shortcut icon" href="https://themeregion.com/demo/arki/default-images/ico/favicon.ico">
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://themeregion.com/demo/arki/default-images/ico/apple-touch-icon-144-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://themeregion.com/demo/arki/default-images/ico/apple-touch-icon-114-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://themeregion.com/demo/arki/default-images/ico/apple-touch-icon-72-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" href="https://themeregion.com/demo/arki/default-images/ico/apple-touch-icon-57-precomposed.png">
	</head><!--/head-->
	<body>
		<header id="navigation">
			<div class="navbar" role="banner">
				<div class="container">
	                <div class="navbar-header">
	                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                        <span class="sr-only">Toggle navigation</span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </button>
	                    
	                    <a class="navbar-brand" href="index.html">
	                    	<img class="logo-two img-responsive" src="<?= $this->assetUrl('img/sun.png') ?>">
	                    </a> 

	                </div>  
					<div class="top-bar">
						<span class="login-section">
							<a href="login-signup.html"><i class="fa fa-user"></i>Signup / Login</a>
						</span>
					</div>
	                <nav id="main-menu" class="collapse navbar-collapse navbar-right">         
	                    <ul class="nav navbar-nav">
	                        <li class="dropdown active">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									Home
								</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="index.html">Home Default</a></li>
									<li><a href="index-slider.html">Home Carousel</a></li>
									<li><a href="index-slider2.html">Home Fade Slider</a></li>									
								</ul>
							</li>
							
							<li class="dropdown">
	                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                Pages
	                            </a>
	                            <ul class="dropdown-menu">                               
									<li class="dropdown-submenu">
	                                    <a href="javascript:void(0);">Projects</a>
	                                    <ul class="dropdown-menu">
	                                        <li><a href="project.html">Project</a></li>
	                                        <li><a href="project-details.html">Project Details</a></li>
	                                    </ul>                                
	                                </li>
									
	                                <li class="dropdown-submenu">
	                                    <a href="javascript:void(0);">Services</a>
	                                    <ul class="dropdown-menu">
	                                        <li><a href="service.html">Service one</a></li>
	                                        <li><a href="service-two.html">Service Two</a></li>
	                                    </ul>                                
	                                </li>
									
	                                <li class="dropdown-submenu">
	                                    <a href="javascript:void(0);">Other Pages</a>
	                                    <ul class="dropdown-menu">
	                                        <li><a href="login.html">Login Page</a></li>                                
	                                        <li><a href="sign-up.html">Signup Page</a></li>                             
	                                        <li><a href="login-signup.html">Login & Signup</a></li>                             
	                                    </ul>                                
	                                </li>
	                               <li>
	                                    <a href="404.html">404 Error Page</a>                            
	                                </li>
									<li>
	                                    <a href="coming-soon.html">Coming Soon Page</a>                            
	                                </li>
	                            </ul>
	                        </li>						
							
	                        <li><a href="shortcode.html">Shortcode</a></li>
	                        <li><a href="about-us.html">About</a></li>
							
							
							<li class="dropdown">
	                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                Blog
	                            </a>
	                            <ul class="dropdown-menu">                               
									<li><a href="blog.html">Default Blog</a></li>
									<li><a href="blog1.html">Left Siderbar Blog</a></li>
									<li><a href="blog2.html">Full Width Blog</a></li>
									<li><a href="blog-detail.html">Blog Details</a></li>
									<li><a href="blog-detail2.html">Blog Details Two</a></li>
	                            </ul>
	                        </li>
							
	                        <li><a href="contact.html">Contact</a></li>
	                    </ul>         
	                </nav>
	                <div class="search-icon">
	                    <span><i class="fa fa-search"></i></span>
	                </div>                
	            </div>
				<div class="search">
					<form role="form">
					<input type="text" class="search-form" autocomplete="off" placeholder="Write something and press enter">
					<span class="search-close"><i class="fa fa-times"></i></span>
					</form>
				</div>
	        </div>
	    </header><!--/#navigation--> 
	    
		<div id="home-section">
			<div class="container">
				<div class="home-content text-center">
					<h1 id="typer">"THERE’S NO SUCH THING AS BAD WEATHER, ONLY BAD CLOTHES"</h1>
					<h2>Weather & Wear</h2>
					<a href="#" class="btn btn-primary btn-animated">Lets Start</a>
					<div class="scroll-arrow">
						<div class="arrow-icon">
							<a class="animated" href="#"><i class="fa fa-angle-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/#home-section--> 
			
	    <div id="welcome-section" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1>Date du jour </h1>
					<h2>Prévisions météo pour "NOM DE LA VILLE"</h2>
				</div>
				<div class="welcome-content">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="welcome-image">
								<h3>Minimal temperature : xx °F</h3>
							</div>						
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="welcome-image">							
							<h3>Maximal temperature : xx °F</h3>
							</div>
						</div>
						<div>
							<i><?= $weather["icon"] ?></i>
						</div>
					</div>
				</div>
			</div>
	    </div><!--/#welcome-section-->
		
		<div id="recent-projects" class="padding">
			<div class="container">
				<div class="text-center section-title">
					<h1>Date</h1>
					<h2>How to get dress today ?</h2>
				</div>
				<div class="recent-projects">
					<div class="row"> 
						<div class="carousel slide col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4" id="mon-carrousel">
							<!-- Carrousel d'images -->
							<div class="carousel-inner">
								<div class="item active">
									<img src="http://www.celio.com/medias/sys_master/productMedias/productMediasImport/h2e/hc5/9144818696222/product-media-import-1040935-3-weared.jpg?frz-v914"/>
									<div class="carousel-caption">
								        <h3>Top</h3>
							      	</div>
								</div>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel" data-slide="next">
								<i class="glyphicon glyphicon-refresh"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4" id="mon-carrousel">
							<div class="carousel-inner">
								<div class="item active">
									<img src="https://media.quiksilver.co.id/media/catalog/product/cache/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/e/q/eqyws03252_quiksilver_mens_everyday_chino_walkshort_tmp0_1_h.jpg"/>
									<div class="carousel-caption">
								        <h3>Bottom</h3>
							      	</div>
								</div>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel" data-slide="next">
								<i class="glyphicon glyphicon-refresh"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4" id="mon-carrousel">
							<div class="carousel-inner">
								<div class="item active">
									<img src="https://photos6.spartoo.com/photos/365/3654062/3654062_350_A.jpg"/>
									<div class="carousel-caption">
								        <h3>Shoes</h3>
							      	</div>
								</div>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel" data-slide="next">
								<i class="glyphicon glyphicon-refresh"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
					</div>
				</div>
			</div>
						
	    </div><!--/#Recent projects-->
		
		<footer id="footer">			
			<div class="container">
				<div class="padding">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="footer-widget">
								<a class="logo" href="#"><img class="img-responsive" src="images/logo2.png" alt="" /></a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								<address>
									<ul>
										<li><span>Address:</span>URBILOG - 31 Rue Denis Papin, 59650 Villeneuve-d'Ascq - France</li>
										<li><span>Phone:</span>+33 1 23 45 67 89</li>
										<li><span>Mail:</span><a href="#">weather&wear@gmail.com</a></li>
									</ul>
								</address>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-2 col-sm-3 col-sm-offset-1 col-xs-4 col-xs-offset-4">
							<div class="footer-widget">
								<h2>Quick Links</h2>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Project</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Intern</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-md-offset-2 col-sm-3 col-sm-offset-1 col-xs-4 col-xs-offset-4">
							<div class="footer-widget">
								<h2>Partners</h2>
								<ul>
									<li><a href="#">Le mouton à 5 pattes</a></li>
									<li><a href="#">Compéthance</a></li>
									<li><a href="#">Centre Ressources Autisme Nord Pas de Calais</a></li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div id="footer-bottom">
				<div class="container text-center">
					<p>© Copyright 2017 <a href="#">Weather & Wear</a>. All Rights Reserved.</p>
				</div>			
			</div>
		</footer>
		
		<!--/#scripts--> 
	    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.js') ?>"></script>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script> <!--  Ne pas toucher-->
	  	<script type="text/javascript" src="<?= $this->assetUrl('js/gmaps.js') ?>"></script>
		<!-- 
		<script type="text/javascript" src="js/jquery.parallax.js"></script> 
		Lien symbolique non crée, cf commentaire ci-dessous -->


		<!-- MESSAGE ERREUR SUR POWERSHELL:

		Unable to find a suitable version for jquery, please choose one by typing one of the numbers below:
		    1) jquery#~1.8.3 which resolved to 1.8.3+1 and is required by jquery-parallax#1.1.3
		    2) jquery#>=1.8 which resolved to 3.2.1 and is required by jquery.scrollTo#2.1.2, jquery.serialScroll#1.3.1
		    3) jquery#1.9.1 - 3 which resolved to 3.2.1 and is required by bootstrap#3.3.7
		    4) jquery#>=1.4 which resolved to 3.2.1 and is required by jquery.scrollTo#1.4.14
		    5) jquery#>=1.8.0 which resolved to 3.2.1 and is required by magnific-popup#1.1.0

		Prefix the choice with ! to persist it to bower.json

		? Answer 3
		***************************************************************************************************

		Unable to find a suitable version for jquery.scrollTo, please choose one by typing one of the number
		    1) jquery.scrollTo#~1.4.6 which resolved to 1.4.14 and is required by jquery-parallax#1.1.3
		    2) jquery.scrollTo#>=2.1.0 which resolved to 2.1.2 and is required by jquery.serialScroll#1.3.1

		Prefix the choice with ! to persist it to bower.json

		? Answer 1
		bower jquery-parallax#^1.1.3          install jquery-parallax#1.1.3
		bower jquery.serialScroll#*           install jquery.serialScroll#1.3.1
		bower jquery.scrollTo#~1.4.6          install jquery.scrollTo#1.4.14

		jquery-parallax#1.1.3 vendor\bower_components\jquery-parallax
		├── jquery#3.2.1
		├── jquery.scrollTo#1.4.14
		└── jquery.serialScroll#1.3.1

		jquery.serialScroll#1.3.1 vendor\bower_components\jquery.serialScroll
		├── jquery#3.2.1
		└── jquery.scrollTo#1.4.14

		jquery.scrollTo#1.4.14 vendor\bower_components\jquery.scrollTo
		└── jquery#3.2.1

		************************************************************************************************ 

		Lien symbolique non créé pour jquery.parallax.js car le fichier chargé par Bower est jquery.parallax-1.1.3.js (et non jquery.parallax.js comme sur le site que je prends pour modèle); à voir avec le formateur.
		************************************************************************************************

		 Message sur github: **NO LONGER MAINTAINED** au sujet de jquery parallax -->


		<script type="text/javascript" src="<?= $this->assetUrl('magnific-popup/jquery.magnific-popup.min.js') ?>"></script><!-- URL A REVOIR? -->
		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.nav.js') ?>js/jquery.nav.js"></script> 

		<!-- MESSAGE ERREUR SUR POWERSHELL:
		PS C:\xampp\htdocs\ProjetFormation> bower install jQuery-One-Page-Nav
		bower                     invalid-meta for:C:\xampp\htdocs\ProjetFormation\bower.json
		bower                     invalid-meta The "name" is recommended to be lowercase, can contain digits, dots, dashes
		bower jQuery-One-Page-Nav#* not-cached https://github.com/davist11/jQuery-One-Page-Nav.git#*
		bower jQuery-One-Page-Nav#*    resolve https://github.com/davist11/jQuery-One-Page-Nav.git#*
		bower jQuery-One-Page-Nav#*   download https://github.com/davist11/jQuery-One-Page-Nav/archive/v3.0.0.tar.gz
		bower jQuery-One-Page-Nav#*    extract archive.tar.gz
		bower jQuery-One-Page-Nav#*     invalid-meta for:C:\Users\DELPHI~1\AppData\Local\Temp\DESKTOP-HMCHLF6-delphine martinet\bower\609865726a27bcd01b6e3adb236f793c-2820-rqPa2o\component.json
		bower jQuery-One-Page-Nav#*     invalid-meta The "name" is recommended to be lowercase, can contain digits, dots, dashes
		bower jQuery-One-Page-Nav#*       deprecated Package jQuery-One-Page-Nav is using the deprecated component.json
		bower jQuery-One-Page-Nav#*         resolved https://github.com/davist11/jQuery-One-Page-Nav.git#3.0.0
		bower jquery#~1.8.0                   cached https://github.com/jquery/jquery-dist.git#1.8.3+1
		bower jquery#~1.8.0                 validate 1.8.3+1 against https://github.com/jquery/jquery-dist.git#~1.8.0
		bower jquery#~1.8.3                   cached https://github.com/jquery/jquery-dist.git#1.8.3+1
		bower jquery#~1.8.3                 validate 1.8.3+1 against https://github.com/jquery/jquery-dist.git#~1.8.3
		bower jquery#>=1.4                    cached https://github.com/jquery/jquery-dist.git#3.2.1
		bower jquery#>=1.4                  validate 3.2.1 against https://github.com/jquery/jquery-dist.git#>=1.4
		bower jquery#>=1.8.0                  cached https://github.com/jquery/jquery-dist.git#3.2.1
		bower jquery#>=1.8.0                validate 3.2.1 against https://github.com/jquery/jquery-dist.git#>=1.8.0
		bower jquery#>=1.8                    cached https://github.com/jquery/jquery-dist.git#3.2.1
		bower jquery#>=1.8                  validate 3.2.1 against https://github.com/jquery/jquery-dist.git#>=1.8

		Unable to find a suitable version for jquery, please choose one by typing one of the numbers below:
		    1) jquery#~1.8.0 which resolved to 1.8.3+1 and is required by jQuery-One-Page-Nav#3.0.0
		    2) jquery#~1.8.3 which resolved to 1.8.3+1 and is required by jquery-parallax#1.1.3
		    3) jquery#1.9.1 - 3 which resolved to 3.2.1 and is required by bootstrap#3.3.7
		    4) jquery#>=1.4 which resolved to 3.2.1 and is required by jquery.scrollTo#1.4.14
		    5) jquery#>=1.8.0 which resolved to 3.2.1 and is required by magnific-popup#1.1.0
		    6) jquery#>=1.8 which resolved to 3.2.1 and is required by jquery.serialScroll#1.3.1

		Prefix the choice with ! to persist it to bower.json

		? Answer 3

		****************************************************************************************

		REPONSE SUR POWERSHELL:

		bower jQuery-One-Page-Nav#^3.0.0     install jQuery-One-Page-Nav#3.0.0

		jQuery-One-Page-Nav#3.0.0 vendor\bower_components\jQuery-One-Page-Nav
		└── jquery#3.2.1

		****************************************************************************************

		lien symbolique créé pour le fichier "jquery.nav.js" avec la commande:

		New-Item -ItemType SymbolicLink -Path C:\xampp\htdocs\ProjetFormation\public\assets\js\jquery.nav.js -Target "C:\xampp\htdocs\ProjetFormation\vendor\bower_components\jQuery-One-Page-Nav\jquery.nav.js"

	 
		-->


		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.typer.js') ?>"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.event.move.js') ?>"></script>

	    <script type="text/javascript" src="<?= $this->assetUrl('twentytwenty/jquery.twentytwenty.js') ?>"></script><!-- URL A REVOIR? -->


	    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.countTo.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.inview.min.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('js/isotope.pkgd.min.js') ?>"></script>
	    <!-- POUR CHARGER LE FICHIER js/isotope.pkgd.min.js VIA BOWER, j'ai écrit la commande sur powershell:
	    PS C:\xampp\htdocs\ProjetFormation> bower install isotope-layout

	    REPONSE APRES CHARGEMENT SUR POWERSHELL:

		    isotope#3.0.4 vendor\bower_components\isotope
		├── desandro-matches-selector#2.0.2
		├── fizzy-ui-utils#2.0.5
		├── get-size#2.0.2
		├── masonry#4.2.0
		└── outlayer#2.1.1

		desandro-matches-selector#2.0.2 vendor\bower_components\de

		get-size#2.0.2 vendor\bower_components\get-size

		fizzy-ui-utils#2.0.5 vendor\bower_components\fizzy-ui-util
		└── desandro-matches-selector#2.0.2

		masonry#4.2.0 vendor\bower_components\masonry
		├── get-size#2.0.2
		└── outlayer#2.1.1

		outlayer#2.1.1 vendor\bower_components\outlayer
		├── ev-emitter#1.1.1
		├── fizzy-ui-utils#2.0.5
		└── get-size#2.0.2

		ev-emitter#1.1.1 vendor\bower_components\ev-emitter
									
									*******
		ET JE N'AI FAIT LE LIEN SYMBOLIQUE QUE POUR LE FICHIER "isotope.pkgd.min.js"
		(commande faite: 
		New-Item -ItemType SymbolicLink -Path C:\xampp\htdocs\ProjetFormation\public\assets\js\isotope.pkgd.min.js -Target "C:\xampp\htdocs\ProjetFormation\vendor\bower_components\isotope\dist\isotope.pkgd.min.js")
									*******
		EST-CE UNE ERREUR? DOIS-JE FAIRE LES LIENS SYMBOLIQUES POUR LES REPERTOIRES NOMMES DANS L'ARBORESCENCE CI-DESSUS?

	    -->
	    <script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>	
	</body>
</html>



<!-- 								*********
								CORRECTIONS A FAIRE
     								*********

	- Revoir tous les chemins d'accès aux fichiers pour les css et js + les messages d'erreur de powershell mis en commentaire

	- Certaines animations (compte des chiffres bandeau rose et anim'du bandeau bleu en-tête)
	ne fonctionnent pas.

	- Fichier main.css dans public/assets/img: la ligne 1364 a été modifiée (chemin d'accès vers photo à revoir: php $this->assetUrl possible?)

	- Le glyphicon glyphicon-refresh sur les carrousels ne fonctionnent pas: j'ai tenté de charger glyphicon via bower (commande sur powershell:PS C:\xampp\htdocs\ProjetFormation> bower install bootstrap-glyphicon ); réponse de powershell:

	bower                     invalid-meta for:C:\xampp\htdocs\ProjetFormation\bower.json
	bower                     invalid-meta The "name" is recommended to be lowercase, can contain digits, dots, dashes
	bower bootstrap-glyphicon#* not-cached https://github.com/Mortega5/bootstrap-glyphicon.git#*
	bower bootstrap-glyphicon#*    resolve https://github.com/Mortega5/bootstrap-glyphicon.git#*
	bower bootstrap-glyphicon#*   download https://github.com/Mortega5/bootstrap-glyphicon/archive/1.0.8.tar.gz
	bower bootstrap-glyphicon#*    extract archive.tar.gz
	bower bootstrap-glyphicon#*   resolved https://github.com/Mortega5/bootstrap-glyphicon.git#1.0.8
	bower polymer#^1.2.0        not-cached https://github.com/Polymer/polymer.git#^1.2.0
	bower polymer#^1.2.0           resolve https://github.com/Polymer/polymer.git#^1.2.0
	bower polymer#^1.2.0          download https://github.com/Polymer/polymer/archive/v1.9.3.tar.gz
	bower polymer#^1.2.0           extract archive.tar.gz
	bower polymer#^1.2.0      invalid-meta for:C:\Users\DELPHI~1\AppData\Local\Temp\DESKTOP-HMCHLF6-delphine martinet\bower\6ac9fb6e69374501bea0bcad9749c0a7-4816-qfTmPi\bower.json
	bower polymer#^1.2.0      invalid-meta The "main" field has to contain only 1 file per filetype; found multiple .html files: ["polymer.html","polymer-mini.html","polymer-micro.html"]
	bower polymer#^1.2.0          resolved https://github.com/Polymer/polymer.git#1.9.3
	bower webcomponentsjs#^0.7.24       not-cached https://github.com/Polymer/webcomponentsjs.git#^0.7.24
	bower webcomponentsjs#^0.7.24          resolve https://github.com/Polymer/webcomponentsjs.git#^0.7.24
	bower webcomponentsjs#^0.7.24         download https://github.com/Polymer/webcomponentsjs/archive/v0.7.24.tar.gz
	bower webcomponentsjs#^0.7.24          extract archive.tar.gz
	bower webcomponentsjs#^0.7.24         resolved https://github.com/Polymer/webcomponentsjs.git#0.7.24
	bower bs-glyphicon#^1.0.8              install bs-glyphicon#1.0.8
	bower polymer#^1.2.0                   install polymer#1.9.3
	bower webcomponentsjs#^0.7.24          install webcomponentsjs#0.7.24

	bs-glyphicon#1.0.8 vendor\bower_components\bs-glyphicon
	└── polymer#1.9.3

	polymer#1.9.3 vendor\bower_components\polymer
	└── webcomponentsjs#0.7.24

	webcomponentsjs#0.7.24 vendor\bower_components\webcomponentsjs
	


	****************je n'ai pas su sur quel(s) fichier(s) faire un lien symbolique************

	- Ajouter logo drapeaux pr traduction fr/en


 -->