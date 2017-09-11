<?php $this->layout('layout', ['title' => $title ]) ?>

<?php $this->start('main_content') ?>	

		<div id="home-section">
			<div class="container">
				<div class="home-content text-center">
					<h1 id="typer">"Des vêtements appropriés au temps"</h1>
					<h2>Weather & Wear</h2>
					<a href="#" class="btn btn-primary btn-animated">Commençons !</a>
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
				<div class="welcome-content">
					<div class="row">

						<?php if (!empty($errors)): ?>
								
									<?php foreach ($errors as $error) : ?>
										<div class="alert alert-danger">
										<?= $error ?>
										</div>
									<?php endforeach; ?>
								
							<?php endif; ?>


						<!-- Localité -->
						<div class="col-md-2">
							<div class="text-center section-title" id="section-title-Home">
								<h1 id="locationTitle">Localité</h1>
							</div>
							<form method="post">
								<div class="form-group welcome-image form-sign" id="cityLabel">
									<label>Ville</label>
									<input class="form-control" id="city" type="text" name="city" value="<?= $cityInput ?>">
								</div>
								<div class="form-group welcome-image form-sign" id="countryLabel">
									<label>Pays</label>
									<input class="form-control" id="country" type="text" name="country" value="<?= $countryInput ?>">
								</div>
								<div class="text-center">
									<button class="btn btn-primary" id="upButton" type="button" onclick="update(<?= $day ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'upButton')">OK</button>
								</div>
							</form>
						</div>

						<!-- Prévisions météo -->
						<div class="col-md-8 col-md-offset-2">
							<div class="text-center section-title">
								<h1 id="dateTitle">Le <?= $date ?></h1>
								<h2 id="weatherTitle">Prévisions météo pour <?= $city ?></h2>
							</div>
							<div class="row">
								<div class="col-md-2 col-md-offset-2" id="weatherIcon">
									<?= $weather["icon"] ?>
								</div>
								<div class="col-md-7 col-md-offset-1">
									<div class="welcome-image" id="minTempHome">
										<h3 id="tmpMin">Température minimale : <?= $weather["minTemp"] ?> <?= $unit?></h3>
									</div>						
								</div>
								<div class="col-md-7 col-md-offset-5">
									<div class="welcome-image" id="maxTempHome">							
										<h3 id="tmpMax">Température maximale : <?= $weather["maxTemp"] ?> <?= $unit?></h3>
									</div>
								</div>
							</div>
						</div>

					</div><!-- Fin div row -->
				</div><!-- Fin div welcome-content -->
			</div><!-- Fin div container -->
	    </div><!--/#welcome-section-->
		


	    <div id="recent-projects" class="padding">
			<div class="container" id="homeContainer-recent-Projects">
				<div class="recent-projects">
					<div class="row"> 
							
						<div id="datePicker" class="text-center section-title">
							<h2>Exemple de tenue</h2>
							<h1 id="dateTitle">Pour le <?= $date ?></h1>
							<button class="btn btn-primary" id="prevButton" type="button" onclick="update(<?= ($day==0)?0:$day-1 ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'prevButton')">
								<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Jour précédent
							</button>
							<button class="btn btn-primary" id="nextButton" type="button" onclick="update(<?= ($day<6)?$day+1:6 ?>, '<?= $city ?>', '<?= $country ?>', '<?= $unit ?>', 'nextButton')">Jour suivant
								<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
							</button>
						</div>
						<div class="carousel slide" id="mon-carrousel1">
							<!-- Carrousel d'images -->
							<div id="selectUpper" class="carousel-inner">
								<?php
									foreach ($upperClothes as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
								        	<h3>Haut</h3>
							      		</div>
										<?php
									}
								?>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide" id="mon-carrousel2">
							<div class="carousel-inner">
								<?php
									foreach ($lowerClothes as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
							        	<h3>Bas</h3>
							      		</div>
										<?php
									}
								?>
							</div>

			 				<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel2" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						<div class="carousel slide" id="mon-carrousel3">
							<div class="carousel-inner">
								<?php
									foreach ($chaussures as $key => $value) 
									{
										?>
										<div class="item <?= ($key == 0) ? "active":"" ?>"> 
											<img class="img-responsive imgClothes" src="<?= $value["picture"] ?>">
										</div>
										<div class="carousel-caption">
								        	<h3>Chaussures</h3>
							      		</div>
										<?php
									}
								?>
							</div>

							<!-- Contrôleurs -->
							<a class="carousel-control right" href="#mon-carrousel3" data-slide="next">
								<i class="fa fa-refresh" aria-hidden="true" alt="flèche"></i>
								<span class="sr-only">Change</span>
							</a>
						</div>
						
					</div><!-- Fin div row -->
				</div><!-- Fin div recent-projects -->
						
	    </div><!--/#Recent projects-->
<?php $this->stop('main_content') ?>
