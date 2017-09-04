<?php $this->layout('layout', ['title' => 'Weather & Wear']) ?>

<?php $this->start('main_content') ?>
<<<<<<< HEAD
	<h2>Bonjour visiteur.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo cher visiteur</p>
=======
	
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
							<i><?php // = $weather["icon"] ?></i>
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
		

>>>>>>> Delphine
<?php $this->stop('main_content') ?>
