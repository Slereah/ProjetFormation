<!DOCTYPE html>
<html lang="fr">
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
		<link href="<?= $this->assetUrl('magnific-popup/magnific-popup.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('twentytwenty/twentytwenty.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= $this->assetUrl('css/main.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/tr-animation.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/blue.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/responsive.css') ?>" rel="stylesheet">	
		<link href="<?= $this->assetUrl('css/cropper.css') ?>" rel="stylesheet">
		<link href="<?= $this->assetUrl('css/weather-icons.css') ?>" rel="stylesheet">			
		
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
	                    	<img class="logo-two img-responsive" src="<?= $this->assetUrl('img/sun.png') ?>" alt="">
	                    </a> 

	                </div>  
					<div class="top-bar">
						<span class="login-section">
							<a href="<?= $this->url('security_signin') ?>"><i class="fa fa-user"></i>Signup / Login</a>
						</span>
					</div>
	                <nav id="main-menu" class="collapse navbar-collapse navbar-right">         
	                    <ul class="nav navbar-nav">
	                        <li class="dropdown active">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									Home
								</a>
							</li>
							
							<li class="dropdown">
	                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
	                                How it works ?
	                            </a>
	                        </li>						
							
	                        <li><a href="shortcode.html">How to get dress today ?</a></li>
							
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
	    
    	<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer id="footer">			
			<div class="container">
				<div class="padding">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="footer-widget">
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
		<script type="text/javascript" src="<?= $this->assetUrl('magnific-popup/jquery.magnific-popup.min.js') ?>"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.nav.js') ?>"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.typer.js') ?>"></script>
		<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.event.move.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('twentytwenty/twentytwenty.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.countTo.js') ?>"></script>
	    <script type="text/javascript" src="<?= $this->assetUrl('js/jquery.inview.min.js') ?>"></script> 
	    <script type="text/javascript" src="<?= $this->assetUrl('js/main.js') ?>"></script>	
	    <script type="text/javascript" src="<?= $this->assetUrl('js/cropper.js') ?>"></script>
	</body>
</html>



<!-- 								*********
								CORRECTIONS A FAIRE
     								*********

	- Certaines animations (compte des chiffres bandeau rose et anim'du bandeau bleu en-tête)
	ne fonctionnent pas.

	- Ajouter logo drapeaux pr traduction fr/en


 -->